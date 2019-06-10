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
        return $this->db->query("SELECT ib.id idbencana, ib.foto, ib.nama nama_bencana, ib.deskripsi, p.id provinsi_id, p.name provinsi, r.id kota_id, r.name kota, d.id kecamatan_id, d.name kecamatan, v.id desa_id, v.name desa, group_concat(jl.nama) nama_logistik, group_concat(jl.jenis) jenis_logistik, group_concat(jumlah) jumlah_logistik 
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
        WHERE ib.id = ".$id."
        GROUP BY info_bencana_id")->row_array();
    }

    public function insert_logistik_bencana($data) {
        return $this->db->insert_batch('logistik_bencana', $data);
    }

    
}