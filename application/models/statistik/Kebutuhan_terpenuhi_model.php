<?php

class Kebutuhan_terpenuhi_model extends CI_Model {

    public function count_kebutuhan_bencana($id_bencana) {
        return $this->db->select('jenis_logistik.nama nama_logistik, sum(logistik_bencana.jumlah) jumlah')
                        ->from('logistik_bencana')
                        ->join('jenis_logistik', 'jenis_logistik.id = logistik_bencana.jenis_logistik_id')
                        ->where("info_bencana_id = $id_bencana")
                        ->group_by("logistik_bencana.jenis_logistik_id")
                        ->get()->result_array();
    }

    public function count_donasi_bencana($id_bencana) {
        return $this->db->select('jenis_logistik.nama nama_logistik, sum(jenis_logistik_donasi.jumlah) jumlah')
                        ->from('jenis_logistik_donasi')
                        ->join('donasi_logistik', 'jenis_logistik_donasi.donasi_logistik_id = donasi_logistik.id')
                        ->join('jenis_logistik', 'jenis_logistik_donasi.jenis_logistik_id = jenis_logistik.id')
                        ->where("donasi_logistik.info_bencana_id2 = $id_bencana")
                        ->group_by("jenis_logistik_id")
                        ->get()->result_array();
    }

    // public function get_kebutuhan_pangan($id_bencana) {
    //         return $this->db->query("SELECT SUM(jumlah) jumlah
    //                                             from logistik_bencana
    //                                             JOIN jenis_logistik ON jenis_logistik.id = logistik_bencana.jenis_logistik_id
    //                                             JOIN info_bencana ON info_bencana.id = logistik_bencana.info_bencana_id
    //                                             where jenis_logistik.jenis = 'Pangan' and info_bencana.id = $id_bencana")->row_array();
    // }

}