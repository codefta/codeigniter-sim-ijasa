<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Jenis_logistik_api extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('jenis_logistik_model');
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

    public function nama_logistik_update() {
        $jenis_logistik = $this->input->post('jenis_logistik');
        
        $nama_logistik = $this->jenis_logistik_model->get_logistik_by_jenis($jenis_logistik);

        $daftar = [];

        foreach($nama_logistik as $data){
            $daftar [$data['id']] = $data['nama'];
        }
        
        $callback = array('nama_logistik' => $daftar);
        echo json_encode($callback);
    }
}