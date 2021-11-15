<?php

class Data_mobil extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();

    if (empty($this->session->userdata('username'))) {
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Anda belum login!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
      redirect('auth/login');
    } elseif ($this->session->userdata('role') != '1') {
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Anda tidak punya akses ke halaman ini!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
      redirect('customer/dashboard');
    }
  }

  public function index()
  {
    $data['mobil'] = $this->rental_model->get_data('mobil')->result();
    $data['tipe'] = $this->rental_model->get_data('tipe')->result();
    $this->load->view('templates_admin/header');
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/data_mobil', $data);
    $this->load->view('templates_admin/footer');
  }

  public function tambah_mobil()
  {
    $data['tipe'] = $this->rental_model->get_data('tipe')->result();
    $this->load->view('templates_admin/header');
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/form_tambah_mobil', $data);
    $this->load->view('templates_admin/footer');
  }

  public function tambah_mobil_aksi()
  {
    $this->_rules();

    if ($this->form_validation->run() == FALSE) {
      $this->tambah_mobil();
    } else {
      $kode_tipe    = $this->input->post('kode_tipe');
      $merek        = $this->input->post('merek');
      $no_plat      = $this->input->post('no_plat');
      $warna        = $this->input->post('warna');
      $jmlh_kursi   = $this->input->post('jmlh_kursi');
      $bagasi       = $this->input->post('bagasi');
      $transmisi    = $this->input->post('transmisi');
      $km           = $this->input->post('km');
      $bbm          = $this->input->post('bbm');
      $tahun        = $this->input->post('tahun');
      $status       = $this->input->post('status');
      $harga        = $this->input->post('harga');
      $hrg_supir    = $this->input->post('hrg_supir');
      $denda        = $this->input->post('denda');
      $sopir        = $this->input->post('sopir');
      $ac           = $this->input->post('ac');
      $seat_belt    = $this->input->post('seat_belt');
      $air          = $this->input->post('air');
      $p3k          = $this->input->post('p3k');
      $audio_input  = $this->input->post('audio_input');
      $mp3_player   = $this->input->post('mp3_player');
      $bluethooth   = $this->input->post('bluethooth');
      $vidio        = $this->input->post('vidio');
      $central_lock = $this->input->post('central_lock');
      $ban_serep    = $this->input->post('ban_serep');
      $car_kit      = $this->input->post('car_kit');
      $detail       = $this->input->post('detail');
      $gambar       = $_FILES['gambar']['name'];

      if ($gambar = '') {
      } else {
        $config['upload_path']    = './assets/upload/car/';
        $config['allowed_types']  = 'jpg|jpeg|png|tiff|gif';
        $config['max_size']       = 5120;
        $config['file_name']      = 'car-' . date('dmy') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gambar')) {
          echo $this->upload->display_error();
        } else {
          $gambar = $this->upload->data('file_name');
        }
      }
      $data = array(
        'kode_tipe'    => $kode_tipe,
        'merek'        => $merek,
        'no_plat'      => $no_plat,
        'tahun'        => $tahun,
        'warna'        => $warna,
        'jmlh_kursi'   => $jmlh_kursi,
        'bagasi'       => $bagasi,
        'transmisi'    => $transmisi,
        'km'           => $km,
        'bbm'          => $bbm,
        'status'       => $status,
        'harga'        => $harga,
        'hrg_supir'    => $hrg_supir,
        'denda'        => $denda,
        'sopir'        => $sopir,
        'ac'           => $ac,
        'seat_belt'    => $seat_belt,
        'air'          => $air,
        'p3k'          => $p3k,
        'audio_input'  => $audio_input,
        'mp3_player'   => $mp3_player,
        'bluethooth'   => $bluethooth,
        'central_lock' => $central_lock,
        'vidio'        => $vidio,
        'ban_serep'    => $ban_serep,
        'car_kit'      => $car_kit,
        'detail'       => $detail,
        'gambar'       => $gambar,
      );

      $this->rental_model->insert_data($data, 'mobil');
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
      Data berhasil ditambahkan
      <button type="button" class="close" data-dismiss="alert" aria-label="close">
        <span aria-hidden="true">&times;</span>
      </button></div>');
      redirect('admin/data_mobil');
    }
  }

  public function update_mobil($id)
  {
    $where = array('id_mobil' => $id);
    $data['mobil'] = $this->db->query("SELECT * FROM mobil mb, tipe tp WHERE mb.kode_tipe = tp.kode_tipe AND mb.id_mobil = '$id'")->result();
    $data['tipe'] = $this->rental_model->get_data('tipe')->result();
    $this->load->view('templates_admin/header');
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/form_update_mobil', $data);
    $this->load->view('templates_admin/footer');
  }

  public function update_mobil_aksi()
  {
    $this->_rules();

    if ($this->form_validation->run() == FALSE) {
      $id = $this->input->post('id_mobil');
      $this->update_mobil($id);
    } else {
      $id           = $this->input->post('id_mobil');
      $kode_tipe    = $this->input->post('kode_tipe');
      $merek        = $this->input->post('merek');
      $no_plat      = $this->input->post('no_plat');
      $warna        = $this->input->post('warna');
      $jmlh_kursi   = $this->input->post('jmlh_kursi');
      $bagasi       = $this->input->post('bagasi');
      $transmisi    = $this->input->post('transmisi');
      $km           = $this->input->post('km');
      $bbm          = $this->input->post('bbm');
      $tahun        = $this->input->post('tahun');
      $status       = $this->input->post('status');
      $harga        = $this->input->post('harga');
      $hrg_supir    = $this->input->post('hrg_supir');
      $denda        = $this->input->post('denda');
      $sopir        = $this->input->post('sopir');
      $ac           = $this->input->post('ac');
      $seat_belt    = $this->input->post('seat_belt');
      $air          = $this->input->post('air');
      $p3k          = $this->input->post('p3k');
      $audio_input  = $this->input->post('audio_input');
      $mp3_player   = $this->input->post('mp3_player');
      $bluethooth   = $this->input->post('bluethooth');
      $vidio        = $this->input->post('vidio');
      $central_lock = $this->input->post('central_lock');
      $ban_serep    = $this->input->post('ban_serep');
      $car_kit      = $this->input->post('car_kit');
      $detail       = $this->input->post('detail');
      $gambar       = $_FILES['gambar']['name'];

      if ($gambar) {
        $config['upload_path']    = './assets/upload/car/';
        $config['allowed_types']  = 'jpg|jpeg|png|tiff|gif';
        $config['max_size']       = 5120;
        $config['file_name']      = 'car-' . date('dmy') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar')) {
          $gambar = $this->upload->data('file_name');
          $this->db->set('gambar', $gambar);
        } else {
          echo $this->upload->display_error();
        }
      }
      $data = array(
        'kode_tipe'    => $kode_tipe,
        'merek'        => $merek,
        'no_plat'      => $no_plat,
        'tahun'        => $tahun,
        'warna'        => $warna,
        'jmlh_kursi'   => $jmlh_kursi,
        'bagasi'       => $bagasi,
        'transmisi'    => $transmisi,
        'km'           => $km,
        'bbm'          => $bbm,
        'status'       => $status,
        'harga'        => $harga,
        'hrg_supir'    => $hrg_supir,
        'denda'        => $denda,
        'sopir'        => $sopir,
        'ac'           => $ac,
        'seat_belt'    => $seat_belt,
        'air'          => $air,
        'p3k'          => $p3k,
        'audio_input'  => $audio_input,
        'mp3_player'   => $mp3_player,
        'bluethooth'   => $bluethooth,
        'central_lock' => $central_lock,
        'vidio'        => $vidio,
        'ban_serep'    => $ban_serep,
        'car_kit'      => $car_kit,
        'detail'       => $detail,
        'gambar'       => $gambar,
      );
      $where = array('id_mobil' => $id);

      $this->rental_model->update_data('mobil', $data, $where);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
      Data berhasil diupdate
      <button type="button" class="close" data-dismiss="alert" aria-label="close">
        <span aria-hidden="true">&times;</span>
      </button></div>');
      redirect('admin/data_mobil');
    }
  }

  public function detail_mobil($id)
  {
    $data['detail'] = $this->rental_model->ambil_id_mobil($id);
    $this->load->view('templates_admin/header');
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/detail_mobil', $data);
    $this->load->view('templates_admin/footer');
  }

  public function delete_mobil($id)
  {
    $where = array('id_mobil' => $id);

    $this->rental_model->delete_data($where, 'mobil');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
    Data berhasil dihapus
    <button type="button" class="close" data-dismiss="alert" aria-label="close">
      <span aria-hidden="true">&times;</span>
    </button></div>');
    redirect('admin/data_mobil');
  }

  public function _rules()
  {
    $this->form_validation->set_rules('kode_tipe', 'Kode Tipe', 'required');
    $this->form_validation->set_rules('merek', 'Merek', 'required');
    $this->form_validation->set_rules('no_plat', 'Nomor Plat', 'required');
    $this->form_validation->set_rules('tahun', 'Tahun', 'required');
    $this->form_validation->set_rules('warna', 'Warna', 'required');
    $this->form_validation->set_rules('status', 'Status', 'required');
    $this->form_validation->set_rules('harga', 'Harga', 'required');
    $this->form_validation->set_rules('denda', 'Denda', 'required');
    $this->form_validation->set_rules('ac', 'AC', 'required');
    $this->form_validation->set_rules('sopir', 'Sopir', 'required');
    $this->form_validation->set_rules('mp3_player', 'MP3 Player', 'required');
    $this->form_validation->set_rules('central_lock', 'Central Lock', 'required');
  }
}
