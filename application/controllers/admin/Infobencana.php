<?php
defined("BASEPATH") or exit("No direct script access allowed");


class Infobencana extends CI_Controller {
    
    public function __construct() {
        parent::__construct();

        $this->load->model(['lokasi_model', 'jenis_logistik_model', 'infobencana_model', 'logistik_bencana_model']);

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

    public function add_infobencana() {
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
        $this->form_validation->set_rules('jenis_logistik[]', 'Nama Logistik', 'required');
        
        for($i = 0; $i < count($this->input->post('nama_logistik[]')); $i++) {
            $this->form_validation->set_rules('nama_logistik[]', 'Nama Logistik', 'required');
            $this->form_validation->set_rules('jenis_logistik[]', 'Jenis Logistik', 'required');
            $this->form_validation->set_rules('jumlah_logistik[]', 'Jumlah Logistik', 'required');
        }

        if($this->form_validation->run() === FALSE) {
            $data['provinsi'] = $this->lokasi_model->get_provinsi();
            $data['logistik'] = $this->jenis_logistik_model->get_jenis();
            $this->load->view('infobencana/add', $data);
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

            for($i=0; $i < count($this->input->post('jenis_logistik')); $i++) {
                $data[] = [
                    'info_bencana_id' => $infobencana_id,
                    'jenis_logistik_id' => $this->input->post('nama_logistik[]')[$i],
                    'jumlah' => $this->input->post('jumlah_logistik[]')[$i]
                ];
            }

            // print_r($data);
            // die();

            $store = $this->logistik_bencana_model->insert_logistik_bencana($data);

            if($store) {
                $this->session->set_flashdata('notif_infobencana', 'Anda telah berhasil menambah info bencana');
                redirect(base_url('admin/infobencana'));
            } else {
                $this->session->set_flashdata('notif_infobencana', 'Anda gagal menambah info bencana');
                redirect(base_url('admin/infobencana'));
            }
        }
    }

    public function edit_infobencana($id) {
        $data['provinsi'] = $this->lokasi_model->get_provinsi();
        $data['kota'] = $this->lokasi_model->get_kota_all();
        $data['kecamatan'] = $this->lokasi_model->get_kecamatan_all();
        $data['desa'] = $this->lokasi_model->get_desa_all();

        $data['infobencana'] = $this->logistik_bencana_model->get_logistik_bencana_id($id);

        $this->load->view('infobencana/edit', $data);
    }

    public function save_infobencana() {

    }

    public function destroy_infobencana($id) {

        $data = $this->infobencana_model->get_infobencana_id($id);
        
        if($data['foto'] != 'bencana_default.png') {
            unlink(FCPATH.'uploads/foto_profil/'. $data['foto']);
        }

        $delete = $this->infobencana_model->delete_infobencana($id);

        if($delete) {
            $this->session->set_flashdata('notif_infobencana', 'Anda telah berhasil menghapus info bencana');
            redirect(base_url('infobencana'));
        } else {
            $this->session->set_flashdata('notif_infobencana', 'Anda gagal menghapus info bencana');
            redirect(base_url('infobencana'));
        }
    }

    private function _update_photos() {
        $config['upload_path'] = FCPATH.'uploads/foto_profil/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['file_name'] = $this->input->post('username').time();

        $this->load->library('upload', $config);

        $this->upload->initialize($config);

        if($this->upload->do_upload('foto')) {
            if($this->input->post('old_photo') != 'profil_default.png'){
                unlink(FCPATH.'uploads/foto_profil/'. $this->input->post('old_photo'));
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
}