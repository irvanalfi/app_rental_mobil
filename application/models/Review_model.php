<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Review_model extends CI_Model
{

    //menampilkan semua review
    public function get_all_review()
    {
        $this->db->select('*, review.status as status_review, review.created as review_created');
        $this->db->from('review');
        $this->db->join('mobil', 'mobil.id_mobil = review.id_mobil');
        $this->db->join('user', 'user.id_user = review.id_user');
        $this->db->join('transaksi', 'transaksi.id_transaksi = review.id_transaksi');
        $this->db->order_by('review_created', 'desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    //menampilkan semua review dengan status 1
    public function get_all_review_approved()
    {
        $this->db->select('*, review.created as review_created');
        $this->db->from('review');
        $this->db->join('mobil', 'mobil.id_mobil = review.id_mobil');
        $this->db->join('user', 'user.id_user = review.id_user');
        $this->db->join('transaksi', 'transaksi.id_transaksi = review.id_transaksi');
        $this->db->where('review.status', 1);
        $this->db->order_by('review_created', 'desc');
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
        $this->db->select('*, review.created as review_created');
        $this->db->from('review');
        $this->db->join('mobil', 'mobil.id_mobil = review.id_mobil');
        $this->db->join('user', 'user.id_user = review.id_user');
        $this->db->join('transaksi', 'transaksi.id_transaksi = review.id_transaksi');
        $this->db->where('review.id_mobil', $id);
        $this->db->where('review.status', 1);
        $query = $this->db->get();
        return $query->result_array();
    }

    //menampilkan review berdasarkan id_transaksi
    public function get_review_by_id_transaksi($id_transaksi)
    {
        $this->db->select('*, review.created as review_created');
        $this->db->from('review');
        $this->db->join('mobil', 'mobil.id_mobil = review.id_mobil');
        $this->db->join('user', 'user.id_user = review.id_user');
        $this->db->join('transaksi', 'transaksi.id_transaksi = review.id_transaksi');
        $this->db->where('review.id_transaksi', $id_transaksi);
        $query = $this->db->get();
        return $query->row_array();
    }

    //menampilkan jumlah review yang sudah diapprove berdasarkan id mobil
    public function get_jumlah_review_approved_by_id_mobil($id)
    {
        $this->db->select('*, review.created as review_created');
        $this->db->from('review');
        $this->db->join('mobil', 'mobil.id_mobil = review.id_mobil');
        $this->db->join('user', 'user.id_user = review.id_user');
        $this->db->join('transaksi', 'transaksi.id_transaksi = review.id_transaksi');
        $this->db->where('review.id_mobil', $id);
        $this->db->where('review.status', 1);
        $this->db->order_by('review_created', 'desc');
        $query = $this->db->count_all_results();
        return $query;
    }

    public function add_review($data)
    {
        $this->db->insert('review', $data);
    }

    //mengupdate data review
    public function update_review($data, $id_review)
    {
        $this->db->where('id_review', $id_review);
        $this->db->update('review', $data);
    }

    //mengahpus data review
    public function dalete_review($id)
    {
        $this->db->where('id_review', $id);
        $this->db->delete('review');
    }

    public function get_total_review_jelek()
    {
        $this->db->select('mobil.no_plat, SUM(review.status = 0) as jelek');
        $this->db->from('review');
        $this->db->join('mobil', 'review.id_mobil = mobil.id_mobil', 'right');
        $this->db->group_by('mobil.no_plat');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_total_review_baik()
    {
        $this->db->select('mobil.no_plat, SUM(review.status = 1) as baik');
        $this->db->from('review');
        $this->db->join('mobil', 'review.id_mobil = mobil.id_mobil', 'right');
        $this->db->group_by('mobil.no_plat');
        $query = $this->db->get();
        return $query->result_array();
    }
}
    
    /* End of file ModelName.php */
