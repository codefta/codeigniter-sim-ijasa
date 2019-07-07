<?php
defined("BASEPATH") or exit("No direct script access allowed");


class Jenis_logistik_model extends CI_Model {

    public function get_jenis_logistik() {
        return $this->db->get('jenis_logistik')->result_array();
    }

    public function get_jenis_logistik_by($id) {
        return $this->db->get_where('jenis_logistik', ['id' => $id])->row_array();
    }

    public function insert_jenis_logistik($data) {
        return $this->db->insert('jenis_logistik', $data);
    }

    public function update_jenis_logistik($id, $data) {
        return $this->db->where('id', $id)->update('jenis_logistik', $data);
    }

    public function delete_jenis_logistik($id) {
        return $this->db->where('id', $id)->delete('jenis_logistik');
    }

    public function get_jenis() {
        return $this->db->query("SELECT jenis FROM jenis_logistik GROUP BY jenis")->result_array();
    }

    public function get_logistik_by_jenis($jenis_logistik)  {
        return $this->db->where('jenis', $jenis_logistik)->get('jenis_logistik')->result_array();
    }

    
}