<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Users_model extends CI_Model {

    public function get_users() {
        return $this->db->get('users')->result_array();
    }

    public function get_users_id($id) {
        return $this->db->get_where('users', ['id' => $id])->row_array();
    }

    public function insert_users($data) {
        return $this->db->insert('users', $data);
    }

    public function update_users($data, $id) {
        return $this->db->where('id', $id)->update('users', $data);
    }

    public function delete_users($id) {
        return $this->db->where('id', $id)->delete('users');
    }
    
}