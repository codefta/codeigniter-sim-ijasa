<?php
defined("BASEPATH") or exit("No direct script access allowed");


class Infobencana_model extends CI_Model {
    
    public function get_infobencana() {
        return $this->db->get("info_bencana")->result_array();
    }

    public function get_infobencana_id($id) {
        return $this->db->select("info_bencana.*, provinces.name provinsi, regencies.name kota, districts.name kecamatan, villages.name desa")
                        ->from("info_bencana")
                        ->join("provinces", 'info_bencana.provinsi_id = provinces.id')
                        ->join("regencies", 'info_bencana.kota_id = regencies.id')
                        ->join("districts", 'info_bencana.kecamatan_id = districts.id')
                        ->join("villages", 'info_bencana.desa_id = villages.id')
                        ->where("info_bencana.id = $id")
                        ->get()->row_array();
        // return $this->db->get_where('info_bencana', ['id' => $id])->row_array();
    }

    public function insert_infobencana($data) {
        $this->db->insert('info_bencana', $data);

        return $this->db->insert_id();
    }

    public function update_infobencana() {

    }

    public function delete_infobencana($id) {
        return $this->db->where('id', $id)->delete('info_bencana');
    }

}