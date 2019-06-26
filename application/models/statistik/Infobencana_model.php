<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Infobencana_model extends CI_Model {
    public function get_count_infobencana($tahun = NULL, $bulan = NULL) {
        if($tahun && $bulan) {
            $datas = $this->db->query("SELECT provinces.name provinsi, count(info_bencana.id) jml_bencana
                                from info_bencana join provinces
                                ON provinces.id = info_bencana.provinsi_id
                                where YEAR(created_at) = $tahun and month(created_at) = $bulan
                                group by provinsi")->result_array();
        } else if($tahun) {
            $datas = $this->db->query("SELECT provinces.name provinsi, count(info_bencana.id) jml_bencana
                                from info_bencana join provinces
                                ON provinces.id = info_bencana.provinsi_id
                                where YEAR(created_at) = $tahun
                                group by provinsi")->result_array();
        }
        
        $data_provinsi = [];
        foreach($datas as $item) {
            $data_provinsi = [
                strtolower($item['provinsi']) => (int) $item['jml_bencana'],
            ];
        }

        return $data_provinsi;
    }
}