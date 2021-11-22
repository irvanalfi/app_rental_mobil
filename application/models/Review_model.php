<?php 
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Review_model extends CI_Model {
    
        //menampilkan semua review
        public function get_all_review()
        {    
            $this->db->select('*');
            $this->db->from('review');
            $this->db->join('mobil', 'mobil.id_mobil = review.id_mobil');
            $this->db->join('user', 'user.id_user = review.id_user');
            $this->db->join('transaksi', 'transaksi.id_transaksi = review.id_transaksi');
            $query = $this->db->get();
            return $query->result_array();
        }

        //menampilkan semua review dengan status 1
        public function get_all_review_approved()
        {    
            $this->db->select('*');
            $this->db->from('review');
            $this->db->join('mobil', 'mobil.id_mobil = review.id_mobil');
            $this->db->join('user', 'user.id_user = review.id_user');
            $this->db->join('transaksi', 'transaksi.id_transaksi = review.id_transaksi');
            $this->db->where('review.status', 1);
            $query = $this->db->get();
            return $query->result_array();
        }
        
        //menampilkan review berdasarkan id
        public function get_review_by_id($id)
        {
            $this->db->select('*');
            $this->db->from('review');
            $this->db->join('mobil', 'mobil.id_mobil = review.id_mobil');
            $this->db->join('user', 'user.id_user = review.id_user');
            $this->db->join('transaksi', 'transaksi.id_transaksi = review.id_transaksi');
            $this->db->where('review.id_review', $id);
            $query = $this->db->get();
            return $query->row_array();
        }

        //menampilkan review berdasarkan id_mobil
        public function get_review_by_id_mobil($id)
        {
            $this->db->select('*');
            $this->db->from('review');
            $this->db->join('mobil', 'mobil.id_mobil = review.id_mobil');
            $this->db->join('user', 'user.id_user = review.id_user');
            $this->db->join('transaksi', 'transaksi.id_transaksi = review.id_transaksi');
            $this->db->where('review.id_mobil', $id);
            $this->db->where('review.status', 1);
            $query = $this->db->get();
            return $query->result_array();
        }

        //menambahkan review baru
        public function add_review($data)
        {
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
