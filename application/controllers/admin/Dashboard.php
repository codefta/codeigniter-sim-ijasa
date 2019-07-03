<?php
defined("BASEPATH") or exit("No direct script access allowed");


class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(['statistik/donasi_model', 'statistik/donatur_model', 'statistik/kebutuhan_model', 'statistik/infobencana_model']);
        
        if(!$this->session->has_userdata('admin_loggedin')) {
            redirect(base_url('admin/login'));
        }
    }

    
    public function index() {
        $tahun = date("Y");
        $bulan = date("m");
        
        // Donasi
        $donasi = (int) $this->donasi_model->get_donasi($tahun, $bulan)['jml_donasi'];
        $donasi_diterima = (int) $this->donasi_model->get_donasi_diterima($tahun, $bulan)['jml_donasi_diterima'];
        $donasi_belum_diterima = (int) $this->donasi_model->get_donasi_belum_diterima($tahun, $bulan)['jml_donasi_belum_diterima'];

        $donasi_data = array(
            'semua_donasi' => $donasi,
            'donasi_diterima' => $donasi_diterima,
            'donasi_belum_diterima' => $donasi_belum_diterima
        );

        // Donatur
        $donatur = (int) $this->donatur_model->get_donatur_all($tahun, $bulan)['jml_semua_donatur'];
        $donatur_berdonasi = (int) $this->donatur_model->get_donatur_berdonasi_all($tahun, $bulan)['jml_donatur_berdonasi'];
        $donatur_belum_berdonasi = $donatur - $donatur_berdonasi;

        if($donatur_belum_berdonasi < 0) {
            $donatur_belum_berdonasi = 0;
        }

        $donatur_angka = array(
            'semua_donatur' => $donatur,
            'donatur_berdonasi' => $donatur_berdonasi,
            'donatur_belum_berdonasi' => $donatur_belum_berdonasi
        );

        // Kebutuhan

        $kebutuhan = array(
            'sandang' =>  $this->kebutuhan_model->get_kebutuhan_sandang($tahun, $bulan)['jumlah'],
            'papan' =>  $this->kebutuhan_model->get_kebutuhan_papan($tahun, $bulan)['jumlah'],
            'pangan' => $this->kebutuhan_model->get_kebutuhan_pangan($tahun, $bulan)['jumlah'],
        );

        $data['bencana'] = $this->infobencana_model->get_count_infobencana($tahun, $bulan);
        $data['kebutuhan'] = $kebutuhan;
        $data['donatur_angka'] = $donatur_angka;
        $data['donasi'] = $donasi_data;
        $data['title'] = 'Dasboard';
        $this->load->view('admin/dashboard/index', $data);
    }
}