<?php

defined('BASEPATH') or exit('No direct script access allowed');

//model untuk user
class User_model extends CI_Model
{

    //menampilkan semua user
    public function get_all_user()
    {
        $query = $this->db->get('user');
        return $query->result_array();
    }

    //menampilkan user berdasarkan id
    public function get_user_by_id($id)
    {
        return $this->db->get_where('user', ['id_user' => $id])->row_array();
    }

    //menampilkan user customer
    public function get_user_customer()
    {
        return $this->db->get_where('user', ['role' => 2])->result_array();
    }

    //menampilkan user berdasarkan email
    public function get_user_by_email($email)
    {
        return $this->db->get_where('user', ['email' => $email])->row_array();
    }

    // menampilkan jumlah seluruh mobil
    public function get_jumlah_customer()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('role', 2);
        $query = $this->db->count_all_results();
        return $query;
    }

    //menambahkan user baru
    public function add_user($data)
    {
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
    public function update_user($data, $id)
    {
        $this->db->where('id_user', $id);
        $this->db->update('user', $data);
    }

    //menghapus data user
    public function delete_user($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete('user');
    }

    public function cek_login($username, $password)
    {
        $username = set_value('username');
        $password = set_value('password');

        $result = $this->db->where('username', $username)
            ->where('password', md5($password))
            ->limit(1)
            ->get('user');

        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return FALSE;
        }
    }
}  

    /* End of file User_model.php */
