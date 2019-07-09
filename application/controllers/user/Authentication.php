<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Authentication extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model(["users_model", 'authentication_model']);
    }

    function index() {
        if($this->session->has_userdata('user_loggedin')){
            redirect(base_url());
        } else {
            $this->load->view("user/authentication/login");
        }
    }

    function login() {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if($this->form_validation->run() == FALSE) {
            $this->load->view('user/authentication/login');
        } else {

            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $login = $this->authentication_model->check_login_user($username, $password);

            if($login) {
                $this->session->set_userdata('user_loggedin', $login);
                redirect(base_url());
            } else {
                $this->session->set_flashdata('users_notif', '<span class="alert alert-danger">Username/Password anda salah</span>');
                redirect(base_url('user/authentication/login'));
            }
        }
    }

    function logout() {
        $this->session->unset_userdata('user_loggedin');
        $this->session->set_flashdata('users_notif', '<span class="alert alert-success">Anda berhasil logout</span>');

        redirect(base_url('login'));
    }

    function register() {
        $this->load->view('user/authentication/register');
    }

    public function store() {

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_hp', 'No Handphone', 'required|is_unique[users.no_hp]');
        $this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.email]');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');        

        if($this->form_validation->run() === FALSE) {
            $this->load->view('user/authentication/register');
        } else {

            $data = [
                'nama' => $this->input->post('nama'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'alamat' => $this->input->post("alamat"),
                'no_hp' => $this->input->post("no_hp"),
                'email' => $this->input->post("email"),
                'username' => $this->input->post('username'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role' => 'User',
            ];

            $store = $this->users_model->insert_users($data);

            if($store) {
                $this->session->set_flashdata('users_notif', '<span class="alert alert-success">Anda berhasil mendaftar</span>');
                redirect(base_url('login'));
            } else {
                $this->session->set_flashdata('users_notif', '<span class="alert alert-danger">Anda berhasil mendaftar</span>');
                redirect(base_url('login'));
            }
        }
    }
}