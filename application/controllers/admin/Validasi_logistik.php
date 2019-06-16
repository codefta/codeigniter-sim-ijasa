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
            'status' => 1
        ];

        $validasi = $this->validasi_logistik_model->verif_validasi_logistik($data, $id);

        if($validasi) {
            redirect(base_url('admin/validasi_logistik'));
        } else {
            redirect(base_url('admin/validasi_logistik'));
        }
    }
}