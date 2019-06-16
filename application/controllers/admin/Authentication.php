<?php
defined("BASEPATH") or exit("No direct script access allowed");


class Authentication extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('authentication_model');
    }

    public function index() {
        if($this->session->has_userdata('admin_loggedin')) {
            redirect(base_url('admin'));
        } else {
            $this->load->view('admin/authentication/index');
        }
    }

    public function login() {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if($this->form_validation->run() == FALSE) {
            $this->load->view('admin/authentication/index');
        } else {

            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $login = $this->authentication_model->check_login($username, $password);

            if($login) {
                $this->session->set_userdata('admin_loggedin', $login);
                redirect(base_url('admin'));
            } else {
                redirect(base_url('admin/authentication'));
            }
        }
    }

    public function logout() {
        $this->session->unset_userdata('admin_loggedin');

        redirect(base_url('admin/login'));
    }
    
}