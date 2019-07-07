<?php
defined("BASEPATH") or exit("No direct script access allowed");


class Donatur extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('statistik/donatur_model');

        if(!$this->session->has_userdata('admin_loggedin')) {
            redirect(base_url('admin/login'));
        }
    }

    public function index() {
        $tahun = $this->input->get('tahun');
        $bulan = $this->input->get('bulan');

        $donatur = (int) $this->donatur_model->get_donatur_all($tahun, $bulan)['jml_semua_donatur'];
        $donatur_berdonasi = (int) $this->donatur_model->get_donatur_berdonasi_all($tahun, $bulan)['jml_donatur_berdonasi'];
        $donatur_belum_berdonasi = $donatur - $donatur_berdonasi;

        if($donatur_belum_berdonasi < 0) {
            $donatur_belum_berdonasi = 0;
        }

        if(!$tahun) {
            $tahun = date('Y');
        }

        if(empty($bulan)) {
            $bulan = date('m');
        }

        
        $donatur_angka = array(
            'semua_donatur' => $donatur,
            'donatur_berdonasi' => $donatur_berdonasi,
            'donatur_belum_berdonasi' => $donatur_belum_berdonasi
        );

        $data['donatur_angka'] = $donatur_angka;
        $data['tahun'] = $tahun;
        $data['bulan'] = $bulan;
        $data['title'] = 'Statistik / Donatur';
        $this->load->view('admin/statistik/donatur/index', $data);
    }

    public function stat_donatur_belum_berdonasi() {

    }
}