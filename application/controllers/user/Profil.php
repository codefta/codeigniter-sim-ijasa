<?php
defined("BASEPATH") or exit('No direct script access allowed');

class Profil extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('users_model');
    }

    function show_profil() {
        $id = $this->session->userdata('user_loggedin')['id'];
        $data['user'] = $this->users_model->get_users_id($id);

        $this->load->view('user/profil/index', $data);
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
            $this->session->set_flashdata('profil_notif', 'Anda berhasil mengubah akun baru');
            redirect(base_url('profil'));
        } else {
            $this->session->set_flashdata('profil_notif', 'Anda gagal mengubah akun baru');
            redirect(base_url('profil'));
        }
    }

    public function change_password() {
        $id = $this->session->userdata('user_loggedin')['id'];
        $data['user'] = $this->users_model->get_users_id($id);
        $this->load->view('user/profil/password', $data);
    }

    public function save_password() {
        $this->form_validation->set_rules('password_baru', 'Password Baru', 'min_length[8]|required');
        $this->form_validation->set_rules('password_baru2', 'Ulangi Password Baru', 'min_length[8]|required|required|matches[password_baru]');

        if($this->form_validation->run() === FALSE) {
            $id = $this->session->userdata('user_loggedin')['id'];
            $data['user'] = $this->users_model->get_users_id($id);
            $this->load->view('user/profil/password', $data);
        } else {
            $id = $this->input->post('id');
            $data = [
                'password' => password_hash($this->input->post('password_baru'), PASSWORD_DEFAULT),
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