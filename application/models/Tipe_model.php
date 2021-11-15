<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Tipe_model extends CI_Model
{

    //menampilkan semua tipe
    public function get_all_tipe()
    {
        $query = $this->db->get('tipe');
        return $query->result_array();
    }

    //menampilkan tipe berdasarkan id
    public function get_tipe_by_id($id)
    {
        return $this->db->get_where('tipe', ['id_tipe' => $id])->row_array();
    }

    //menambahkan tipe baru
    public function add_tipe($data)
    {
        $this->db->insert('tipe', $data);
    }

    //mengupdate data tipe
    public function update_tipe($data, $whare)
    {
        $this->db->where('id_tipe', $whare);
        $this->db->update('tipe', $data);
    }

    //mengahpus data tipe
    public function delete_tipe($id)
    {
        $this->db->where('id_tipe', $id);
        $this->db->delete('tipe');
    }
}
    
    /* End of file ModelName.php */
