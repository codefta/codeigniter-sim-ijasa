<?php
defined("BASEPATH")  or exit("No direct script access allowed");

class Lokasi extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('lokasi_model');
    }

    // public function daftar_provinsi() {
    //     $data = $this->lokasi_model->get_provinsi();

    //     return $this->output
    //                 ->set_status_header(200)
    //                 ->set_content_type('application/json', 'utf-8')
    //                 ->set_output(json_encode(
    //                     [
    //                         'status' => 'OK',
    //                         'data' => $data
    //                     ]
    //                 ));
    // }

    public function daftar_kota(){
        $id_provinsi = $this->input->post('provinsi');
        $kota = $this->lokasi_model->get_kota($id_provinsi);
        
        $daftar = "<option value=''>Pilih kota/kab</option>";

        foreach($kota as $data){
            $daftar .= "<option value='".$data['id']."'>".$data['name']."</option>";
        }
        $callback = array('kota' => $daftar);
        echo json_encode($callback);
    }

    public function daftar_kecamatan(){
        $id_kota = $this->input->post('kota');
        $kecamatan = $this->lokasi_model->get_kecamatan($id_kota);
        
        $daftar = "<option value=''>Pilih kecamatan</option>";

        foreach($kecamatan as $data){
            $daftar .= "<option value='".$data['id']."'>".$data['name']."</option>";
        }
        $callback = array('kecamatan' => $daftar);
        echo json_encode($callback);
    }

    public function daftar_desa(){
        $id_kecamatan = $this->input->post('kecamatan');
        $desa = $this->lokasi_model->get_desa($id_kecamatan);
        
        $daftar = "<option value=''>Pilih desa</option>";

        foreach($desa as $data){
            $daftar .= "<option value='".$data['id']."'>".$data['name']."</option>";
        }
        $callback = array('desa' => $daftar);
        echo json_encode($callback);
    }

}