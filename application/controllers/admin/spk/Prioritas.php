<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Prioritas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(['korban_bencana_model', 'infobencana_model', 'jenis_logistik_model']);
    }

    public function index() {

        $id_bencana = $this->input->get('id_bencana');
        $id_logistik = $this->input->get('id_logistik');

        if($id_bencana) {
            $korban = $this->korban_bencana_model->get_korban_bencana_id($id_bencana);
            $total_korban = (int)$korban['anak'] + (int)$korban['laki'] + (int) $korban['perempuan'];
            $anak = round(((int) $korban['anak'] / (int)$total_korban) * 20, 2);
            $laki = round(((int) $korban['laki'] / (int)$total_korban) * 20, 2);
            $perempuan = round(((int) $korban['perempuan'] / (int)$total_korban) * 20, 2);

            /* Derajat keanggotaan */
            $rendah_anak = round($this->derajat_rendah($anak), 2);
            $rendah_laki = round($this->derajat_rendah($laki), 2);
            $rendah_perempuan = round($this->derajat_rendah($perempuan), 2);

            $tinggi_anak = round($this->derajat_tinggi($anak), 2);
            $tinggi_laki = round($this->derajat_tinggi($laki), 2);
            $tinggi_perempuan = round($this->derajat_tinggi($perempuan), 2);

            $rule_1 = min($tinggi_anak, $tinggi_perempuan, $tinggi_laki);
            $rule_2 = min($rendah_anak, $rendah_perempuan, $tinggi_laki);
            $rule_3 = min($rendah_anak, $tinggi_perempuan, $tinggi_laki);

            $prioritas_1 = $rule_1 * ( 8 - 4 ) + 4;
            $prioritas_2 = 8 - ($rule_2 * ( 8 - 4 ));
            $prioritas_3 = $rule_3 * ( 8 - 4 ) + 4;

            $defuzzy = ($rule_1 * $prioritas_1 + $rule_2 * $prioritas_2 + $rule_3 * $prioritas_3) / ($rule_1 + $rule_2 + $rule_3);

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

            $rule_fuzzy = [
                '1' => $rule_1,
                '2' => $rule_2,
                '3' => $rule_3
            ];

            $prioritas = [
                '1' => $prioritas_1,
                '2' => $prioritas_2,
                '3' => $prioritas_3
            ];
        
            $korban_persen = [
                'anak' => $anak,
                'laki' => $laki,
                'perempuan' => $perempuan,
            ];


            $data['rule_fuzzy'] = $rule_fuzzy;
            $data['prioritas'] = $prioritas;
            $data['defuzzy'] = round($defuzzy, 2);
            $data['derajat_rendah'] = $derajat_rendah;
            $data['derajat_tinggi'] = $derajat_tinggi;
            $data['korban'] = $korban;
            $data['korban_persen'] = $korban_persen;
        }
        
        
        // var_dump($korban);
        // // die();
        $data['id_bencana'] = $id_bencana;
        $data['id_logistik'] = $id_logistik;
        $data['infobencana'] = $this->infobencana_model->get_infobencana();
        $data['jenis_logistik'] = $this->jenis_logistik_model->get_jenis_logistik();
        $data['title'] = 'Pendukung Keputusan';
        $this->load->view('admin/spk/index', $data);
    }

    private function derajat_rendah($var) {
        if($var  <= 4) {
            return $rendah_var = 1;
        } else if($var < 8 && $var > 4) {
            return $rendah_var = ( 8 - $var ) / ( 8 - 4 );
        } else if($var >= 8) {
            return $rendah_var = 0;
        }
    }

    private function derajat_tinggi($var) {
        if($var >= 8) {
            return $tinggi_var = 1;
        } else if($var > 4 && $var < 8) {
            return $tinggi_var = ( $var - 4) / (8 - 4);
        } else {
            return $tinggi_var = 0;
        }
    }

    public function hitung_fis() {
        
    }
    
    public function tambah_fis() {
        $data['title'] = 'FIS/Tambah';
        $this->load->view('admin/spk/add_FIS', $data);
    }
}