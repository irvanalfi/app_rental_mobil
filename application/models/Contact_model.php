<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Contact_model extends CI_Model
{

    //menampilkan semua contact
    public function get_all_contact()
    {
        $this->db->select('*');
        $this->db->from('contact');
        $this->db->join('user', 'user.id_user = contact.id_user');
        $query = $this->db->get();
        return $query->result_array();
    }

    //menampilkan contact berdasarkan id
    public function get_user_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('contact');
        $this->db->join('user', 'user.id_user = contact.id_user');
        $this->db->where('contact.id_contact', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    //menambahkan contact baru
    public function add_contact($data)
    {
        $this->db->insert('contact', $data);
    }

    //mengupdate data contact
    public function update_contact($id_contact)
    {
        $data = [
            "status"        => 1,
            "updated"       => date('Y-m-d H:i:s'),
            "updated_by"    => $this->session->userdata('id_user')
        ];

        $this->db->where('id_contact', $id_contact);
        $this->db->update('contact', $data);
    }

    //mengahpus data contact
    public function dalete_contact($id)
    {
        $this->db->where('id_contact', $id);
        $this->db->delete('contact');
    }
}
    
    /* End of file ModelName.php */
