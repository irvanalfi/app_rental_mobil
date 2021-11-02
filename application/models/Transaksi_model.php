<?php 
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Transaksi_model extends CI_Model {
    
        //menampilkan semua transaksi
        public function get_all_transaksi()
        {    
            $this->db->select('*');
            $this->db->from('transaksi');
            $this->db->join('mobil', 'mobil.id_mobil = transaksi.id_mobil');
            $this->db->join('user', 'user.id_user = transaksi.id_user');
            $query = $this->db->get();
            return $query->result_array();
        }
        
        //menampilkan transaksi berdasarkan id
        public function get_transaksi_by_id($id)
        {
            $this->db->select('*');
            $this->db->from('transaksi');
            $this->db->join('mobil', 'mobil.id_mobil = transaksi.id_mobil');
            $this->db->join('user', 'user.id_user = transaksi.id_user');
            $query = $this->db->get_where('transaksi', ['id_transaksi' => $id]);
            return $query->row_array();
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
            $this->db->where('Status Pengembalian', "Belum Kembali");
            $query = $this->db->count_all_results();
            return $query;
        }

        //menampilkan seluruh jumlah transaksi selesai
        public function get_jumlah_transaksi_selesai()
        {
            $this->db->select('*');
            $this->db->from('transaksi');
            $this->db->where('Status Pengembalian', "Kembali");
            $query = $this->db->count_all_results();
            return $query;
        }

        //menambahkan transaksi baru
        public function add_transaksi()
        {
            $data = [
                "id_user"               => $this->input->post('id_user', true),
                "id_mobil"              => $this->input->post('id_mobil', true),
                "tgl_rental"            => $this->input->post('tgl_rental', true),
                "tgl_kembali"           => $this->input->post('tgl_kembali', true),
                "alamat_penjemputan"    => $this->input->post('alamat_penjemjemputan', true),
                
                // function hitung total harga
                "total_harga"           => $this->input->post('harga', true),
                "total_denda"           => 0,
                "total_akhir"           => 0,
                "tgl_pengembalian"      => null,
                "status_pengembalian"   => "Belum Kembali",
                "bukti_pembayaran"      => null,
                "status_pembayaran"     => 0,
                "confirm_by"            => null,
                "created"               => date('Y-m-d H:i:s'),
                "created_by"            => $this->session->userdata('nama'),
            ];

            $this->db->insert('transaksi', $data);
        }

        public function update_bukti_pembayaran($nama_foto)
        {
            $data = [
                "bukti_pembayaran"      => $nama_foto,
            ];

            $this->db->where('id_transaksi', $this->input->post('id_transaksi'));
            $this->db->update('transaksi', $data);
        }

        public function update_status_pembayaran()
        {
            $data = [
                "status_pembayaran"      => $this->input->post('status_pembayaran', true),
                "confirm_by"             => $this->session->userdata('nama')
            ];

            $this->db->where('id_transaksi', $this->input->post('id_transaksi'));
            $this->db->update('transaksi', $data);
        }

        public function update_selesai_transaksi()
        {
            $data = [
                //function itungan total denda todal akhir
                "total_denda"           => $this->input->post('status_pembayaran', true),
                "total_akhir"           => $this->input->post('status_pembayaran', true),
                "tgl_pengembalian"      => $this->input->post('tgl_pengembalian', true),

                "updated"               => date('Y-m-d H:i:s'),
                "updated_by"            => $this->session->userdata('nama'),
            ];

            $this->db->where('id_transaksi', $this->input->post('id_transaksi'));
            $this->db->update('transaksi', $data);
        }

        //mengahpus data transaksi
        public function dalete_transaksi($id)
        {
            $this->db->where('id_transaksi', $id);
            $this->db->delete('transaksi');
        }
    
    }
    
    /* End of file ModelName.php */
    
?>
