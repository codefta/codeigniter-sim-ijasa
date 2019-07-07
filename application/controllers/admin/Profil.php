<?php
defined("BASEPATH") or exit("No direct script access allowed");


class Profil extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('users_model');
        
        if(!$this->session->has_userdata('admin_loggedin')) {
            redirect(base_url('admin/login'));
        }
    }

    public function index() {
        $id = $this->session->userdata('admin_loggedin')['id'];
        $data['title'] = 'Profil Saya';
        $data['user'] = $this->users_model->get_users_id($id);

        $this->load->view('admin/profil/index', $data);
    }

    public function save_profil() {
        $id = $this->input->post('id');

        $data = [
            'nama' => $this->input->post('nama'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'alamat' => $this->input->post("alamat"),
            'no_hp' => $this->input->post("no_hp"),
            'email' => $this->input->post("email"),
            'username' => $this->input->post('username'),
            'foto' => $this->update_photos()
        ];

        $save = $this->users_model->update_users($data, $id);

        if($save) {
            $this->session->set_flashdata('profil_notif', '<span class="alert alert-success">Anda berhasil mengubah profil</span>');
            redirect(base_url('admin/profil'));
        } else {
            $this->session->set_flashdata('profil_notif', '<span class="alert alert-danger">Anda gagal mengubah profil</span>');
            redirect(base_url('admin/profil'));
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
}