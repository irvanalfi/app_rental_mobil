<?php
// programmer : M. Irvan Alfi Hidayat, Oktaviano andi suryadi, Sadewa Mukti Witjaksono
// terakhir update syntax : -

class Mobil extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    check_not_login(); /*pengecekan status login */
    check_admin(); /*pengecekan status level admin atau bukan */
    // load semua model yang dibutuhkan
    $this->load->model('Mobil_model');
    $this->load->model('Tipe_model');
    $this->load->model('Fitur_model');
  }

  public function index()
  {
    $data['mobil'] = $this->Mobil_model->get_all_mobil();
    $this->template->load('templateAdmin', 'admin/data_mobil', $data);
  }

  public function tambah_mobil()
  {
    $data['tipe'] = $this->Tipe_model->get_all_tipe();

    if (empty($_FILES['gambar']['name'])) {
      $this->form_validation->set_rules(
        'gambar',
        'Gambar Mobil',
        'required',
        array(
          'required' => '<p class="text-danger"> * Kamu belum mengupload %s !</p>'
        )
      );
    }

    $this->form_validation->set_rules(
      'id_tipe',
      'Tipe',
      'required',
      array(
        'required' => '<p class="text-danger"> * Kamu belum memilih %s !</p>'
      )
    );

    $this->form_validation->set_rules(
      'merek',
      'Merek',
      'required|min_length[5]',
      array(
        'required'    => '<p class="text-danger"> * Kamu belum mengisi %s !</p>',
        'min_length'  => '<p class="text-danger">  * %s harus lebih dari 5 karakter!</p>'
      )
    );

    $this->form_validation->set_rules(
      'no_plat',
      'Nomor Plat',
      'required|is_unique[mobil.no_plat]|min_length[5]',
      array(
        'required'    => '<p class="text-danger"> * Kamu belum mengisi %s !</p>',
        'is_unique'   => '<p class="text-danger">  * %s ini telah digunakan!</p>',
        'min_length'  => '<p class="text-danger">  * %s harus lebih dari 5 karakter!</p>'
      )
    );

    $this->form_validation->set_rules(
      'jmlh_kursi',
      'Jumlah kursi',
      'required',
      array(
        'required' => '<p class="text-danger"> * Kamu belum mengisi %s !</p>'
      )
    );

    $this->form_validation->set_rules(
      'warna',
      'Warna',
      'required',
      array(
        'required' => '<p class="text-danger"> * Kamu belum mengisi %s !</p>'
      )
    );

    $this->form_validation->set_rules(
      'transmisi',
      'Transmisi',
      'required',
      array(
        'required' => '<p class="text-danger"> * Kamu belum memilih %s !</p>'
      )
    );

    $this->form_validation->set_rules(
      'bagasi',
      'Bagasi',
      'required',
      array(
        'required' => '<p class="text-danger"> * Kamu belum mengisi %s !</p>'
      )
    );

    $this->form_validation->set_rules(
      'bbm',
      'BBM',
      'required',
      array(
        'required' => '<p class="text-danger"> * Kamu belum memilih %s !</p>'
      )
    );

    $this->form_validation->set_rules(
      'tahun',
      'Tahun',
      'required',
      array(
        'required' => '<p class="text-danger"> * Kamu belum mengisi %s !</p>'
      )
    );

    $this->form_validation->set_rules(
      'km',
      'Kilometer Mobil',
      'required',
      array(
        'required' => '<p class="text-danger"> * Kamu belum mengisi %s !</p>'
      )
    );

    $this->form_validation->set_rules(
      'status',
      'Status Mobil',
      'required',
      array(
        'required' => '<p class="text-danger"> * Kamu belum memilih %s !</p>'
      )
    );

    $this->form_validation->set_rules(
      'harga',
      'Harga Mobil',
      'required',
      array(
        'required' => '<p class="text-danger"> * Kamu belum mengisi %s !</p>'
      )
    );

    $this->form_validation->set_rules(
      'denda',
      'Denda Telat',
      'required',
      array(
        'required' => '<p class="text-danger"> * Kamu belum mengisi %s !</p>'
      )
    );

    $this->form_validation->set_rules(
      'detail',
      'Detail',
      'required',
      array(
        'required' => '<p class="text-danger"> * Kamu belum mengisi %s !</p>'
      )
    );

    $this->form_validation->set_rules(
      'hrg_supir',
      'Harga Supir',
      'required',
      array(
        'required' => '<p class="text-danger"> * Kamu belum mengisi %s !</p>'
      )
    );

    $this->form_validation->set_rules(
      'supir',
      'Lepas kunci',
      'required',
      array(
        'required' => '<p class="text-danger"> * Kamu belum memilih %s !</p>'
      )
    );

    $this->form_validation->set_rules(
      'ac',
      'AC',
      'required',
      array(
        'required' => '<p class="text-danger"> * Kamu belum memilih %s !</p>'
      )
    );

    $this->form_validation->set_rules(
      'seat_belt',
      'Seat belt',
      'required',
      array(
        'required' => '<p class="text-danger"> * Kamu belum memilih %s !</p>'
      )
    );

    $this->form_validation->set_rules(
      'air',
      'Air Minum',
      'required',
      array(
        'required' => '<p class="text-danger"> * Kamu belum memilih %s !</p>'
      )
    );

    $this->form_validation->set_rules(
      'p3k',
      'P3K',
      'required',
      array(
        'required' => '<p class="text-danger"> * Kamu belum memilih %s !</p>'
      )
    );

    $this->form_validation->set_rules(
      'audio_input',
      'Audio Input',
      'required',
      array(
        'required' => '<p class="text-danger"> * Kamu belum memilih %s !</p>'
      )
    );

    $this->form_validation->set_rules(
      'mp3_player',
      'Mp3 Player',
      'required',
      array(
        'required' => '<p class="text-danger"> * Kamu belum memilih %s !</p>'
      )
    );

    $this->form_validation->set_rules(
      'bluetooth',
      'BlueTooth',
      'required',
      array(
        'required' => '<p class="text-danger"> * Kamu belum memilih %s !</p>'
      )
    );

    $this->form_validation->set_rules(
      'vidio',
      'Vidio',
      'required',
      array(
        'required' => '<p class="text-danger"> * Kamu belum memilih %s !</p>'
      )
    );

    $this->form_validation->set_rules(
      'central_lock',
      'Central Lock',
      'required',
      array(
        'required' => '<p class="text-danger"> * Kamu belum memilih %s !</p>'
      )
    );

    $this->form_validation->set_rules(
      'ban_serep',
      'Roda Cadangan',
      'required',
      array(
        'required' => '<p class="text-danger"> * Kamu belum memilih %s !</p>'
      )
    );

    $this->form_validation->set_rules(
      'car_kit',
      'Peralatan Mobil',
      'required',
      array(
        'required' => '<p class="text-danger"> * Kamu belum memilih %s !</p>'
      )
    );

    if ($this->form_validation->run() == FALSE) {
      $this->template->load('templateAdmin', 'admin/form_tambah_mobil', $data);
    } else {
      $this->tambah_mobil_aksi();
    }
  }

  public function tambah_mobil_aksi()
  {
    $namaGambarMobil = $this->upload_gambar_mobil();
    $mobil = $this->Mobil_model->get_latest_id_mobil();

    $new_id_mobil = $mobil['id_mobil'] + 1;

    $data_mobil = [
      "id_mobil"      => $new_id_mobil,
      "id_tipe"       => $this->input->post('id_tipe', true),
      "merek"         => $this->input->post('merek', true),
      "no_plat"       => $this->input->post('no_plat', true),
      "warna"         => $this->input->post('warna', true),
      "transmisi"     => $this->input->post('transmisi', true),
      "jmlh_kursi"    => $this->input->post('jmlh_kursi', true),
      "bagasi"        => $this->input->post('bagasi', true),
      "bbm"           => $this->input->post('bbm', true),
      "tahun"         => $this->input->post('tahun', true),
      "km"            => $this->input->post('km', true),
      "status"        => $this->input->post('status', true),
      "harga"         => $this->input->post('harga', true),
      "denda"         => $this->input->post('denda', true),
      "gambar"        => $namaGambarMobil,
      "detail"        => $this->input->post('detail', true),
      "created"       => date('Y-m-d H:i:s'),
      "created_by"    => $this->session->userdata('id_user')
    ];

    $data_fitur_mobil = [
      "id_mobil"      => $new_id_mobil,
      "supir"         => $this->input->post('supir', true),
      "hrg_supir"     => $this->input->post('hrg_supir', true),
      "ac"            => $this->input->post('ac', true),
      "seat_belt"     => $this->input->post('seat_belt', true),
      "air"           => $this->input->post('air', true),
      "p3k"           => $this->input->post('p3k', true),
      "audio_input"   => $this->input->post('audio_input', true),
      "mp3_player"    => $this->input->post('mp3_player', true),
      "bluetooth"     => $this->input->post('bluetooth', true),
      "vidio"         => $this->input->post('vidio', true),
      "central_lock"  => $this->input->post('central_lock', true),
      "ban_serep"     => $this->input->post('ban_serep', true),
      "car_kit"       => $this->input->post('car_kit', true),
      "created"       => date('Y-m-d H:i:s'),
      "created_by"    => $this->session->userdata('id_user')
    ];

    $this->Mobil_model->add_mobil($data_mobil);
    $this->Fitur_model->add_fitur($data_fitur_mobil);

    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('success', '<b>Data Mobil berhasil diinput!</b> Silahkan cek kembali data Anda.');
      redirect('admin/mobil');
    } else {
      $this->session->set_flashdata('failed', '<b>Data Mobil gagal diinput!</b> Silahkan cek kembali data Anda.');
      redirect('admin/mobil');
    }
  }

  public function update_mobil($id)
  {

    $data['mobil'] = $this->Mobil_model->get_mobil_by_id($id);
    $data['tipe'] = $this->Tipe_model->get_all_tipe();
    $data['bbm'] = array("Solar", "Bensin", "Pertalite", "Pertamax");
    $data['transmisi'] = array("Manual", "Matic");

    $is_unique_plat = '|is_unique[mobil.no_plat]';
    $no_plat_lama = $this->input->post('no_plat_lama');
    $no_plat = $this->input->post('no_plat');

    if ($no_plat == $no_plat_lama) {
      $is_unique_plat = '';
    }

    $this->form_validation->set_rules(
      'merek',
      'Merek',
      'required|min_length[5]',
      array(
        'required'    => '<p class="text-danger"> * Kamu belum mengisi %s !</p>',
        'min_length'  => '<p class="text-danger">  * %s harus lebih dari 5 karakter!</p>'
      )
    );

    $this->form_validation->set_rules(
      'no_plat',
      'Nomor Plat',
      'required|min_length[5]' . $is_unique_plat,
      array(
        'required'    => '<p class="text-danger"> * Kamu belum mengisi %s !</p>',
        'min_length'  => '<p class="text-danger">  * %s harus lebih dari 5 karakter!</p>',
        'is_unique'   => '<p class="text-danger">  * %s ini telah digunakan!</p>'
      )
    );

    $this->form_validation->set_rules(
      'jmlh_kursi',
      'Jumlah kursi',
      'required',
      array(
        'required' => '<p class="text-danger"> * Kamu belum mengisi %s !</p>'
      )
    );

    $this->form_validation->set_rules(
      'warna',
      'Warna',
      'required',
      array(
        'required' => '<p class="text-danger"> * Kamu belum mengisi %s !</p>'
      )
    );

    $this->form_validation->set_rules(
      'bagasi',
      'Bagasi',
      'required',
      array(
        'required' => '<p class="text-danger"> * Kamu belum mengisi %s !</p>'
      )
    );

    $this->form_validation->set_rules(
      'tahun',
      'Tahun',
      'required',
      array(
        'required' => '<p class="text-danger"> * Kamu belum mengisi %s !</p>'
      )
    );

    $this->form_validation->set_rules(
      'km',
      'Kilometer Mobil',
      'required',
      array(
        'required' => '<p class="text-danger"> * Kamu belum mengisi %s !</p>'
      )
    );

    $this->form_validation->set_rules(
      'harga',
      'Harga Mobil',
      'required',
      array(
        'required' => '<p class="text-danger"> * Kamu belum mengisi %s !</p>'
      )
    );

    $this->form_validation->set_rules(
      'denda',
      'Denda Telat',
      'required',
      array(
        'required' => '<p class="text-danger"> * Kamu belum mengisi %s !</p>'
      )
    );

    $this->form_validation->set_rules(
      'detail',
      'Detail',
      'required',
      array(
        'required' => '<p class="text-danger"> * Kamu belum mengisi %s !</p>'
      )
    );

    $this->form_validation->set_rules(
      'hrg_supir',
      'Harga Supir',
      'required',
      array(
        'required' => '<p class="text-danger"> * Kamu belum mengisi %s !</p>'
      )
    );

    if ($this->form_validation->run() == FALSE) {
      $this->template->load('templateAdmin', 'admin/form_update_mobil', $data);
    } else {
      $this->update_mobil_aksi();
    }
  }

  public function update_mobil_aksi()
  {
    $id_mobil = $this->input->post('id_mobil');
    $id_fitur = $this->input->post('id_fitur');
    $namaGambarMobil = $this->ubah_gambar_mobil($id_mobil);

    $data_mobil = [
      "id_mobil"      => $id_mobil,
      "id_tipe"       => $this->input->post('id_tipe', true),
      "merek"         => $this->input->post('merek', true),
      "no_plat"       => $this->input->post('no_plat', true),
      "warna"         => $this->input->post('warna', true),
      "transmisi"     => $this->input->post('transmisi', true),
      "jmlh_kursi"    => $this->input->post('jmlh_kursi', true),
      "bagasi"        => $this->input->post('bagasi', true),
      "bbm"           => $this->input->post('bbm', true),
      "tahun"         => $this->input->post('tahun', true),
      "km"            => $this->input->post('km', true),
      "status"        => $this->input->post('status', true),
      "harga"         => $this->input->post('harga', true),
      "denda"         => $this->input->post('denda', true),
      "gambar"        => $namaGambarMobil,
      "detail"        => $this->input->post('detail', true),
      "updated"       => date('Y-m-d H:i:s'),
      "updated_by"    => $this->session->userdata('id_user')
    ];

    $data_fitur_mobil = [
      "id_mobil"      => $id_mobil,
      "supir"         => $this->input->post('supir', true),
      "hrg_supir"     => $this->input->post('hrg_supir', true),
      "ac"            => $this->input->post('ac', true),
      "seat_belt"     => $this->input->post('seat_belt', true),
      "air"           => $this->input->post('air', true),
      "p3k"           => $this->input->post('p3k', true),
      "audio_input"   => $this->input->post('audio_input', true),
      "mp3_player"    => $this->input->post('mp3_player', true),
      "bluetooth"     => $this->input->post('bluetooth', true),
      "vidio"         => $this->input->post('vidio', true),
      "central_lock"  => $this->input->post('central_lock', true),
      "ban_serep"     => $this->input->post('ban_serep', true),
      "car_kit"       => $this->input->post('car_kit', true),
      "updated"       => date('Y-m-d H:i:s'),
      "updated_by"    => $this->session->userdata('id_user')
    ];

    $this->Mobil_model->update_mobil($data_mobil, $id_mobil);
    $this->Fitur_model->update_fitur($data_fitur_mobil, $id_fitur);

    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('success', '<b>Data Mobil berhasil diupdate!</b> Silahkan cek kembali data Anda.');
      redirect('admin/mobil');
    } else {
      $this->session->set_flashdata('failed', '<b>Data Mobil gagal diupdate!</b> Silahkan cek kembali data Anda.');
      redirect('admin/mobil');
    }
  }

  public function detail_mobil($id)
  {
    $data['mobil'] = $this->Mobil_model->get_mobil_by_id($id);
    $this->template->load('templateAdmin', 'admin/detail_mobil', $data);
  }

  public function delete_mobil($id)
  {
    $this->hapus_gambar_mobil($id);
    $this->Mobil_model->delete_mobil($id);
    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('success', '<b>Data User berhasil dihapus!</b> Silahkan cek kembali data Anda.');
      redirect('admin/mobil');
    } else {
      $this->session->set_flashdata('failed', '<b>Data User gagal dihapus!</b> Silahkan lakukan kembali.');
      redirect('admin/mobil');
    }
  }

  // function untuk mengupload foto
  private function upload_gambar_mobil()
  {
    $config['upload_path']    = './assets/upload/car/';
    $config['allowed_types']  = 'jpg|jpeg|png';
    $config1['detect_mime']   = TRUE;
    $config['max_size']       = 5120;
    $config['file_name']      = 'car-' . date('dmy') . '-' . substr(md5(rand()), 0, 10);

    $this->upload->initialize($config);
    $uploadGambar = $this->upload->do_upload('gambar');
    $namaGambar   = $this->upload->data('file_name');

    if ($uploadGambar) {
      return $namaGambar;
    } else {
      $this->session->set_flashdata('failed', "<b>Eror !</b> File foto yang dimasukkan tidak sesuai, silahkan pilih gambar yang lain.");
      redirect('admin/mobil/tambah_mobil');
    }
  }

  //funtcion untuk mengubah foto ketika update
  private function ubah_gambar_mobil($id)
  {
    if (empty($_FILES['gambar']['name'])) {
      $gambar = $this->input->post('gambar_lama');
    } else {
      $this->hapus_gambar_mobil($id);
      $gambar = $this->upload_gambar_mobil();
    }
    return $gambar;
  }

  //funtcion untuk menghapus foto
  private function hapus_gambar_mobil($id)
  {
    $mobil = $this->Mobil_model->get_mobil_by_id($id);
    $fotoMobil = $mobil['gambar'];

    $target_file = 'assets/upload/car/' . $fotoMobil;
    unlink($target_file);
  }
}
