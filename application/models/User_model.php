<?php 
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    //model untuk user
    class User_model extends CI_Model {

        //menampilkan semua user
        public function get_all_user()
        {
            $query = $this->db->get('user');
            return $query->result_array();
        }

        //menampilkan user berdasarkan id
        public function get_user_by_id($id)
        {
            return $this->db->get_where('user', ['id' => $id])->row_array();
        }

        //menambahkan user baru
        public function add_user()
        {
            $data = [
                "nama"          => $this->input->post('nama', true),
                "username"      => $this->input->post('username', true),
                "alamat"        => $this->input->post('alamat', true),
                "gender"        => $this->input->post('gender', true),
                "no_telepon"    => $this->input->post('no_telepon', true),
                "no_ktp"        => $this->input->post('no_ktp', true),
                "password"      => $this->input->post('password', true),
                "role"          => $this->input->post('role', true),
                "created"       => date('Y-m-d H:i:s'),
                "created_by"    => $this->session->userdata('nama'),
            ];

            $this->db->insert('user', $data);
        }

        //menambahkan user baru
        public function register()
        {
            $data = [
                "nama"          => $this->input->post('nama', true),
                "username"      => $this->input->post('username', true),
                "alamat"        => $this->input->post('alamat', true),
                "gender"        => $this->input->post('gender', true),
                "no_telepon"    => $this->input->post('no_telepon', true),
                "no_ktp"        => $this->input->post('no_ktp', true),
                "password"      => $this->input->post('password', true),
                "role"          => $this->input->post('role', true),
                "created"       => date('Y-m-d H:i:s'),
                "created_by"    => "Customer",
            ];

            $this->db->insert('user', $data);
        }

        //mengupdate data user
        public function update_user()
        {
            $data = [
                "nama"          => $this->input->post('nama', true),
                "username"      => $this->input->post('username', true),
                "alamat"        => $this->input->post('alamat', true),
                "gender"        => $this->input->post('gender', true),
                "no_telepon"    => $this->input->post('no_telepon', true),
                "no_ktp"        => $this->input->post('no_ktp', true),
                "password"      => $this->input->post('password', true),
                "role"          => $this->input->post('role', true),
                "updated"       => date('Y-m-d H:i:s'),
                "updated_by"    => $this->input->post('updated_by', true)
            ];

            $this->db->where('id_user', $this->input->post('id_user'));
            $this->db->update('user', $data);
        }

        //menghapus data mobil
        public function dalete_user($id)
        {
            $this->db->where('id_user', $id);
            $this->db->delete('id_user');
        }
    
    }  

    /* End of file User_model.php */

?>