<?php
defined("BASEPATH") or exit("No direct script access allowed");


class Donasi_model extends CI_Model {

    public function get_donasi($tahun = NULL, $bulan = NULL) {
        if($tahun && $bulan) {
            return $this->db->query("SELECT count(id) jml_donasi from donasi_logistik where substring(tgl_donasi, 1, 4) = $tahun AND substring(tgl_donasi, 6, 2)")->row_array();
        } elseif($tahun) {
            return $this->db->query("SELECT count(id) jml_donasi from donasi_logistik where substring(tgl_donasi, 1, 4) = $tahun")->row_array();         
        } else {
            return $this->db->query('SELECT count(id) jml_donasi from donasi_logistik')->row_array();
        }
    }

    public function get_donasi_diterima($tahun= NULL, $bulan = NULL) {
        if($tahun && $bulan) {
            return $this->db->query("SELECT count(id) jml_donasi_diterima from donasi_logistik where substring(tgl_donasi, 1, 4) = $tahun AND substring(tgl_donasi, 6, 2) = $bulan AND `status` = 1")->row_array();
        } elseif($tahun) {
            return $this->db->query("SELECT count(id) jml_donasi_diterima from donasi_logistik where substring(tgl_donasi, 1, 4) = $tahun AND `status` = 1")->row_array();            
        } elseif($bulan) {
            return $this->db->query("SELECT count(id) jml_donasi_diterima from donasi_logistik where substring(tgl_donasi, 6, 2) = $bulan AND `status` = 1")->row_array();            
        } else {
            return $this->db->query('SELECT count(id) jml_donasi_diterima from donasi_logistik where `status` = 1')->row_array();
        }
    }

    public function get_donasi_belum_diterima($tahun= NULL, $bulan = NULL) {
        if($tahun && $bulan) {
            return $this->db->query("SELECT count(id) jml_donasi_belum_diterima from donasi_logistik where substring(tgl_donasi, 1, 4) = $tahun AND substring(tgl_donasi, 6, 2) = $bulan AND `status` = 0")->row_array();
        } elseif($tahun) {
            return $this->db->query("SELECT count(id) jml_donasi_belum_diterima from donasi_logistik where substring(tgl_donasi, 1, 4) = $tahun AND `status` = 0")->row_array();            
        } elseif($bulan) {
            return $this->db->query("SELECT count(id) jml_donasi_belum_diterima from donasi_logistik where substring(tgl_donasi, 6, 2) = $bulan AND `status` = 0")->row_array();            
        } else {
            return $this->db->query('SELECT count(id) jml_donasi_belum_diterima from donasi_logistik where `status` = 0')->row_array();
        }
    }
    

    public function get_donasi_pangan($tahun = NULL, $bulan = NULL, $status = NULL) {
        if($tahun && $bulan) {
            if($status == 'blm_diterima') {
                return $this->db->query("SELECT SUM(jumlah) jumlah
                                                    from jenis_logistik_donasi
                                                    JOIN jenis_logistik ON jenis_logistik.id = jenis_logistik_donasi.jenis_logistik_id
                                                    JOIN donasi_logistik ON donasi_logistik.id = jenis_logistik_donasi.donasi_logistik_id
                                                    where jenis_logistik.jenis = 'Pangan' and (YEAR(donasi_logistik.tgl_donasi) = $tahun AND MONTH(donasi_logistik.tgl_donasi) = $bulan) and donasi_logistik.status = 0")->row_array();
            } else {
                return $this->db->query("SELECT SUM(jumlah) jumlah
                                                    from jenis_logistik_donasi
                                                    JOIN jenis_logistik ON jenis_logistik.id = jenis_logistik_donasi.jenis_logistik_id
                                                    JOIN donasi_logistik ON donasi_logistik.id = jenis_logistik_donasi.donasi_logistik_id
                                                    where jenis_logistik.jenis = 'Pangan' and (YEAR(donasi_logistik.tgl_verifikasi) = $tahun AND MONTH(donasi_logistik.tgl_verifikasi) = $bulan) and donasi_logistik.status = 1")->row_array();
            }
        } else if($tahun) {
            if($status == 'blm_diterima') {
                return $this->db->query("SELECT SUM(jumlah) jumlah
                                                    from jenis_logistik_donasi
                                                    JOIN jenis_logistik ON jenis_logistik.id = jenis_logistik_donasi.jenis_logistik_id
                                                    JOIN donasi_logistik ON donasi_logistik.id = jenis_logistik_donasi.donasi_logistik_id
                                                    where jenis_logistik.jenis = 'Pangan' and YEAR(donasi_logistik.tgl_donasi) = $tahun and donasi_logistik.status = 0")->row_array();
            } else {
                return $this->db->query("SELECT SUM(jumlah) jumlah
                                                    from jenis_logistik_donasi
                                                    JOIN jenis_logistik ON jenis_logistik.id = jenis_logistik_donasi.jenis_logistik_id
                                                    JOIN donasi_logistik ON donasi_logistik.id = jenis_logistik_donasi.donasi_logistik_id
                                                    where jenis_logistik.jenis = 'Pangan' and YEAR(donasi_logistik.tgl_verifikasi) = $tahun and donasi_logistik.status = 1")->row_array();
            }
        }
    }

    public function get_donasi_papan($tahun = NULL, $bulan = NULL, $status = NULL) {
        if($tahun && $bulan) {
            if($status == 'blm_diterima') {
                return $this->db->query("SELECT SUM(jumlah) jumlah
                                                    from jenis_logistik_donasi
                                                    JOIN jenis_logistik ON jenis_logistik.id = jenis_logistik_donasi.jenis_logistik_id
                                                    JOIN donasi_logistik ON donasi_logistik.id = jenis_logistik_donasi.donasi_logistik_id
                                                    where jenis_logistik.jenis = 'Papan' and (YEAR(donasi_logistik.tgl_donasi) = $tahun AND MONTH(donasi_logistik.tgl_donasi) = $bulan) and donasi_logistik.status = 0")->row_array();
            } else {
                return $this->db->query("SELECT SUM(jumlah) jumlah
                                                    from jenis_logistik_donasi
                                                    JOIN jenis_logistik ON jenis_logistik.id = jenis_logistik_donasi.jenis_logistik_id
                                                    JOIN donasi_logistik ON donasi_logistik.id = jenis_logistik_donasi.donasi_logistik_id
                                                    where jenis_logistik.jenis = 'Papan' and (YEAR(donasi_logistik.tgl_verifikasi) = $tahun AND MONTH(donasi_logistik.tgl_verifikasi) = $bulan) and donasi_logistik.status = 1")->row_array();
            }
        } else if($tahun) {
            if($status == 'blm_diterima') {
                return $this->db->query("SELECT SUM(jumlah) jumlah
                                                    from jenis_logistik_donasi
                                                    JOIN jenis_logistik ON jenis_logistik.id = jenis_logistik_donasi.jenis_logistik_id
                                                    JOIN donasi_logistik ON donasi_logistik.id = jenis_logistik_donasi.donasi_logistik_id
                                                    where jenis_logistik.jenis = 'Papan' and YEAR(donasi_logistik.tgl_donasi) = $tahun and donasi_logistik.status = 0")->row_array();
            } else {
                return $this->db->query("SELECT SUM(jumlah) jumlah
                                                    from jenis_logistik_donasi
                                                    JOIN jenis_logistik ON jenis_logistik.id = jenis_logistik_donasi.jenis_logistik_id
                                                    JOIN donasi_logistik ON donasi_logistik.id = jenis_logistik_donasi.donasi_logistik_id
                                                    where jenis_logistik.jenis = 'Papan' and YEAR(donasi_logistik.tgl_verifikasi) = $tahun and donasi_logistik.status = 1")->row_array();
            }
        }
    }
    
    public function get_donasi_sandang($tahun = NULL, $bulan = NULL, $status = NULL) {
        if($tahun && $bulan) {
            if($status == 'blm_diterima') {
                return $this->db->query("SELECT SUM(jumlah) jumlah
                                                    from jenis_logistik_donasi
                                                    JOIN jenis_logistik ON jenis_logistik.id = jenis_logistik_donasi.jenis_logistik_id
                                                    JOIN donasi_logistik ON donasi_logistik.id = jenis_logistik_donasi.donasi_logistik_id
                                                    where jenis_logistik.jenis = 'Sandang' and (YEAR(donasi_logistik.tgl_donasi) = $tahun AND MONTH(donasi_logistik.tgl_donasi) = $bulan) and donasi_logistik.status = 0")->row_array();
            } else {
                return $this->db->query("SELECT SUM(jumlah) jumlah
                                                    from jenis_logistik_donasi
                                                    JOIN jenis_logistik ON jenis_logistik.id = jenis_logistik_donasi.jenis_logistik_id
                                                    JOIN donasi_logistik ON donasi_logistik.id = jenis_logistik_donasi.donasi_logistik_id
                                                    where jenis_logistik.jenis = 'Sandang' and (YEAR(donasi_logistik.tgl_verifikasi) = $tahun AND MONTH(donasi_logistik.tgl_verifikasi) = $bulan) and donasi_logistik.status = 1")->row_array();
            }
        } else if($tahun) {
            if($status == 'blm_diterima') {
                return $this->db->query("SELECT SUM(jumlah) jumlah
                                                    from jenis_logistik_donasi
                                                    JOIN jenis_logistik ON jenis_logistik.id = jenis_logistik_donasi.jenis_logistik_id
                                                    JOIN donasi_logistik ON donasi_logistik.id = jenis_logistik_donasi.donasi_logistik_id
                                                    where jenis_logistik.jenis = 'Sandang' and YEAR(donasi_logistik.tgl_donasi) = $tahun and donasi_logistik.status = 0")->row_array();
            } else {
                return $this->db->query("SELECT SUM(jumlah) jumlah
                                                    from jenis_logistik_donasi
                                                    JOIN jenis_logistik ON jenis_logistik.id = jenis_logistik_donasi.jenis_logistik_id
                                                    JOIN donasi_logistik ON donasi_logistik.id = jenis_logistik_donasi.donasi_logistik_id
                                                    where jenis_logistik.jenis = 'Sandang' and YEAR(donasi_logistik.tgl_verifikasi) = $tahun and donasi_logistik.status = 1")->row_array();
            }
        }
    }
}