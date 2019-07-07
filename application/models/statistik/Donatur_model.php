<?php
defined("BASEPATH") or exit("No direct script access allowed");


class Donatur_model extends CI_Model {

    public function get_donatur_all($tahun= NULL, $bulan = NULL) {
        if($tahun && $bulan) {
            return $this->db->query("SELECT count(id) jml_semua_donatur FROM users where substring(created_at, 1, 4) = $tahun AND substring(created_at, 6, 2) = $bulan AND `role` = 'User' ")->row_array(); 
        } else if($tahun) {
            return $this->db->query("SELECT count(id) jml_semua_donatur FROM users where substring(created_at, 1, 4) = $tahun AND `role` = 'User' ")->row_array();
        } else if($bulan) {
            return $this->db->query("SELECT count(id) jml_semua_donatur FROM users where substring(created_at, 6, 2) = $bulan AND `role` = 'User'")->row_array();
        } else {
            return $this->db->query('SELECT count(id) jml_semua_donatur FROM users where `role` = "User"')->row_array();
        }
    }

    public function get_donatur_berdonasi_all($tahun= NULL, $bulan = NULL) {
        if($tahun && $bulan) {
            return $this->db->query("SELECT count(distinct user_id) jml_donatur_berdonasi from donasi_logistik where substring(tgl_donasi, 1, 4) = $tahun AND substring(tgl_donasi, 6, 2) = $bulan ")->row_array();
        } elseif($tahun) {
            return $this->db->query("SELECT count(distinct user_id) jml_donatur_berdonasi from donasi_logistik where substring(tgl_donasi, 1, 4) = $tahun")->row_array();            
        } elseif($bulan) {
            return $this->db->query("SELECT count(distinct user_id) jml_donatur_berdonasi from donasi_logistik where substring(tgl_donasi, 6, 2) = $bulan")->row_array();            
        } else {
            return $this->db->query('SELECT count(distinct user_id) jml_donatur_berdonasi from donasi_logistik')->row_array();
        }
        
    }

}