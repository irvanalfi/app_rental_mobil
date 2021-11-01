<?php 
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Tipe_model extends CI_Model {
    
        //menampilkan semua tipe
        public function get_all_tipe()
        {    
            $query = $this->db->get('tipe');
            return $query->result_array();
        }
        
        //menampilkan tipe berdasarkan id
        public function get_user_by_id($id)
        {
            return $this->db->get_where('tipe', ['id_tipe' => $id])->row_array();
        }

        //menambahkan tipe baru
        public function add_tipe()
        {
            $data = [
                "kode_tipe"     => $this->input->post('kode_tipe', true),
                "nama_tipe"     => $this->input->post('nama_tipe', true),
                "created"       => date('Y-m-d H:i:s'),
                "created_by"    => $this->session->userdata('nama'),
            ];

            $this->db->insert('tipe', $data);
        }

        //mengupdate data tipe
        public function update_tipe()
        {
            $data = [
                "kode_tipe"     => $this->input->post('kode_tipe', true),
                "nama_tipe"     => $this->input->post('nama_tipe', true),
                "updated"       => date('Y-m-d H:i:s'),
                "updated_by"    => $this->session->userdata('nama')
            ];

            $this->db->where('id_tipe', $this->input->post('id_tipe'));
            $this->db->update('tipe', $data);
        }

        //mengahpus data tipe
        public function dalete_tipe($id)
        {
            $this->db->where('id_tipe', $id);
            $this->db->delete('tipe');
        }
    
    }
    
    /* End of file ModelName.php */
    
?>
