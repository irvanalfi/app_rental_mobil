<?php 
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Mobil_model extends CI_Model {
    
        //menampilkan semua mobil
        public function get_all_mobil()
        {    
            $this->db->select('*');
            $this->db->from('mobil');
            $this->db->join('tipe', 'tipe.id_mobil = mobil.id_mobil');
            $this->db->join('fitur', 'fitur.id_mobil = mobil.id_mobil');
            $query = $this->db->get();
            return $query->result_array();
        }
        
        //menampilkan mobil berdasarkan id
        public function get_mobil_by_id($id)
        {
            $this->db->select('*');
            $this->db->from('mobil');
            $this->db->join('tipe', 'tipe.id_mobil = mobil.id_mobil');
            $this->db->join('fitur', 'fitur.id_mobil = mobil.id_mobil');
            $query = $this->db->get_where('mobil', ['id_mobil' => $id]);
            return $query->row_array();
        }

        public function get_mobil_by_keyword($keyword)
        {
            $this->db->nama('merk', $keyword);
            return $this->db->get('mobil')->result_array();
        }

        //menambahkan mobil baru
        public function add_mobil()
        {
            $data = [
                "id_tipe"       => $this->input->post('id_tipe', true),
                "merk"          => $this->input->post('merk', true),
                "no_plat"       => $this->input->post('no_plat', true),
                "warna"         => $this->input->post('warna', true),
                "transmisi"     => $this->input->post('transmisi', true),
                "jmlh_kursi"    => $this->input->post('jmlh_kursi', true),
                "bagasi"        => $this->input->post('bagasi', true),
                "bbm"           => $this->input->post('bbm', true),
                "tahun"         => $this->input->post('tahun', true),
                "km"            => $this->input->post('km', true),
                "status"        => $this->input->post('status', true),
                "harga"         => $this->input->post('status', true),
                "denda"         => $this->input->post('denda', true),
                "gambar"        => $this->input->post('gambar', true),
                "detail"        => $this->input->post('detail', true),
                "created"       => date('Y-m-d H:i:s'),
                "created_by"    => $this->session->userdata('nama')
            ];

            $this->db->insert('mobil', $data);
        }

        //mengupdate data mobil
        public function update_mobil()
        {
            $data = [
                "id_tipe"       => $this->input->post('id_tipe', true),
                "merk"          => $this->input->post('merk', true),
                "no_plat"       => $this->input->post('no_plat', true),
                "warna"         => $this->input->post('warna', true),
                "transmisi"     => $this->input->post('transmisi', true),
                "jmlh_kursi"    => $this->input->post('jmlh_kursi', true),
                "bagasi"        => $this->input->post('bagasi', true),
                "bbm"           => $this->input->post('bbm', true),
                "tahun"         => $this->input->post('tahun', true),
                "km"            => $this->input->post('km', true),
                "status"        => $this->input->post('status', true),
                "harga"         => $this->input->post('status', true),
                "denda"         => $this->input->post('denda', true),
                "gambar"        => $this->input->post('gambar', true),
                "detail"        => $this->input->post('detail', true),
                "updated"       => date('Y-m-d H:i:s'),
                "updated_by"    => $this->session->userdata('nama')
            ];

            $this->db->where('id_mobil', $this->input->post('id_mobil'));
            $this->db->update('mobil', $data);
        }

        //mengahpus data mobil
        public function dalete_mobil($id)
        {
            $this->db->where('id_mobil', $id);
            $this->db->delete('mobil');
        }
    
    }
    
    /* End of file ModelName.php */
    
?>
