<?php
defined("BASEPATH") or exit("No direct script access allowed");


class Infobencana extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('statistik/infobencana_model');

        if(!$this->session->has_userdata('admin_loggedin')) {
            redirect(base_url('admin/login'));
        }
    }

    public function index() {
        $tahun = $this->input->get('tahun');
        $bulan = $this->input->get('bulan');

        if(!$tahun) {
            $tahun = date("Y");
        }

        if(!$bulan) {
            $bulan = date("m");
        }

        $data['bencana'] = $this->infobencana_model->get_count_infobencana($tahun, $bulan);
        $data['tahun'] = $tahun;
        $data['bulan'] = $bulan;
        $data['title'] = 'Statistik / Info Bencana';
        $this->load->view('admin/statistik/infobencana/index', $data);
    }
}