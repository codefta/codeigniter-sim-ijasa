<?php
defined("BASEPATH") or exit("No direct script access allowed");


class Authentication extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('authentication_model');
    }

    public function index() {
        if($this->session->has_userdata('user_loggedin')) {
            redirect(base_url());
        } else {
            $this->load->view('authentication/index');
        }
    }

    public function login() {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if($this->form_validation->run() == FALSE) {
            $this->load->view('authentication/index');
        } else {

            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $login = $this->authentication_model->check_login($username, $password);

            if($login) {
                $this->session->set_userdata('user_loggedin', $login);
                redirect(base_url());
            } else {
                redirect(base_url('authentication'));
            }
        }
    }

    public function logout() {
        $this->session->unset_userdata('user_loggedin');
        $this->session->sess_destroy();

        redirect(base_url('login'));
    }
    
}