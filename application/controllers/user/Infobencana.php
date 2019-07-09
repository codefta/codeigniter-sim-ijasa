<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Infobencana extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model(['infobencana_model', 'logistik_bencana_model', 'spk/prioritas_model']);
    }

    function show($id) {
        $data['infobencana'] = $this->infobencana_model->get_infobencana_id($id);
        $data['logistikbencana'] = $this->logistik_bencana_model->get_logistik_bencana_id($id);
        $data['prioritas'] = $this->prioritas_model->get_prioritas_by($id);
        $this->load->view('user/infobencana/index', $data);
    }
}