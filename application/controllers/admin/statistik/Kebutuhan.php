<?php
defined("BASEPATH") or exit("No direct script access allowed");


class Kebutuhan extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('statistik/kebutuhan_model');

        if(!$this->session->has_userdata('admin_loggedin')) {
            redirect(base_url('admin/login'));
        }
    }

    public function index() {
        $tahun = $this->input->get('tahun');
        $bulan = $this->input->get('bulan');

        if(empty($tahun)) {
            $tahun = date('Y');
        }

        $kebutuhan = array(
            'sandang' =>  $this->kebutuhan_model->get_kebutuhan_sandang($tahun, $bulan)['jumlah'],
            'papan' =>  $this->kebutuhan_model->get_kebutuhan_papan($tahun, $bulan)['jumlah'],
            'pangan' => $this->kebutuhan_model->get_kebutuhan_pangan($tahun, $bulan)['jumlah'],
        );

        // var_dump($kebutuhan);
        // die();


        $data['tahun'] = $tahun;
        $data['kebutuhan'] = $kebutuhan;
        $data['title'] = 'Statistik / Kebutuhan Bencana';
        $this->load->view('admin/statistik/kebutuhan/index', $data);
    }

    public function stat_donatur_belum_berdonasi() {

    }
}