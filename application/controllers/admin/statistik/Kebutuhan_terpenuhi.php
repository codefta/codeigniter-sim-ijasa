<?php

class Kebutuhan_terpenuhi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(['statistik/kebutuhan_terpenuhi_model', 'infobencana_model']);
    }

    public function index() {
        $id_bencana = $this->input->get('id_bencana');

        if(empty($id_bencana)) {
            $id_bencana = $this->infobencana_model->get_infobencana()[0]['id'];
        }

        $kebutuhan = $this->kebutuhan_terpenuhi_model->count_kebutuhan_bencana($id_bencana);
        $donasi = $this->kebutuhan_terpenuhi_model->count_donasi_bencana($id_bencana);

        $kebutuhan_result = [];
        foreach($kebutuhan as $item) {
            $kebutuhan_result[$item['nama_logistik']] = $item['jumlah'];
        }

        $donasi_result = [];
        foreach($donasi as $item) {
            $donasi_result[$item['nama_logistik']] = $item['jumlah'];
        }

        $data['kebutuhan'] = $kebutuhan_result;
        $data['id_bencana'] = $id_bencana;
        $data['infobencana'] = $this->infobencana_model->get_infobencana();
        $data['donasi'] = $donasi_result;
        $data['title'] = 'Statistik / Kebutuhan Terpenuhi';
        $this->load->view('admin/statistik/kebutuhan_terpenuhi/index', $data);

    }
}