<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Lokasi_model extends CI_Model {

    public function get_provinsi() {
        return $this->db->get('provinces')->result_array();
    }

    public function get_kota_all() {
        return $this->db->get('regencies')->result_array();
    }

    public function get_kecamatan_all() {
        return $this->db->get('districts')->result_array();
    }

    public function get_desa_all() {
        return $this->db->get('villages')->result_array();
    }

    public function get_kota($id) {
        return $this->db->where('province_id ='.$id)->get('regencies')->result_array();
    }

    public function get_kecamatan($id) {
        return $this->db->where('regency_id ='.$id)->get('districts')->result_array();
    }

    public function get_desa($id) {
        return $this->db->where('district_id ='.$id)->get('villages')->result_array();
    }


}