<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Jenis_logistik extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('jenis_logistik_model');
        
        if(!$this->session->has_userdata('user_loggedin')) {
            redirect(base_url('login'));
        }
    }

    public function index() {
        $data['logistik'] = $this->jenis_logistik_model->get_jenis_logistik();
        $this->load->view('jenis_logistik/index', $data);
    }

    public function add_logistik() {
        $this->load->view('jenis_logistik/add');
    }

    public function insert_logistik() {
        $this->form_validation->set_rules('nama_logistik', 'Nama Logistik', 'required');
        $this->form_validation->set_rules('jenis_logistik', 'Jenis Logistik', 'required');

        if($this->form_validation->run() == FALSE) {
            $this->load->view('jenis_logistik/add');
        } else {

            $data = [
                'nama' => $this->input->post('nama_logistik'),
                'jenis' => $this->input->post('jenis_logistik'),
                'keterangan' => $this->input->post('keterangan')
            ];

            $save = $this->jenis_logistik_model->insert_jenis_logistik($data);

            if($save) {
                $this->session->set_flashdata('notif_logistik', 'Anda telah berhasil menambah logistik');
                redirect(base_url('jenis_logistik'));
            } else {
                $this->session->set_flashdata('notif_logistik', 'Anda gagal menambah logistik');
                redirect(base_url('jenis_logistik'));
            }
        }
    }

    public function edit_logistik($id) {
        $data['logistik'] = $this->jenis_logistik_model->get_jenis_logistik_by($id);

        $this->load->view('jenis_logistik/edit', $data);
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
            $this->session->set_flashdata('notif_logistik', 'Anda telah berhasil mengubah logistik');
            redirect(base_url('jenis_logistik'));
        } else {
            $this->session->set_flashdata('notif_logistik', 'Anda gagal mengubah logistik');
            redirect(base_url('jenis_logistik'));
        }
    }

    public function delete_logistik($id) {
        $delete = $this->jenis_logistik_model->delete_jenis_logistik($id);

        if($delete) {
            $this->session->set_flashdata('notif_logistik', 'Anda telah berhasil menghapus logistik');
            redirect(base_url('jenis_logistik'));
        } else {
            $this->session->set_flashdata('notif_logistik', 'Anda gagal menghapus logistik');
            redirect(base_url('jenis_logistik'));
        }
    }

    public function nama_logistik() {
        $jenis_logistik = $this->input->post('jenis_logistik');
        
        $nama_logistik = $this->jenis_logistik_model->get_logistik_by_jenis($jenis_logistik);

        $daftar = "<option value=''>Pilih nama logistik</option>";

        foreach($nama_logistik as $data){
            $daftar .= "<option value='".$data['id']."'>".$data['nama']."</option>";
        }
        
        $callback = array('nama_logistik' => $daftar);
        echo json_encode($callback);
    }
}