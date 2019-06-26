<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Kebutuhan_model extends CI_Model {

    public function get_kebutuhan_pangan($tahun = NULL, $bulan = NULL) {
        if($tahun && $bulan) {
            return $this->db->query("SELECT SUM(jumlah) jumlah
                                                from logistik_bencana
                                                JOIN jenis_logistik ON jenis_logistik.id = logistik_bencana.jenis_logistik_id
                                                JOIN info_bencana ON info_bencana.id = logistik_bencana.info_bencana_id
                                                where jenis_logistik.jenis = 'Pangan' and (YEAR(info_bencana.created_at) = $tahun AND MONTH(info_bencana.created_at) = $bulan)")->row_array();
        } else if($tahun) {
            return $this->db->query("SELECT SUM(jumlah) jumlah
                                                from logistik_bencana
                                                JOIN jenis_logistik ON jenis_logistik.id = logistik_bencana.jenis_logistik_id
                                                JOIN info_bencana ON info_bencana.id = logistik_bencana.info_bencana_id
                                                where jenis_logistik.jenis = 'Pangan' and YEAR(info_bencana.created_at) = $tahun")->row_array();
        }
    }

    public function get_kebutuhan_papan($tahun = NULL, $bulan = NULL) {
        if($tahun && $bulan) {
            return $this->db->query("SELECT SUM(jumlah) jumlah
                                                from logistik_bencana
                                                JOIN jenis_logistik ON jenis_logistik.id = logistik_bencana.jenis_logistik_id
                                                JOIN info_bencana ON info_bencana.id = logistik_bencana.info_bencana_id
                                                where jenis_logistik.jenis = 'Papan' and (YEAR(info_bencana.created_at) = $tahun AND MONTH(info_bencana.created_at) = $bulan)")->row_array();
        } else if($tahun) {
            return $this->db->query("SELECT SUM(jumlah) jumlah
                                                from logistik_bencana
                                                JOIN jenis_logistik ON jenis_logistik.id = logistik_bencana.jenis_logistik_id
                                                JOIN info_bencana ON info_bencana.id = logistik_bencana.info_bencana_id
                                                where jenis_logistik.jenis = 'Papan' and YEAR(info_bencana.created_at) = $tahun")->row_array();
        }
    }
    
    public function get_kebutuhan_sandang($tahun = NULL, $bulan = NULL) {
        if($tahun && $bulan) {
            return $this->db->query("SELECT SUM(jumlah) jumlah
                                                from logistik_bencana
                                                JOIN jenis_logistik ON jenis_logistik.id = logistik_bencana.jenis_logistik_id
                                                JOIN info_bencana ON info_bencana.id = logistik_bencana.info_bencana_id
                                                where jenis_logistik.jenis = 'Sandang' and (YEAR(info_bencana.created_at) = $tahun AND MONTH(info_bencana.created_at) = $bulan)")->row_array();
        } else if($tahun) {
            return $this->db->query("SELECT SUM(jumlah) jumlah
                                                from logistik_bencana
                                                JOIN jenis_logistik ON jenis_logistik.id = logistik_bencana.jenis_logistik_id
                                                JOIN info_bencana ON info_bencana.id = logistik_bencana.info_bencana_id
                                                where jenis_logistik.jenis = 'Sandang' and YEAR(info_bencana.created_at) = $tahun")->row_array();
        }
    }
    

}