<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Jenis_logistik extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('jenis_logistik_model');
        
        if(!$this->session->has_userdata('admin_loggedin')) {
            redirect(base_url('admin/login'));
        }
    }

    public function index() {
        $data['title'] = 'Jenis Logistik';
        $data['logistik'] = $this->jenis_logistik_model->get_jenis_logistik();
        $this->load->view('admin/jenis_logistik/index', $data);
    }

    public function add_logistik() {
        $data['title'] = 'Jenis Logistik / Tambah';
        $this->load->view('admin/jenis_logistik/add', $data);
    }

    public function insert_logistik() {
        $this->form_validation->set_rules('nama_logistik', 'Nama Logistik', 'required');
        $this->form_validation->set_rules('jenis_logistik', 'Jenis Logistik', 'required');

        if($this->form_validation->run() == FALSE) {
            $this->load->view('admin/jenis_logistik/add');
        } else {

            $data = [
                'nama' => $this->input->post('nama_logistik'),
                'jenis' => $this->input->post('jenis_logistik'),
                'keterangan' => $this->input->post('keterangan')
            ];

            $save = $this->jenis_logistik_model->insert_jenis_logistik($data);

            if($save) {
                $this->session->set_flashdata('notif_logistik', '<span class="alert alert-success">Anda telah berhasil menambah logistik</span>');
                redirect(base_url('admin/jenis_logistik'));
            } else {
                $this->session->set_flashdata('notif_logistik', '<span class="alert alert-danger">Anda gagal menambah logistik</span>');
                redirect(base_url('admin/jenis_logistik'));
            }
        }
    }

    public function edit_logistik($id) {
        $data['title'] = 'Jenis Logistik / Ubah';
        $data['logistik'] = $this->jenis_logistik_model->get_jenis_logistik_by($id);

        $this->load->view('admin/jenis_logistik/edit', $data);
    }

    public function update_logistik() {
        $id = $this->input->post('id');
        $data = [
            'nama' => $this->input->post('nama_logistik'),
            'jenis' => $this->input->post('jenis_logistik'),
            'keterangan' => $this->input->post('keterangan')
        ];

        $update = $this->jenis_logistik_model->update_jenis_logistik($id, $data);

        if($update) {
            $this->session->set_flashdata('notif_logistik', '<span class="alert alert-success">Anda telah berhasil mengubah logistik</span>');
            redirect(base_url('admin/jenis_logistik'));
        } else {
            $this->session->set_flashdata('notif_logistik', '<span class="alert alert-danger">Anda gagal mengubah logistik</span>');
            redirect(base_url('admin/jenis_logistik'));
        }
    }

    public function delete_logistik($id) {
        $delete = $this->jenis_logistik_model->delete_jenis_logistik($id);

        if($delete) {
            $this->session->set_flashdata('notif_logistik', '<span class="alert alert-success">Anda telah berhasil menghapus logistik</span>');
            redirect(base_url('admin/jenis_logistik'));
        } else {
            $this->session->set_flashdata('notif_logistik', '<span class="alert alert-danger">Anda gagal menghapus logistik</span>');
            redirect(base_url('admin/jenis_logistik'));
        }
    }
}