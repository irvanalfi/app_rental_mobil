<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    //Do your magic here
    check_already_login();
    $this->load->model('User_model');
  }


  public function login()
  {
    $this->_rules();

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('login');
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

  public function register()
  {
    $this->form_validation->set_rules(
      'nama',
      'Nama',
      'required',
      array(
        'required'    => '<p class="text-danger">  * Kamu belum mengisi %s !</p>'
      )
    );
    $this->form_validation->set_rules(
      'username',
      'Username',
      'required|is_unique[user.username]|min_length[5]',
      array(
        'required'    => '<p class="text-danger"> * Kamu belum mengisi %s !</p>',
        'is_unique'   => '<p class="text-danger">  * %s ini telah digunakan!</p>',
        'min_length'  => '<p class="text-danger">  * %s harus lebih dari 5 karakter!</p>'
      )
    );
    $this->form_validation->set_rules(
      'alamat',
      'Alamat',
      'required',
      array(
        'required'    => '<p class="text-danger"> * Kamu belum mengisi %s !</p>'
      )
    );
    $this->form_validation->set_rules(
      'email',
      'Email',
      'required|is_unique[user.email]',
      array(
        'required'    => '<p class="text-danger"> * Kamu belum mengisi %s !</p>',
        'is_unique'   => '<p class="text-danger">  * %s ini telah digunakan!</p>'
      )
    );
    $this->form_validation->set_rules(
      'no_telepon',
      'No. Telepon',
      'required',
      array(
        'required'    => '<p class="text-danger"> * Kamu belum mengisi %s !</p>'
      )
    );
    $this->form_validation->set_rules(
      'no_ktp',
      'Nao. KTP',
      'required|is_unique[user.no_ktp]',
      array(
        'required'    => '<p class="text-danger"> * Kamu belum mengisi %s !</p>',
        'is_unique'   => '<p class="text-danger">  * %s ini telah digunakan!</p>'
      )
    );
    $this->form_validation->set_rules(
      'password',
      'Password',
      'required|min_length[5]',
      array(
        'required'    => '<p class="text-danger"> * Kamu belum mengisi %s !</p>',
        'min_length'  => '<p class="text-danger">  * %s harus lebih dari 5 karakter!</p>'
      )
    );
    $this->form_validation->set_rules(
      'cpassword',
      'Konfirmasi Password',
      'required|min_length[5]|matches[password]',
      array(
        'required'    => '<p class="text-danger"> * Kamu belum mengisi %s !</p>',
        'min_length'  => '<p class="text-danger">  * %s harus lebih dari 5 karakter!</p>',
        'matches'     => '<p class="text-danger">  * %s tidak sama dengan password!</p>'
      )
    );
    $this->form_validation->set_rules(
      'gender',
      'Gender',
      'required',
      array(
        'required' => '<p class="text-danger"> * Kamu belum mengisi %s !</p>'
      )
    );

    if (empty($_FILES['foto_ktp']['name'])) {
      $this->form_validation->set_rules(
        'foto_ktp',
        'Gambar KTP',
        'required',
        array(
          'required' => '<p class="text-danger"> * Kamu belum mengupload %s !</p>'
        )
      );
    }

    // untuk foto profile tidak wajib 
    if (empty($_FILES['avatar']['name'])) {
      $this->form_validation->set_rules(
        'avatar',
        'Foto Profil',
        'required',
        array(
          'required' => '<p class="text-danger"> * Kamu belum mengupload %s !</p>'
        )
      );
    }

    if ($this->form_validation->run() ==  FALSE) {
      $this->load->view('register');
    } else {
      $this->registerProses();
    }
  }

  public function registerProses()
  {
    $file = explode(",", $this->uploadFoto());
    $data = [
      "nama"        => $this->input->post('nama'),
      "username"    => $this->input->post('username'),
      "alamat"      => $this->input->post('alamat'),
      "email"       => $this->input->post('email'),
      "no_telepon"  => $this->input->post('no_telepon'),
      "no_ktp"      => $this->input->post('no_ktp'),
      "password"    => md5($this->input->post('password')),
      "gender"      => $this->input->post('gender'),
      "role"        => 2,
      "foto_ktp"    => $file[0],
      "avatar"      => $file[1],
      "created"     => date('Y-m-d H:i:s'),
      "created_by"  => $this->session->userdata('id_user')
    ];

    $this->User_model->add_user($data);

    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('success', '<b>Data User berhasil diinput!</b> Silahkan cek kembali data Anda.');
      redirect('admin/data_user');
    } else {
      $this->session->set_flashdata('failed', '<b>Data User gagal diinput!</b> Silahkan cek kembali data Anda.');
      redirect('admin/data_user');
    }
  }

  public function uploadFoto()
  {
    $config1['upload_path']    = './assets/upload/user/ktp/';
    $config1['allowed_types']  = 'jpg|jpeg|png';
    $config1['detect_mime']    = TRUE;
    $config1['max_size']       = 5120;
    $config1['file_name']      = 'ktp-' . date('dmy') . '-' . substr(md5(rand()), 0, 10);

    $this->upload->initialize($config1);
    $uploadKTP    = $this->upload->do_upload('foto_ktp');
    $namaKTP      = $this->upload->data('file_name');

    $config['upload_path']    = './assets/upload/user/avatar/';
    $config['allowed_types']  = 'jpg|jpeg|png';
    $config['detect_mime']    = TRUE;
    $config['max_size']       = 5120;
    $config['file_name']      = 'avatar-' . date('dmy') . '-' . substr(md5(rand()), 0, 10);

    $this->upload->initialize($config);
    $uploadAvatar = $this->upload->do_upload('avatar');
    $namaAvatar   = $this->upload->data('file_name');

    if ($uploadKTP && $uploadAvatar) {
      return $namaKTP . ',' . $namaAvatar;
    } elseif (!$uploadKTP) {
      $this->session->set_flashdata('failed', "<b>Eror !</b> File foto yang dimasukkan tidak sesuai, silahkan pilih gambar yang lain.");
      unlink('./assets/upload/user/avatar/' . $namaAvatar);
      redirect('admin/data_user/addUser');
    } elseif (!$uploadAvatar) {
      $this->session->set_flashdata('failed', "<b>Eror !</b> File foto yang dimasukkan tidak sesuai, silahkan pilih gambar yang lain.");
      unlink('./assets/upload/user/ktp/' . $namaKTP);
      redirect('admin/data_user/addUser');
    }
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
