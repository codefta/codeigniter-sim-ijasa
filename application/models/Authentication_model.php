<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Authentication_model extends CI_Model {

    public function check_login($username, $password) {
        $this->db->where(['username' => $username, 'role' => 'Admin']);
        $this->db->or_where('role', 'Petugas');
        $data = $this->db->get('users')->row_array();

        if (password_verify($password, $data['password'])) {
            return $data;
        } else {
            return FALSE;
        }
    }

    public function check_login_user($username, $password) {
        $this->db->where(['username' => $username, 'role' => 'User']);
        return $data = $this->db->get('users')->row_array();

        if (password_verify($password, $data['password'])) {
            return $data;
        } else {
            return FALSE;
        }
    }
}