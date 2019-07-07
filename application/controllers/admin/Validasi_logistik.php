<?php
defined("BASEPATH") or exit("No direct script access allowed");


class Validasi_logistik extends CI_Controller {
    
    public function __construct() {
        parent::__construct();

        $this->load->model('validasi_logistik_model');

        if(!$this->session->has_userdata('admin_loggedin')) {
            redirect(base_url('admin/login'));
        }
    }

    public function index() {
        $data['title'] = 'Validasi Logistik';
        $data['validasi_logistik'] = $this->validasi_logistik_model->get_validasi_logistik();

        $this->load->view('admin/validasi_logistik/index', $data);
    }

    public function validasi($id) {
        $data = [
            'status' => 1,
            'tgl_verifikasi' => date('Y-m-d H:i:s')
        ];

        $validasi = $this->validasi_logistik_model->verif_validasi_logistik($data, $id);

        if($validasi) {
            $this->session->set_flashdata('notif_validasi', '<span class="alert alert-success">Anda berhasil memvalidasi logistik</span>');
            redirect(base_url('admin/validasi_logistik'));
        } else {
            $this->session->set_flashdata('notif_validasi', '<span class="alert alert-danger">Anda gagal memvalidasi logistik</span>');            
            redirect(base_url('admin/validasi_logistik'));
        }
    }

    public function show_validasi($id) {
        $data['donasi_logistik'] = $this->validasi_logistik_model->get_validasi_logistik_by_id($id);
        $data['jenis_logistik'] = $this->validasi_logistik_model->get_jenis_logistik_donasi_by_id($id);
        
        $data['title'] = 'Validasi Logistik / Detail';
        $this->load->view('admin/validasi_logistik/show', $data);
    }
}