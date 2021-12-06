<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi_model extends CI_Model
{

    //menampilkan semua transaksi
    public function get_all_transaksi()
    {
        $this->db->select('*, transaksi.created as transaksi_created');
        $this->db->from('transaksi');
        $this->db->join('mobil', 'mobil.id_mobil = transaksi.id_mobil');
        $this->db->join('user', 'user.id_user = transaksi.id_user');
        $this->db->join('tipe', 'tipe.id_tipe = mobil.id_tipe');
        $this->db->join('fitur', 'fitur.id_mobil = mobil.id_mobil');
        $this->db->order_by('id_transaksi', 'desc');
        $query = $this->db->get();
        return $query->result_array();
    }
    //menampilkan semua transaksi untuk laporan
    public function get_all_laporan_transaksi($dari, $sampai)
    {
        $this->db->select('*, transaksi.created as transaksi_created');
        $this->db->from('transaksi');
        $this->db->join('mobil', 'mobil.id_mobil = transaksi.id_mobil');
        $this->db->join('user', 'user.id_user = transaksi.id_user');
        $this->db->join('tipe', 'tipe.id_tipe = mobil.id_tipe');
        $this->db->join('fitur', 'fitur.id_mobil = mobil.id_mobil');
        $this->db->where('transaksi.created >=', $dari);
        $this->db->where('transaksi.created <=', $sampai);
        $this->db->order_by('transaksi_created', 'desc');
        $query = $this->db->get();
        return $query->result_array();
    }
    //menampilkan beberapa transaksi berdasarkan id_user
    public function get_transaksi_by_id_user($id_user)
    {
        $this->db->select('*, transaksi.created as transaksi_created');
        $this->db->from('transaksi');
        $this->db->join('mobil', 'mobil.id_mobil = transaksi.id_mobil');
        $this->db->join('user', 'user.id_user = transaksi.id_user');
        $this->db->join('tipe', 'tipe.id_tipe = mobil.id_tipe');
        $this->db->join('fitur', 'fitur.id_mobil = mobil.id_mobil');
        $this->db->where('transaksi.id_user', $id_user);
        $this->db->order_by('id_transaksi', 'desc');
        $query = $this->db->get();
        return $query->result_array();
    }
    //menampilkan beberapa transaksi berdasarkan id_transaksi
    public function get_transaksi_by_id($id_transaksi)
    {
        $this->db->select('*, transaksi.created as transaksi_created');
        $this->db->from('transaksi');
        $this->db->join('mobil', 'mobil.id_mobil = transaksi.id_mobil');
        $this->db->join('user', 'user.id_user = transaksi.id_user');
        $this->db->join('tipe', 'tipe.id_tipe = mobil.id_tipe');
        $this->db->join('fitur', 'fitur.id_mobil = mobil.id_mobil');
        $this->db->where('transaksi.id_transaksi', $id_transaksi);
        $this->db->order_by('id_transaksi', 'asc');
        $query = $this->db->get();
        return $query->row_array();
    }
    //menampilkan beberapa transaksi berdasarkan id_user dan id_mobil
    public function get_transaksi_by_id_mobil($id_user, $id_mobil)
    {
        $this->db->select('*, transaksi.created as transaksi_created');
        $this->db->from('transaksi');
        $this->db->join('mobil', 'mobil.id_mobil = transaksi.id_mobil');
        $this->db->join('user', 'user.id_user = transaksi.id_user');
        $this->db->join('tipe', 'tipe.id_tipe = mobil.id_tipe');
        $this->db->join('fitur', 'fitur.id_mobil = mobil.id_mobil');
        $this->db->where('transaksi.id_user', $id_user);
        $this->db->where('transaksi.id_mobil', $id_mobil);
        $query = $this->db->get();
        return $query->result_array();
    }

    //menampilkan beberapa transaksi berdasarkan id_mobil
    public function get_transaksi_by_id_mobil_saja($id_mobil)
    {
        $this->db->select('*, transaksi.created as transaksi_created');
        $this->db->from('transaksi');
        $this->db->join('mobil', 'mobil.id_mobil = transaksi.id_mobil');
        $this->db->join('user', 'user.id_user = transaksi.id_user');
        $this->db->join('tipe', 'tipe.id_tipe = mobil.id_tipe');
        $this->db->where('transaksi.id_mobil', $id_mobil);
        $this->db->where('transaksi.status_pengembalian', "Belum Diambil");
        $this->db->or_where('transaksi.status_pengembalian', "Belum Kembali");
        $this->db->order_by('tgl_rental', 'asc');
        $query = $this->db->get();
        return $query->result_array();
    }

    //menampilkan seluruh jumlah transaksi
    public function get_jumlah_transaksi()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $query = $this->db->count_all_results();
        return $query;
    }

    //menampilkan seluruh jumlah transaksi selesai
    public function get_jumlah_transaksi_belum_selesai()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('status_pengembalian', "Belum Kembali");
        $query = $this->db->count_all_results();
        return $query;
    }

    //menampilkan seluruh jumlah transaksi selesai
    public function get_jumlah_transaksi_selesai()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('status_pengembalian', "Kembali");
        $query = $this->db->count_all_results();
        return $query;
    }

    //menambahkan transaksi baru
    public function add_transaksi($data)
    {
        $this->db->insert('transaksi', $data);
    }

    public function update_transaksi($data, $id_transaksi)
    {
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->update('transaksi', $data);
    }

    public function update_status_pembayaran($data, $id_transaksi)
    {
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->update('transaksi', $data);
    }

    public function update_bukti_pembayaran($struk, $id)
    {
        $data = [
            "bukti_pembayaran"      => $struk,
        ];

        $this->db->where('id_transaksi', $id);
        $this->db->update('transaksi', $data);
    }

    // update data ketika transaksi di slesaikan
    public function update_selesai_transaksi()
    {
        $data = [
            "total_denda"           => $this->input->post('status_pembayaran', true),
            "total_akhir"           => $this->input->post('status_pembayaran', true),
            "tgl_pengembalian"      => $this->input->post('tgl_pengembalian', true),

            "updated"               => date('Y-m-d H:i:s'),
            "updated_by"            => $this->session->userdata('nama'),
        ];

        $this->db->where('id_transaksi', $this->input->post('id_transaksi'));
        $this->db->update('transaksi', $data);
    }

    // update untuk transaksi yang gagal dibayar oleh customer
    public function update_transaksi_gagal($data, $id_transaksi)
    {
        $data = [
            "status_pengembalian"   => "Kembali",
            "status_rental"         => "Gagal",
            "updated"               => date('Y-m-d H:i:s'),
            "updated_by"            => $this->session->userdata('id_user'),
        ];

        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->update('transaksi', $data);
    }

    public function delete_transaksi($id_transaksi)
    {
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->delete('transaksi');
    }

    public function get_total_transaksi_bulan()
    {
        $this->db->select('transaksi.id_transaksi, MONTH(transaksi.created) as bulan, SUM(transaksi.total_akhir) as total');
        $this->db->from('transaksi');
        $this->db->group_by('bulan');
        $this->db->order_by('bulan', 'asc');
        $query = $this->db->get();
        return $query->result_array();
    }
}
    
    /* End of file ModelName.php */
