<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Donasi_logistik_model extends CI_Model {

    /* Donasi Logistik */
    public function insert_donasi_logistik($data) {
        $donasi = $this->db->insert('donasi_logistik', $data);
        return $this->db->insert_id($donasi);
    }
    
    public function get_donasi_logistik_by_id($user_id) {
        return $this->db->select('donasi_logistik.*, info_bencana.nama infobencana')
                        ->from('donasi_logistik')
                        ->join('info_bencana', 'info_bencana.id = donasi_logistik.info_bencana_id2')
                        ->where(['user_id' => $user_id])
                        ->get()->row_array();
    }

    /* Jenis Logistik Donasi */

    public function insert_jenis_logistik_donasi($data) {
        return $this->db->insert_batch('jenis_logistik_donasi', $data);
    }

}