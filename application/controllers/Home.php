<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Home extends CI_Controller{

    function __construct() {
        parent::__construct();
        $this->load->model("infobencana_model");
    }

    function index() {
        $data['infobencana'] = $this->infobencana_model->get_infobencana();
        $this->load->view('user/home/index.php', $data);
    }
}