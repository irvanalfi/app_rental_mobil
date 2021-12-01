<?php
// programmer : M. Irvan Alfi Hidayat, Oktaviano andi suryadi, Sadewa Mukti Witjaksono
// terakhir update syntax : -

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('User_model'); //load User Model
    $this->load->model('Token_model');
  }

  public function login()
  {
    check_already_login(); //cek apakah sudah login. jika sudah maka tidak bisa mengakses halaman login
    $this->form_validation->set_rules(
      'username',
      'Username',
      'required',
      array(
        'required'    => '<p class="text-danger">  * Kamu belum mengisi %s !</p>'
      )
    );
    $this->form_validation->set_rules(
      'password',
      'Password',
      'required',
      array(
        'required'    => '<p class="text-danger">  * Kamu belum mengisi %s !</p>'
      )
    );
    if ($this->form_validation->run() ==  FALSE) {
      $this->load->view('login');
    } else {
      $this->loginProses();
    }
  }

  public function loginProses()
  {
    $username   = $this->input->post('username');
    $password   = md5($this->input->post('password'));
    $cek        = $this->User_model->cek_login($username, $password);
    if ($cek == FALSE) {
      $this->session->set_flashdata('failed', '<b>Gagal login !</b> Silahkan cek kembali username dan password anda.');
      redirect('auth/login');
    } else {
      $params = array(
        'id_user'   => $cek->id_user,
        'username'  => $cek->username,
        'nama'      => $cek->nama,
        'email'     => $cek->email,
        'role'      => $cek->role,
        'avatar'    => $cek->avatar,
      );
      $this->session->set_userdata($params);
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

  public function logout()
  {
    $this->session->sess_destroy();
    redirect('beranda');
  }

  public function register()
  {
    check_already_login(); //cek apakah sudah login. jika sudah maka tidak bisa mengakses halaman login
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
      'required|is_unique[user.email]|valid_email',
      array(
        'required'    => '<p class="text-danger"> * Kamu belum mengisi %s !</p>',
        'is_unique'   => '<p class="text-danger">  * %s ini telah digunakan!</p>',
        'valid_email' => '<p class="text-danger">  * %s email tidak sesuai!</p>',
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
      "created_by"  => $this->input->post('username')
    ];

    $this->User_model->add_user($data);

    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('success', '<b>Register sukses!</b> Silahkan login.');
      redirect('auth/login');
    } else {
      $this->session->set_flashdata('failed', '<b>Register gagal!</b> Silahkan cek kembali data Anda.');
      redirect('auth/register');
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

  public function termcondition()
  {
    $this->load->view('termcondition');
  }

  public function lupa_password()
  {
    $this->form_validation->set_rules(
      'email',
      'Email',
      'required|valid_email',
      array(
        'required'    => '<p class="text-danger"> * Kamu belum mengisi %s !</p>',
        'valid_email' => '<p class="text-danger">  * %s tidak sesuai!</p>',
      )
    );

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('lupa_password.php');
    } else {
      $this->kirim_link_reset_password();
    }
  }

  public function kirim_link_reset_password()
  {
    $email    = $this->input->post('email');
    $user     = $this->User_model->get_user_by_email($email);
    $id_user  = $user['id_user'];

    if ($user != null) {

      $token = base64_encode(random_bytes(32));

      $data  = [
        "token"       => $token,
        "id_user"     => $id_user,
        "created"     => date('Y-m-d H:i:s'),
        "created_by"  => $id_user
      ];

      $this->Token_model->add_token($data);

      $this->_kirimEmail($email, $token, "reset_password");
      $this->session->set_flashdata('success', '<b>Email berhasil dikirim!</b> <br> Silahkan cek email Anda di kotak masuk/spam');
      redirect('password/lupa');
    } else {
      $this->session->set_flashdata('failed', '<b>Email gagal dikirim!</b> <br> Email yang dimasukkan tidak terdaftar.');
      redirect('password/lupa');
    }
  }

  public function backOne()
  {
    redirect($_SERVER['HTTP_REFERER']);
  }

  private function _kirimEmail($email, $token, $aksi)
  {
    $config = [
      'protocol'  => 'smtp',
      'smtp_host' => 'ssl://smtp.googlemail.com',
      'smtp_user' => '1841720002@student.polinema.ac.id',
      'smtp_pass' => 'polisi86',
      'smtp_port' => 465,
      'mailtype'  => 'html',
      'charset'   => 'utf-8',
      'newline'   => "\r\n"
    ];

    $this->load->library('email', $config);

    if ($aksi == "reset_password") {
      $this->email->from('1841720002@student.polinema.ac.id', 'Administrator Halim Rental Car');
      $this->email->to($email);

      $this->email->subject('Permintaan Reset Password');
      $this->email->message('Klik disini untuk mereset password akun anda : <a href="' . base_url('password/reset?token=') . urlencode($token) . '"> Reset Password </a>');
    }

    if ($this->email->send()) {
      return true;
    } else {
      echo $this->email->print_debugger();
    }
  }

  // pengecekan token
  public function check_token()
  {
    $token = $this->input->get('token');
    $user_token = $this->Token_model->get_token_by_token($token);

    if ($user_token) {
      $this->session->set_userdata('id', $user_token['id_user']);
      $this->ubah_password();
    } else {
      $this->session->set_flashdata('failed', '<b>Eror!</b> Token yang digunakan tidak tersedia.');
      redirect('auth/login');
    }
  }

  public function ubah_password()
  {
    if (!$this->session->userdata('id')) {
      redirect('auth/login');
    }

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

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('ubah_password.php');
    } else {
      $this->ubah_password_aksi();
    }
  }

  private function ubah_password_aksi()
  {
    $id_user = $this->session->userdata('id');

    $data = [
      "password"    => md5($this->input->post('password')),
      "updated"     => date('Y-m-d H:i:s'),
      "updated_by"  => $id_user
    ];

    $this->User_model->update_user($data, $id_user);
    $this->Token_model->delete_token_by_id_user($id_user);

    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('success', '<b>Password berhasil diubah!</b> Silahkan login.');
      $this->session->unset_userdata('id');
      redirect('auth/login');
    } else {
      $this->session->set_flashdata('failed', '<b>Password berhasil diubah</b> Silahkan lakukan lagi.');
      redirect('password/ubah');
    }
  }
}
