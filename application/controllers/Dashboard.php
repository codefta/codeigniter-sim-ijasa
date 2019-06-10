<?php
defined("BASEPATH") or exit("No direct script access allowed");


class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        if(!$this->session->has_userdata('user_loggedin')) {
            redirect(base_url('login'));
        }
    }

    
    public function index() {
        $this->load->view('dashboard/index');
    }
}