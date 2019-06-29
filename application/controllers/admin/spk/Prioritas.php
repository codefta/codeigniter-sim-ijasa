<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Prioritas extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {

        $data['title'] = 'Pendukung Keputusan';
        // $data['infobencana'] = $this->spk_model->get_logistik_bencana();
        $this->load->view('admin/spk/index', $data);
    }
    
    public function tambah_fis() {
        $data['title'] = 'FIS/Tambah';
        $this->load->view('admin/spk/add_FIS', $data);
    }
}