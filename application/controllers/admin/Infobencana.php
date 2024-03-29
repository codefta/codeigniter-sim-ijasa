<?php
defined("BASEPATH") or exit("No direct script access allowed");


class Infobencana extends CI_Controller {
    
    public function __construct() {
        parent::__construct();

        $this->load->model(['lokasi_model', 'jenis_logistik_model', 'infobencana_model', 'logistik_bencana_model', 'korban_bencana_model', 'spk/prioritas_model']);

        if(!$this->session->has_userdata('admin_loggedin')) {
            redirect(base_url('admin/login'));
        }
    }

    public function index() {
        // echo "<pre>";
        $data['title'] = 'Info Bencana';
        $data['infobencana'] = $this->logistik_bencana_model->get_logistik_bencana();
        $this->load->view('admin/infobencana/index', $data);
    }
    
    public function kebutuhan_bencana($id) {
        $data['title'] = 'Info Bencana / Kebutuhan Bencana';
        $data['infobencana'] = $this->logistik_bencana_model->get_logistik_bencana_id($id);
        
        $this->load->view('admin/infobencana/kebutuhan_bencana', $data);
    }

    public function korban_bencana($id) {
        $data['title'] = 'Info Bencana / Korban Bencana';
        $data['infobencana'] = $this->korban_bencana_model->get_korban_bencana_id($id);

        $this->load->view('admin/infobencana/korban_bencana', $data);
    }

    public function add_infobencana() {
        $data['title'] = 'Info Bencana / Tambah';
        $data['provinsi'] = $this->lokasi_model->get_provinsi();
        $data['logistik'] = $this->jenis_logistik_model->get_jenis();
        $this->load->view('admin/infobencana/add', $data);
    }

    public function store_infobencana() {
        $this->form_validation->set_rules('nama_bencana', 'Nama Bencana', 'required');
        $this->form_validation->set_rules('deskripsi_bencana', 'Deskripsi Bencana', 'required');
        $this->form_validation->set_rules('provinsi_id', 'Provinsi', 'required');
        $this->form_validation->set_rules('kota_id', 'Kota', 'required');
        $this->form_validation->set_rules('kecamatan_id', 'kecamatan', 'required');
        $this->form_validation->set_rules('desa_id', 'Desa', 'required');
        $this->form_validation->set_rules('anak', 'Anak-anak', 'required');
        $this->form_validation->set_rules('laki', 'Laki-laki', 'required');
        $this->form_validation->set_rules('perempuan', 'Perempaun', 'required');
        $this->form_validation->set_rules('jenis_logistik[]', 'Nama Logistik', 'required');
        
        for($i = 0; $i < count($this->input->post('nama_logistik[]')); $i++) {
            $this->form_validation->set_rules('nama_logistik[]', 'Nama Logistik', 'required');
            $this->form_validation->set_rules('jenis_logistik[]', 'Jenis Logistik', 'required');
            $this->form_validation->set_rules('jumlah_logistik[]', 'Jumlah Logistik', 'required');
        }

        if($this->form_validation->run() === FALSE) {
            $data['title'] = 'Info Bencana / Tambah';
            $data['provinsi'] = $this->lokasi_model->get_provinsi();
            $data['logistik'] = $this->jenis_logistik_model->get_jenis();
            $this->load->view('admin/infobencana/add', $data);
        } else {

            $data_infobencana = [
                'nama' => $this->input->post('nama_bencana'),
                'deskripsi' => $this->input->post('deskripsi_bencana'),
                'provinsi_id' => $this->input->post('provinsi_id'),
                'kota_id' => $this->input->post('kota_id'),
                'kecamatan_id' => $this->input->post('kecamatan_id'),
                'desa_id' => $this->input->post('desa_id'),
                'foto' => $this->_upload_photos()
            ];

            $infobencana_id = $this->infobencana_model->insert_infobencana($data_infobencana);

            $data_korban = [
                'laki' => $this->input->post('laki'),
                'perempuan' => $this->input->post('perempuan'),
                'anak' => $this->input->post('anak'),
                'info_bencana_id' => $infobencana_id
            ];
            
            $save_korban = $this->korban_bencana_model->insert_korban_bencana($data_korban);


            for($i=0; $i < count($this->input->post('jenis_logistik')); $i++) {
                $data[] = [
                    'info_bencana_id' => $infobencana_id,
                    'jenis_logistik_id' => $this->input->post('nama_logistik[]')[$i],
                    'jumlah' => $this->input->post('jumlah_logistik[]')[$i]
                ];
            }

            $store = $this->logistik_bencana_model->insert_logistik_bencana($data);

            if($store) {
                $this->session->set_flashdata('notif_infobencana', '<span class="alert alert-success">Anda telah berhasil menambah info bencana</span>');
                redirect(base_url('admin/infobencana'));
            } else {
                $this->session->set_flashdata('notif_infobencana', '<span class="alert alert-danger">Anda gagal menambah info bencana</span>');
                redirect(base_url('admin/infobencana'));
            }
        }
    }

    public function edit_infobencana($id) {
        $data['title'] = 'Info Bencana / Ubah';
        $data['provinsi'] = $this->lokasi_model->get_provinsi();

        $data['logistik'] = $this->jenis_logistik_model->get_jenis();    
            
        $data['infobencana'] = $this->infobencana_model->get_infobencana_id($id);
        $data['korban_bencana'] = $this->korban_bencana_model->get_korban_bencana_id($id);
        $data['logistikbencana'] = $this->logistik_bencana_model->get_logistik_bencana_id($id);

        $this->load->view('admin/infobencana/edit', $data);
    }

    public function save_infobencana() {

        $id_bencana = $this->input->post('id_bencana');

        $data_infobencana = [
            'nama' => $this->input->post('nama_bencana'),
            'deskripsi' => $this->input->post('deskripsi_bencana'),
            'provinsi_id' => $this->input->post('provinsi_id'),
            'kota_id' => $this->input->post('kota_id'),
            'kecamatan_id' => $this->input->post('kecamatan_id'),
            'desa_id' => $this->input->post('desa_id'),
            'foto' => $this->_update_photos()
        ];

        $infobencana = $this->infobencana_model->update_infobencana($data_infobencana, $id_bencana);

        $data_korban = [
            'laki' => $this->input->post('laki'),
            'perempuan' => $this->input->post('perempuan'),
            'anak' => $this->input->post('anak'),
        ];
        
        $save_korban = $this->korban_bencana_model->update_korban_bencana($data_korban, $id_bencana);
        
        for($i=0; $i < count($this->input->post('jenis_logistik')); $i++) {
            $data_kebutuhan['id'] = $this->input->post('id_utama')[$i];
            $data_kebutuhan['info_bencana_id'] = $id_bencana;
            $data_kebutuhan['jenis_logistik_id'] = $this->input->post('nama_logistik[]')[$i];
            $data_kebutuhan['jumlah'] = $this->input->post('jumlah_logistik[]')[$i];

            // $data_kebutuhan[] = [
                // 'id' => $this->input->post('id')[$i],
            //     'info_bencana_id' => $id_bencana,
            //     'jenis_logistik_id' => $this->input->post('nama_logistik[]')[$i],
            //     'jumlah' => $this->input->post('jumlah_logistik[]')[$i]
            // ];
            // var_dump($data_kebutuhan);
            
        }
        // die();
        $store = $this->logistik_bencana_model->replace_logistik_bencana($data_kebutuhan);
        if($store) {
            $this->session->set_flashdata('notif_infobencana', '<span class="alert alert-success">Anda telah berhasil mengubah info bencana</span>');
            redirect(base_url('admin/infobencana'));
        } else {
            $this->session->set_flashdata('notif_infobencana', '<span class="alert alert-danger">Anda gagal mengubah info bencana</span>');
            redirect(base_url('admin/infobencana'));
        }
    }

    public function destroy_infobencana($id) {

        $data = $this->infobencana_model->get_infobencana_id($id);
        
        if($data['foto'] != 'bencana_default.png') {
            unlink(FCPATH.'uploads/foto_profil/'. $data['foto']);
        }

        $delete = $this->infobencana_model->delete_infobencana($id);

        if($delete) {
            $this->session->set_flashdata('notif_infobencana', '<span class="alert alert-success">Anda telah berhasil menghapus info bencana</span>');
            redirect(base_url('admin/infobencana'));
        } else {
            $this->session->set_flashdata('notif_infobencana', '<span class="alert alert-danger">Anda gagal menghapus info bencana</span>');
            redirect(base_url('admin/infobencana'));
        }
    }

    private function _update_photos() {
        $config['upload_path'] = FCPATH.'uploads/infobencana/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['file_name'] = $this->input->post('nama_bencana').time();

        $this->load->library('upload', $config);

        $this->upload->initialize($config);

        if($this->upload->do_upload('foto_bencana')) {
            if($this->input->post('old_photo') != 'bencana_default.png'){
                unlink(FCPATH.'uploads/infobencana/'. $this->input->post('old_photo'));
            }

            $data_uploaded = $this->upload->data();
            return $data_uploaded['file_name'];
        } else {
            return $this->input->post('old_photo');
        }

    }
    
    private function _upload_photos() {

        $config['upload_path'] = FCPATH.'uploads/infobencana/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['file_name'] = $this->input->post('nama_bencana').time();

        $this->load->library('upload', $config);

        $this->upload->initialize($config);

        if($this->upload->do_upload('foto_bencana')) {
            $data_uploaded = $this->upload->data();
            return $data_uploaded['file_name'];
        } else {
            return 'bencana_default.png';
        }

    }

    public function get_logistik_bencana($id) {
        $logistik_bencana = $this->logistik_bencana_model->get_logistik_bencana_edit_id($id);

        $data = [
            'data' => $logistik_bencana,
            'status' => true
        ];

        echo json_encode($data);
    }

    public function get_jenis_logistik() {
        $jenis_logistik = $this->jenis_logistik_model->get_jenis();

        $data = [
            'data' => $jenis_logistik,
            'status' => true
        ];

        echo json_encode($data);
    }

    public function get_nama_logistik($jenis_logistik) {
        $jenis_logistik = $this->jenis_logistik_model->get_logistik_by_jenis($jenis_logistik);

        $data = [
            'data' => $jenis_logistik,
            'status' => true
        ];

        echo json_encode($data);
    }

    public function remove_logistik_bencana($id) {
        $remove = $this->logistik_bencana_model->delete_logistik_bencana($id);

        if($remove) {
            $data = [
                'status' => true
            ];
        } else {
            $data = [
                'status' => false
            ];
        }

        echo json_encode($data);
    }
}