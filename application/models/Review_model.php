<?php 
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Review_model extends CI_Model {
    
        //menampilkan semua review
        public function get_all_review()
        {    
            $this->db->select('*');
            $this->db->from('review');
            $this->db->join('transaksi', 'review.id_transaksi = transaksi.id_transaksi');
            $this->db->join('user', 'user.id_user = transaksi.id_user');
            $query = $this->db->get();
            return $query->result_array();
        }
        
        //menampilkan review berdasarkan id
        public function get_review_by_id($id)
        {
            $this->db->select('*');
            $this->db->from('review');
            $this->db->join('transaksi', 'review.id_transaksi = transaksi.id_transaksi');
            $this->db->join('user', 'user.id_user = transaksi.id_user');
            $this->db->where('review.id_review', $id);
            $query = $this->db->get();
            return $query->row_array();
        }

        //menampilkan review berdasarkan id_transaksi
        public function get_review_by_id_transaksi($id)
        {
            $this->db->select('*');
            $this->db->from('review');
            $this->db->join('transaksi', 'review.id_transaksi = transaksi.id_transaksi');
            $this->db->join('user', 'user.id_user = transaksi.id_user');
            $this->db->where('review.id_transaksi', $id);
            $query = $this->db->get();
            return $query->row_array();
        }

        //menambahkan review baru
        public function add_review()
        {
            $data = [
                "id_user"       => $this->input->post('id_user', true),
                "id_transaksi"  => $this->input->post('id_transaksi', true),
                "review"        => $this->input->post('review', true),
                "star"          => $this->input->post('star', true),
                "status"        => 0,
                "created"       => date('Y-m-d H:i:s'),
                "created_by"    => $this->session->userdata('nama')
            ];

            $this->db->insert('review', $data);
        }

        //mengupdate data review
        public function update_review()
        {
            $data = [
                "status"        => $this->input->post('staus', true),
                "updated"       => date('Y-m-d H:i:s'),
                "updated_by"    => $this->session->userdata('nama')
            ];

            $this->db->where('id_review', $this->input->post('id_review'));
            $this->db->update('review', $data);
        }

        //mengahpus data review
        public function dalete_review($id)
        {
            $this->db->where('id_review', $id);
            $this->db->delete('review');
        }
    
    }
    
    /* End of file ModelName.php */
    
?>
