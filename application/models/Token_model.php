<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Token_model extends CI_Model
{
    //menampilkan user_token berdasarkan id
    public function get_token_by_token($token)
    {
        $this->db->select('*');
        $this->db->from('user_token');
        $this->db->join('user', 'user.id_user = user_token.id_user');
        $this->db->where('user_token.token', $token);
        $query = $this->db->get();
        return $query->row_array();
    }

    //menambahkan user_token baru
    public function add_token($data)
    {
        $this->db->insert('user_token', $data);
    }

    public function delete_token_by_id_user($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete('user_token');
    }
}
    
    /* End of file ModelName.php */
