<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Logistik_bencana_model extends CI_Model {

    public function get_logistik_bencana() {
        return $this->db->query("SELECT ib.id idbencana, ib.foto, ib.nama nama_bencana, ib.deskripsi, p.name provinsi, r.name kota, d.name kecamatan, v.name desa, group_concat(jl.nama) logistik, group_concat(jumlah) jumlah_logistik 
        FROM logistik_bencana lb 
        JOIN info_bencana ib 
        ON ib.id=lb.info_bencana_id 
        JOIN jenis_logistik jl 
        ON jl.id=lb.jenis_logistik_id 
        JOIN provinces p
        ON p.id = ib.provinsi_id
        JOIN regencies r
        ON r.id = ib.kota_id
        JOIN districts d
        ON d.id = ib.kecamatan_id
        JOIN villages v
        ON v.id = ib.desa_id
        GROUP BY info_bencana_id")->result_array();
    }


    public function get_logistik_bencana_id($id) {
        return $this->db->select('jenis_logistik.id id_logistik, jenis_logistik.nama nama_logistik, jenis_logistik.jenis jenis_logistik, sum(logistik_bencana.jumlah) jumlah')
                        ->from('logistik_bencana')
                        ->join('jenis_logistik', 'jenis_logistik.id = logistik_bencana.jenis_logistik_id')
                        ->where("info_bencana_id = $id")
                        ->group_by("logistik_bencana.jenis_logistik_id")
                        ->get()->result_array();
    }

    public function get_logistik_bencana_edit_id($id) {
        return $this->db->select('jenis_logistik.id id_logistik, jenis_logistik.nama nama_logistik, jenis_logistik.jenis jenis_logistik, sum(logistik_bencana.jumlah) jumlah, logistik_bencana.id id_utama')
                        ->from('logistik_bencana')
                        ->join('jenis_logistik', 'jenis_logistik.id = logistik_bencana.jenis_logistik_id')
                        ->where("info_bencana_id = $id")
                        ->group_by("logistik_bencana.id")
                        ->get()->result_array();
    }

    public function insert_logistik_bencana($data) {
        return $this->db->insert_batch('logistik_bencana', $data);
    }

    public function replace_logistik_bencana($data_kebutuhan) {
        return $this->db->replace('logistik_bencana', $data_kebutuhan);
    }
}