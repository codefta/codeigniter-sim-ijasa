<?php
defined("BASEPATH") or exit("No direct script access allowed");


class Validasi_logistik_model extends CI_Model {
    
    public function get_validasi_logistik() {
        return $this->db->select('dl.id, dl.tgl_donasi, dl.tgl_verifikasi, dl.status, ib.nama infobencana, users.nama nama_user')
                        ->from('donasi_logistik dl')
                        ->join('info_bencana ib', 'dl.info_bencana_id2 = ib.id')
                        ->join('users', 'users.id = dl.user_id')
                        ->get()->result_array();
    }

    public function verif_validasi_logistik($data, $id) {
        return $this->db->where('id', $id)->update('donasi_logistik', $data);
    }
}