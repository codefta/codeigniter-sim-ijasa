<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Users extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("users_model");

        if(!$this->session->has_userdata('admin_loggedin')) {
            redirect(base_url('admin/login'));
        }
    }

    public function index() {
        $data['title'] = 'Manajemen Akun';
        $data['users'] = $this->users_model->get_users();
        $this->load->view('admin/users/index', $data);
    }
    
    public function show_users($id) {
        $data['user'] = $this->users_model->get_users_id($id);

        $this->load->view('admin/users/show', $data);
    }

    public function add_users() {
        $this->load->view('admin/users/add');

    }

    public function store_users() {

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_hp', 'No Handphone', 'required|is_unique[users.no_hp]');
        $this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.email]');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
        $this->form_validation->set_rules('role', 'Role', 'required');

        if($this->form_validation->run() === FALSE) {
            $this->load->view('admin/users/add');
        } else {

            $data = [
                'nama' => $this->input->post('nama'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'alamat' => $this->input->post("alamat"),
                'no_hp' => $this->input->post("no_hp"),
                'email' => $this->input->post("email"),
                'username' => $this->input->post('username'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role' => $this->input->post('role'),
                'foto' => $this->upload_photos()
            ];

            $store = $this->users_model->insert_users($data);

            if($store) {
                $this->session->set_flashdata('users_notif', 'Anda berhasil menambah akun baru');
                redirect(base_url('admin/users'));
            } else {
                $this->session->set_flashdata('users_notif', 'Anda gagal menambah akun baru');
                redirect(base_url('admin/users'));
            }

        }
    }

    
    public function save_users() {

        $id = $this->input->post('id');

        $data = [
            'nama' => $this->input->post('nama'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'alamat' => $this->input->post("alamat"),
            'no_hp' => $this->input->post("no_hp"),
            'email' => $this->input->post("email"),
            'username' => $this->input->post('username'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'role' => $this->input->post('role'),
            'foto' => $this->update_photos()
        ];

        $save = $this->users_model->update_users($data, $id);

        if($save) {
            $this->session->set_flashdata('users_notif', 'Anda berhasil mengubah akun baru');
            redirect(base_url('admin/users'));
        } else {
            $this->session->set_flashdata('users_notif', 'Anda gagal mengubah akun baru');
            redirect(base_url('admin/users'));
        }

    }

    public function destroy_users($id) {
        $data = $this->users_model->get_users_id($id);
        
        if($data['foto'] != 'profil_default.png') {
            unlink(FCPATH.'uploads/foto_profil/'. $data['foto']);
        }

        $remove = $this->users_model->delete_users($id);

        if($remove) {
            $this->session->set_flashdata('users_notif', 'Anda berhasil menghapus akun baru');
            redirect(base_url('admin/users'));
        } else {
            $this->session->set_flashdata('users_notif', 'Anda gagal menghapus akun baru');
            redirect(base_url('admin/users'));
        }
        
    }

    private function update_photos() {
        $config['upload_path'] = FCPATH.'uploads/foto_profil/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['file_name'] = $this->input->post('username').time();

        $this->load->library('upload', $config);

        $this->upload->initialize($config);

        if($this->upload->do_upload('foto')) {
            if($this->input->post('old_photo') != 'profil_default.png'){
                unlink(FCPATH.'uploads/foto_profil/'. $this->input->post('old_photo'));
            }

            $data_uploaded = $this->upload->data();
            return $data_uploaded['file_name'];
        } else {
            return $this->input->post('old_photo');
        }

    }
    
    private function upload_photos() {

        $config['upload_path'] = FCPATH.'uploads/foto_profil/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['file_name'] = $this->input->post('username').time();

        $this->load->library('upload', $config);

        $this->upload->initialize($config);

        if($this->upload->do_upload('foto')) {
            $data_uploaded = $this->upload->data();
            return $data_uploaded['file_name'];
        } else {
            return 'profil_default.png';
        }

    }
}