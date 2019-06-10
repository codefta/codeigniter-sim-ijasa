<?php
defined("BASEPATH") or exit("No direct script access allowed");


class Infobencana_model extends CI_Model {
    
    public function get_infobencana() {

    }

    public function get_infobencana_id($id) {
        return $this->db->get_where('info_bencana', ['id' => $id])->row_array();
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