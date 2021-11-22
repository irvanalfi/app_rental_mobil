<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    //Do your magic here
    $this->load->model('User_model');
  }


  public function login()
  {
    check_already_login();
    $this->_rules();

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('templates_admin/header');
      $this->load->view('form_login');
      $this->load->view('templates_admin/footer');
    } else {
      $username = $this->input->post('username');
      $password = md5($this->input->post('password'));
      $cek = $this->User_model->cek_login($username, $password);
      if ($cek == FALSE) {
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Username atau Password salah!
        <button type="button" class="close" data-dismiss="alert" aria-label="close">
          <span aria-hidden="true">&times;</span>
        </button></div>');
        redirect('auth/login');
      } else {
        $this->session->set_userdata('id_user', $cek->id_user);
        $this->session->set_userdata('username', $cek->username);
        $this->session->set_userdata('role', $cek->role);
        $this->session->set_userdata('nama', $cek->nama);
        $this->session->set_userdata('avatar', $cek->avatar);
        // echo $cek->role;
        // die();
        switch ($cek->role) {
          case 1:
            redirect('admin/dashboard');
            break;
          case 2:
            redirect('beranda');
            break;
          default:
            break;
        }
      }
    }
  }

  public function logout()
  {
    $this->session->sess_destroy();
    redirect('beranda');
  }

  public function ganti_password()
  {
    $this->load->view('templates_admin/header');
    $this->load->view('ganti_password');
    $this->load->view('templates_admin/footer');
  }

  public function ganti_password_aksi()
  {
    $pass_baru = $this->input->post('pass_baru');
    $ulang_pass = $this->input->post('ulang_pass');

    $this->form_validation->set_rules('pass_baru', 'Password Baru', 'required|matches[ulang_pass]');
    $this->form_validation->set_rules('ulang_pass', 'Password Baru', 'required');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('templates_admin/header');
      $this->load->view('ganti_password');
      $this->load->view('templates_admin/footer');
    } else {
      $data = array('password' => md5($pass_baru));
      $id = array('id_user' => $this->session->userdata('id_user'));

      $this->rental_model->update_password($id, $data, 'user');
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
      Password berhasil diupdate, silahkan login.
      <button type="button" class="close" data-dismiss="alert" aria-label="close">
        <span aria-hidden="true">&times;</span>
      </button></div>');
      redirect('auth/login');
    }
  }



  public function _rules()
  {
    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');
  }
}
