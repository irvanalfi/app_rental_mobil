<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Contact_model extends CI_Model
{

    //menampilkan semua contact
    public function get_all_contact()
    {
        $this->db->select('*, contact.created as contact_created');
        $this->db->from('contact');
        $this->db->join('user', 'user.id_user = contact.id_user');
        $this->db->order_by('contact_created', 'desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    //mendapatkan contact yang belum di baca
    public function get_all_unread_contact()
    {
        $this->db->select('*, contact.created as contact_created');
        $this->db->from('contact');
        $this->db->join('user', 'user.id_user = contact.id_user');
        $this->db->where('status', 0);
        $this->db->order_by('contact_created', 'desc');
        $this->db->limit(3);
        $query = $this->db->get();
        return $query->result_array();
    }

    //mendapatkan jumlah contact yang belum dibalas
    public function get_jumlah_unread_contact()
    {
        $this->db->select('*, contact.created as contact_created');
        $this->db->from('contact');
        $this->db->join('user', 'user.id_user = contact.id_user');
        $this->db->where('status', 0);
        $query = $this->db->count_all_results();
        return $query;
    }

    //menambahakan contact baru
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
