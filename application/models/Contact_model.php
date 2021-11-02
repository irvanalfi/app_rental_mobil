<?php 
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Contact_model extends CI_Model {
    
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
        public function add_contact()
        {
            $data = [
                "id_user"       => $this->input->post('kode_contact', true),
                "subject"       => $this->input->post('nama_contact', true),
                "pesan"         => $this->input->post('nama_contact', true),
                "status"        => $this->input->post('nama_contact', true),
                "created"       => date('Y-m-d H:i:s'),
                "created_by"    => $this->session->userdata('nama'),
            ];

            $this->db->insert('contact', $data);
        }

        //mengupdate data contact
        public function update_contact()
        {
            $data = [
                "status"        => $this->input->post('nama_contact', true),
                "updated"       => date('Y-m-d H:i:s'),
                "updated_by"    => $this->session->userdata('nama')
            ];

            $this->db->where('id_contact', $this->input->post('id_contact'));
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
    
?>
