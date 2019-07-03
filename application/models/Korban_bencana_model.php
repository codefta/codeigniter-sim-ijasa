<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Korban_bencana_model extends CI_Model {
    public function insert_korban_bencana($data) {
        return $this->db->insert('korban_bencana', $data);
    }

    public function update_korban_bencana($data, $id) {
        return $this->db->where("info_bencana_id", $id)->update('korban_bencana', $data);
    }

    public function get_korban_bencana_id($id_bencana) {
        return $this->db->get_where('korban_bencana', ['info_bencana_id' => $id_bencana])->row_array();
    }
}