<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Prioritas_model extends CI_Model{

    public function get_domain() {
        return $this->db->get('domain')->row_array();
    }

    public function update_domain($data) {
        return $this->db->update('domain', $data);
    }

    public function get_aturan() {
        return $this->db->get('aturan')->result_array();
    }

    public function get_aturan_by_id($id) {
        return $this->db->get_where('aturan', ['id' => $id])->row_array();
    }

    public function insert_aturan($data) {
        return $this->db->insert('aturan', $data);
    }

    public function update_aturan($data, $id) {
        return $this->db->where("id", $id)->update("aturan", $data);
    }

    public function delete_aturan($id) {
        return $this->db->where('id', $id)->delete("aturan");
    }

    public function save_spk($data) {
        $data_old = $this->db->get('hasil_spk')->result_array();

        foreach($data_old as $item) {
            if(($item['info_bencana_id'] == $data['info_bencana_id']) && ($item['jenis_logistik_id'] == $data['jenis_logistik_id']) ) {
                return $update =  $this->db->where(['info_bencana_id' => $data['infobencana_id'], 'jenis_logistik_id' => $data['jenis_logistik_id']] )
                                    ->update('hasil_spk', $data);
            }
        }
        
        if(!$update) {
            return $this->db->insert('hasil_spk', $data);
        }
    }

    public function get_hasil_spk() {
        $data_old = $this->db->select('hasil_spk.*, info_bencana.nama nama_bencana, jenis_logistik.nama jenis_logistik')
                            ->from('hasil_spk')
                            ->join('info_bencana', 'info_bencana.id = hasil_spk.info_bencana_id')
                            ->join('jenis_logistik', 'jenis_logistik.id = hasil_spk.jenis_logistik_id')
                            ->get()
                            ->result_array();

        return $data_old;
    }

    public function get_prioritas_by($id_bencana) {
        return $this->db->select('jenis_logistik.nama jenis_logistik, hasil_spk.hasil')
                        ->from('hasil_spk')
                        ->join('jenis_logistik', 'jenis_logistik.id = hasil_spk.jenis_logistik_id')
                        ->where("hasil_spk.info_bencana_id = $id_bencana and hasil_spk.visible = 1")
                        ->get()
                        ->result_array();
    }
    
    public function change_status_prioritas_by($id) {
        return $this->db->where("id", $id)->update("hasil_spk", ['visible' => 1]);
    }

    public function hide_status_prioritas_by($id) {
        return $this->db->where("id", $id)->update("hasil_spk", ['visible' => 0]);
    }

    public function delete_prioritas($id) {
        return $this->db->where('id', $id)->delete("hasil_spk");
    }
}