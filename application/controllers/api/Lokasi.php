<?php
defined("BASEPATH")  or exit("No direct script access allowed");

class Lokasi extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('lokasi_model');
    }

    public function daftar_kota(){
        $id_provinsi = $this->input->post('provinsi');
        $kota = $this->lokasi_model->get_kota($id_provinsi);
        
        $daftar = "<option value=''>Pilih kota/kabupaten</option>";

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

    function daftar_kota_edit() {
        $id_provinsi = $this->input->post('provinsi');
        $kota = $this->lokasi_model->get_kota($id_provinsi);

        $daftar_kota = [];

        foreach($kota as $item) {
            array_push($daftar_kota, ['id' => $item['id'], 'name' => $item['name']]);
        }

        $data = [
            'kota' => $daftar_kota
        ];

        echo json_encode($data);

    }
    
    function daftar_kecamatan_edit() {
        $id_kota = $this->input->post('kota');
        $kecamatan = $this->lokasi_model->get_kecamatan($id_kota);

        $daftar_kec = [];

        foreach($kecamatan as $item) {
            array_push($daftar_kec, ['id' => $item['id'], 'name' => $item['name']]);
        }

        $data = [
            'kecamatan' => $daftar_kec
        ];

        echo json_encode($data);

    }
    
    function daftar_desa_edit() {
        $id_kec = $this->input->post('kecamatan');
        $desa = $this->lokasi_model->get_desa($id_kec);

        $daftar_desa = [];

        foreach($desa as $item) {
            array_push($daftar_desa, ['id' => $item['id'], 'name' => $item['name']]);
        }

        $data = [
            'desa' => $daftar_desa
        ];

        echo json_encode($data);

    }

}