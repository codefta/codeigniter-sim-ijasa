<?php
defined("BASEPATH") or exit("No direct script access allowed");


class Donasi extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('statistik/donasi_model');

        if(!$this->session->has_userdata('admin_loggedin')) {
            redirect(base_url('admin/login'));
        }
    }

    public function index() {
        $tahun = $this->input->get('tahun');
        $bulan = $this->input->get('bulan');

        if(!$tahun) {
            $tahun =date("Y");
        }

        $donasi = (int) $this->donasi_model->get_donasi($tahun, $bulan)['jml_donasi'];
        $donasi_diterima = (int) $this->donasi_model->get_donasi_diterima($tahun, $bulan)['jml_donasi_diterima'];
        $donasi_belum_diterima = (int) $this->donasi_model->get_donasi_belum_diterima($tahun, $bulan)['jml_donasi_belum_diterima'];

        $donasi_data = array(
            'semua_donasi' => $donasi,
            'donasi_diterima' => $donasi_diterima,
            'donasi_belum_diterima' => $donasi_belum_diterima
        );

        $data['tahun'] = $tahun;
        $data['donasi'] = $donasi_data;
        $data['title'] = 'Statistik / Laporan Donasi';
        $this->load->view('admin/statistik/donasi/index', $data);
    }

    public function jenis_donasi() {
        $tahun = $this->input->get('tahun');
        $bulan = $this->input->get('bulan');
        $status = $this->input->get('status');

        if(!$tahun) {
            $tahun =date("Y");
        }

        if(!$status) {
            $status = 'diterima';
        }

        $data = [
            'pangan' => (int) $this->donasi_model->get_donasi_pangan($tahun, $bulan, $status)['jumlah'],
            'sandang' => (int) $this->donasi_model->get_donasi_sandang($tahun, $bulan, $status)['jumlah'],
            'papan' => (int) $this->donasi_model->get_donasi_papan($tahun, $bulan, $status)['jumlah']
        ];

        $data['donasi'] = $data;
        $data['status'] = $status;
        $data['tahun'] = $tahun;        
        $data['title'] = 'Statistik / Laporan Donasi';
        $this->load->view('admin/statistik/donasi/jenis_donasi', $data);
    }

}