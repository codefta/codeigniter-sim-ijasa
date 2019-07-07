<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Prioritas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(['korban_bencana_model', 'infobencana_model', 'jenis_logistik_model', 'spk/prioritas_model']);
    }

    public function index() {

        $id_bencana = $this->input->get('id_bencana');
        $id_logistik = $this->input->get('id_logistik');

        $domain_rendah = $this->prioritas_model->get_domain()['rendah'];
        $domain_tinggi = $this->prioritas_model->get_domain()['tinggi'];
        $batas_bawah = (int) $this->prioritas_model->get_domain()['b_bawah'];
        $batas_atas = (int) $this->prioritas_model->get_domain()['b_atas'];

        $aturan = $this->prioritas_model->get_aturan();

        if($id_bencana) {
            $korban = $this->korban_bencana_model->get_korban_bencana_id($id_bencana);
            $total_korban = (int)$korban['anak'] + (int)$korban['laki'] + (int) $korban['perempuan'];
            $anak = round(((int) $korban['anak'] / (int)$total_korban) * (int) $domain_tinggi, 2);
            $laki = round(((int) $korban['laki'] / (int)$total_korban) * (int) $domain_tinggi, 2);
            $perempuan = round(((int) $korban['perempuan'] / (int)$total_korban) * (int) $domain_tinggi, 2);

            /* Derajat keanggotaan */
            $rendah_anak = round($this->derajat_rendah($anak, $batas_atas, $batas_bawah), 2);
            $rendah_laki = round($this->derajat_rendah($laki, $batas_atas, $batas_bawah), 2);
            $rendah_perempuan = round($this->derajat_rendah($perempuan, $batas_atas, $batas_bawah), 2);

            $tinggi_anak = round($this->derajat_tinggi($anak, $batas_atas, $batas_bawah), 2);
            $tinggi_laki = round($this->derajat_tinggi($laki, $batas_atas, $batas_bawah), 2);
            $tinggi_perempuan = round($this->derajat_tinggi($perempuan, $batas_atas, $batas_bawah), 2);
            
            $result_rule = [];
            $result_prioritas = [];
            $i = 1;
            $j = 1;
            foreach($aturan as $item) {
                
                if($item['ba'] == 'tinggi') {
                    $ba = $tinggi_anak;
                } else {
                    $ba = $rendah_anak;
                }

                if($item['bp'] == 'tinggi') {
                    $bp = $tinggi_perempuan;
                } else {
                    $bp = $rendah_perempuan;
                }

                if($item['bl'] == 'tinggi') {
                    $bl = $tinggi_laki;
                } else {
                    $bl = $rendah_laki;
                }

                if($item['operator'] == 'and') {
                    $rule = min($ba, $bp, $bl);
                } else {
                    $rule = max($ba, $bp, $bl);
                }

                if($item['hasil'] == 'tinggi') {
                    $prioritas = $rule * ( $batas_atas - $batas_bawah ) + $batas_bawah;
                } else {
                    $prioritas = $batas_atas - ($rule * ($batas_atas - $batas_bawah));
                }

                $result_rule[$i++] = $rule;
                $result_prioritas[$j++] = $prioritas;

            }

            $defuzzy = 0;

            foreach($result_rule as $key => $rule) {
                $defuzzy = $rule * $result_prioritas[$key];
                $sum_rule += $result_rule[$key];
            }

            $defuzzy_result = $defuzzy / $sum_rule;

            if(is_nan($defuzzy)) {
                $defuzzy = 0;
            }

            $derajat_rendah = [
                'anak' => $rendah_anak,
                'laki' => $rendah_laki,
                'perempuan' => $rendah_perempuan
            ];

            $derajat_tinggi = [
                'anak' => $tinggi_anak,
                'laki' => $tinggi_laki,
                'perempuan' => $tinggi_perempuan
            ];
            
            $korban_persen = [
                'anak' => $anak,
                'laki' => $laki,
                'perempuan' => $perempuan,
            ];

            $data['rule_fuzzy'] = $result_rule;
            $data['prioritas'] = $result_prioritas;
            $data['defuzzy'] = round($defuzzy_result, 2);
            $data['derajat_rendah'] = $derajat_rendah;
            $data['derajat_tinggi'] = $derajat_tinggi;
            $data['korban'] = $korban;
            $data['korban_persen'] = $korban_persen;
        }
        
        $data['id_bencana'] = $id_bencana;
        $data['id_logistik'] = $id_logistik;
        $data['infobencana'] = $this->infobencana_model->get_infobencana();
        $data['jenis_logistik'] = $this->jenis_logistik_model->get_jenis_logistik();
        $data['title'] = 'Pendukung Keputusan';
        $this->load->view('admin/spk/index', $data);
    }

    public function domain() {
        $data['domain'] = $this->prioritas_model->get_domain();
        $data['title'] = 'Pendukung Keputusan / Domain';
        $this->load->view('admin/spk/domain', $data);
    }

    public function save_domain() {

        $data = [
            'rendah' => $this->input->post('rendah'),
            'tinggi' => $this->input->post('tinggi'),
            'b_atas' => $this->input->post('b_atas'),
            'b_bawah' => $this->input->post('b_bawah')
        ];

        $save = $this->prioritas_model->update_domain($data);

        if($save) {
            $this->session->set_flashdata('notif_domain', '<div class="alert alert-success">Anda Berhasil Mengubah Domain Keanggotaan</div>');
            redirect(base_url("admin/spk/prioritas/domain"));
        } else {
            $this->session->set_flashdata('notif_domain', '<div class="alert alert-danger">Anda Gagal Mengubah Domain Keanggotaan</div>');
            redirect(base_url("admin/spk/prioritas/domain"));
        }
    }

    public function aturan() {
        $data['aturan'] = $this->prioritas_model->get_aturan();
        $data['title'] = 'Pendukung Keputusan / Aturan';
        $this->load->view('admin/spk/aturan/index', $data);
    }

    public function tambah_aturan() {
        $data['title'] = 'Pendukung Keputusan / Aturan / Tambah';
        $this->load->view('admin/spk/aturan/tambah', $data);
    }

    public function save_aturan() {

        $data = [
            'ba' => $this->input->post("ba"),
            'bl' => $this->input->post("bl"),
            'bp' => $this->input->post("bp"),
            'hasil' => $this->input->post("hasil"),
            'operator' => $this->input->post("operator")
        ];

        $save = $this->prioritas_model->insert_aturan($data);

        if($save) {
            $this->session->set_flashdata('notif_aturan', '<div class="alert alert-success">Anda Berhasil Menambah Aturan Fuzzy</div>');
            redirect(base_url("admin/spk/prioritas/aturan"));
        } else {
            $this->session->set_flashdata('notif_aturan', '<div class="alert alert-gagal">Anda Gagal Menambah Aturan Fuzzy</div>');
            redirect(base_url("admin/spk/prioritas/aturan"));
        }
    }

    public function sunting_aturan($id) {
        $data['aturan'] = $this->prioritas_model->get_aturan_by_id($id);
        $data['title'] = 'Pendukung Keputusan / Aturan / Sunting';
        $this->load->view('admin/spk/aturan/edit', $data);
    }

    public function update_aturan() {
        $data = [
            'ba' => $this->input->post("ba"),
            'bl' => $this->input->post("bl"),
            'bp' => $this->input->post("bp"),
            'hasil' => $this->input->post("hasil"),
            'operator' => $this->input->post("operator")
        ];

        $id = $this->input->post("id");

        $save = $this->prioritas_model->update_aturan($data, $id);

        if($save) {
            $this->session->set_flashdata('notif_aturan', '<div class="alert alert-success">Anda Berhasil Mengubah Aturan Fuzzy</div>');
            redirect(base_url("admin/spk/prioritas/aturan"));
        } else {
            $this->session->set_flashdata('notif_aturan', '<div class="alert alert-gagal">Anda Gagal Mengubah Aturan Fuzzy</div>');
            redirect(base_url("admin/spk/prioritas/aturan"));
        }
    }

    public function hapus_aturan($id) {
        $save = $this->prioritas_model->delete_aturan($id);

        if($save) {
            $this->session->set_flashdata('notif_aturan', '<div class="alert alert-success">Anda Berhasil Menghapus Aturan Fuzzy</div>');
            redirect(base_url("admin/spk/prioritas/aturan"));
        } else {
            $this->session->set_flashdata('notif_aturan', '<div class="alert alert-gagal">Anda Gagal Menghapus Aturan Fuzzy</div>');
            redirect(base_url("admin/spk/prioritas/aturan"));
        }        
    }

    private function derajat_rendah($var, $batas_atas, $batas_bawah) {
        if($var  <= $batas_bawah) {
            return $rendah_var = 1;
        } else if($var < $batas_atas && $var > $batas_bawah) {
            return $rendah_var = ( $batas_atas - $var ) / ( $batas_atas - $batas_bawah );
        } else if($var >= $batas_atas) {
            return $rendah_var = 0;
        }
    }

    private function derajat_tinggi($var, $batas_atas, $batas_bawah) {
        if($var >= $batas_atas) {
            return $tinggi_var = 1;
        } else if($var > $batas_bawah && $var < $batas_atas) {
            return $tinggi_var = ( $var - $batas_bawah) / ($batas_atas - $batas_bawah);
        } else {
            return $tinggi_var = 0;
        }
    }
}