<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Mobil_model extends CI_Model
{

    //menampilkan semua mobil
    public function get_all_mobil()
    {
        $this->db->select('*');
        $this->db->from('mobil');
        $this->db->join('tipe', 'tipe.id_tipe = mobil.id_tipe');
        $this->db->join('fitur', 'fitur.id_mobil = mobil.id_mobil');
        $query = $this->db->get();
        return $query->result_array();
    }

    //menampilkan mobil berdasarkan id
    public function get_mobil_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('mobil');
        $this->db->join('tipe', 'tipe.id_tipe = mobil.id_tipe');
        $this->db->join('fitur', 'fitur.id_mobil = mobil.id_mobil');
        $this->db->where('mobil.id_mobil', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_mobil_by_keyword($keyword)
    {   $this->db->select('*');
        $this->db->from('mobil');
        $this->db->join('tipe', 'tipe.id_tipe = mobil.id_tipe');
        $this->db->like('mobil.merek', $keyword);
        $this->db->or_like('mobil.bbm', $keyword);
        $this->db->or_like('mobil.transmisi', $keyword);
        $this->db->or_like('mobil.tahun', $keyword);
        $this->db->or_like('tipe.kode_tipe', $keyword);
        $this->db->or_like('tipe.nama_tipe', $keyword);
        return $this->db->get()->result_array();
    }

    // menampilkan jumlah seluruh mobil
    public function get_jumlah_mobil()
    {
        $query = $this->db->count_all_results('mobil');
        return $query;
    }

    // mendapatkan id_mobil terbaru
    public function get_latest_id_mobil()
    {
        $this->db->select('id_mobil');
        $this->db->from('mobil');
        $this->db->order_by('id_mobil', 'desc');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->row_array();
    }

    //menambahkan mobil baru
    public function add_mobil($data)
    {
        $this->db->insert('mobil', $data);
    }

    //mengupdate data mobil
    public function update_mobil($data, $id)
    {
        $this->db->where('id_mobil', $id);
        $this->db->update('mobil', $data);
    }

    // update status mobil
    public function update_status_mobil($id_mobil)
    {
        $data = [
            "status"        => 0,
            "updated"       => date('Y-m-d H:i:s'),
            "updated_by"    => $this->session->userdata('nama')
        ];

        $this->db->where('id_mobil', $id_mobil);
        $this->db->update('mobil', $data);
    }

    //mengahpus data mobil
    public function delete_mobil($id)
    {
        $this->db->where('id_mobil', $id);
        $this->db->delete('mobil');
    }
}
    
    /* End of file ModelName.php */
