<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Prioritas_model extends CI_Model{

    public function get_domain() {
        return $this->db->get('domain')->row_array();
    }

    public function update_domain($data) {
        return $this->db->update('domain', $data);
    }

    public function get_aturan() {
        return $this->db->get('aturan')->result_array();
    }

    public function get_aturan_by_id($id) {
        return $this->db->get_where('aturan', ['id' => $id])->row_array();
    }

    public function insert_aturan($data) {
        return $this->db->insert('aturan', $data);
    }

    public function update_aturan($data, $id) {
        return $this->db->where("id", $id)->update("aturan", $data);
    }

    public function delete_aturan($id) {
        return $this->db->where('id', $id)->delete("aturan");
    }
    
}