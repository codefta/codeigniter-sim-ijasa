<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Donasi_logistik extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model(["donasi_logistik_model", 'infobencana_model', 'jenis_logistik_model']);
        
        if(!$this->session->has_userdata('user_loggedin')) {
            redirect(base_url('login'));
        }
    }

    function show($id) {
        $data['logistik'] = $this->jenis_logistik_model->get_jenis();
        $data['infobencana'] = $this->infobencana_model->get_infobencana_id($id);
        $this->load->view('user/donasi_logistik/index', $data);
    }

    function create() {
        $data = [
            'info_bencana_id2' => $this->input->post('id_bencana'),
            'user_id' => $this->input->post('id_user'),
        ];

        $donasi_logistik_id = $this->donasi_logistik_model->insert_donasi_logistik($data);

        for($i=0; $i < count($this->input->post('jenis_logistik')); $i++) {
            $data_jenis_logistik[] = [
                'jenis_logistik_id' => $this->input->post('nama_logistik[]')[$i],
                'jumlah' => $this->input->post('jumlah_logistik[]')[$i],
                'donasi_logistik_id' => $donasi_logistik_id
            ];
        }

        $donasi_jenis_logistik = $this->donasi_logistik_model->insert_jenis_logistik_donasi($data_jenis_logistik);

        $store = $donasi_logistik_id && $donasi_jenis_logistik;

        if($store) {
            $this->session->set_flashdata('notif_donasi_logistik', 'Anda telah berhasil berdonasi logistik');
            redirect(base_url('donasi/status'));
        } else {
            $this->session->set_flashdata('notif_donasi_logistik', 'Anda telah gagal berdonasi logistik');
            redirect(base_url('donasi/add'));
        }
    }

    function status() {
        $user_id = $this->session->userdata('user_loggedin')['id'];
        $data['donasi_logistik'] = $this->donasi_logistik_model->get_donasi_logistik_by_id($user_id);
        
        $this->load->view('user/donasi_logistik/status', $data);
    }
}