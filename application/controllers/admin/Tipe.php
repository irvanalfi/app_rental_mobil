<?php
// programmer : M. Irvan Alfi Hidayat, Oktaviano andi suryadi, Sadewa Mukti Witjaksono
// terakhir update syntax : -

class Tipe extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    check_not_login(); /*pengecekan status login */
    check_admin(); /*pengecekan status level admin atau bukan */
    // load semua model yang dibutuhkan
    $this->load->model('Tipe_model');
  }

  public function index()
  {
    $data['tipe'] = $this->Tipe_model->get_all_tipe();
    $this->template->load('templateAdmin', 'admin/data_tipe', $data);
  }
  //tampilkan halaman tambah tipe
  public function addTipe()
  {
    $this->form_validation->set_rules(
      'kode_tipe',
      'Kode Tipe',
      'required|is_unique[tipe.kode_tipe]',
      array(
        'required' => '<p class="text-danger">  * Kamu belum mengisi %s !</p>',
        'is_unique' => '<p class="text-danger">  * %s ini telah digunakan!</p>'
      )
    );

    $this->form_validation->set_rules(
      'nama_tipe',
      'Nama Tipe',
      'required|is_unique[tipe.nama_tipe]',
      array(
        'required' => '<p class="text-danger"> * Kamu belum mengisi %s !</p>',
        'is_unique' => '<p class="text-danger">  * %s ini telah digunakan!</p>'
      )
    );

    if ($this->form_validation->run() ==  FALSE) {
      $this->template->load('templateAdmin', 'admin/form_tambah_tipe');
    } else {
      $this->addTipeProses();
    }
  }
  //proses tambah atau input data pada tabel tipe
  public function addTipeProses()
  {
    $data = [
      "kode_tipe"     => $this->input->post('kode_tipe'),
      "nama_tipe"     => $this->input->post('nama_tipe'),
      "created"       => date('Y-m-d H:i:s'),
      "created_by"    => $this->session->userdata('id_user')
    ];

    $this->Tipe_model->add_tipe($data);

    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('success', '<b>Data berhasil diinput!</b> Silahkan cek kembali data Anda.');
      redirect('admin/Tipe');
    } else {
      $this->session->set_flashdata('failed', '<b>Data gagal diinput!</b> Silahkan cek kembali data Anda.');
      redirect('admin/Tipe');
    }
  }

  public function update_tipe($id)
  {
    $is_unique_k = '|is_unique[tipe.kode_tipe]';
    $is_unique_n = '|is_unique[tipe.nama_tipe]';

    $old_nama_tipe    = $this->input->post('old_nama_tipe');
    $old_kode_tipe    = $this->input->post('old_kode_tipe');
    $nama_tipe        = $this->input->post('nama_tipe');
    $kode_tipe        = $this->input->post('kode_tipe');

    if ($old_kode_tipe == $kode_tipe) {
      $is_unique_k = '';
    }

    if ($old_nama_tipe == $nama_tipe) {
      $is_unique_n = '';
    }

    $this->form_validation->set_rules(
      'kode_tipe',
      'Kode Tipe',
      'required' . $is_unique_k,
      array(
        'required' => '<p class="text-danger">  * Kamu belum mengisi %s !</p>',
        'is_unique' => '<p class="text-danger">  * %s ini telah digunakan!</p>'
      )
    );

    $this->form_validation->set_rules(
      'nama_tipe',
      'Nama Tipe',
      'required' . $is_unique_n,
      array(
        'required' => '<p class="text-danger"> * Kamu belum mengisi %s !</p>',
        'is_unique' => '<p class="text-danger">  * %s ini telah digunakan!</p>'
      )
    );

    if ($this->form_validation->run() ==  FALSE) {
      $data['tipe'] = $this->Tipe_model->get_tipe_by_id($id);
      $this->template->load('templateAdmin', 'admin/form_update_tipe', $data);
    } else {
      $this->updateTipeProses();
    }
  }

  public function updateTipeProses()
  {
    $data = [
      "kode_tipe"     => $this->input->post('kode_tipe'),
      "nama_tipe"     => $this->input->post('nama_tipe'),
      "updated"       => date('Y-m-d H:i:s'),
      "updated_by"    => $this->session->userdata('id_user')
    ];
    $whare = $this->input->post('id_tipe');

    $this->Tipe_model->update_tipe($data, $whare);

    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('success', '<b>Data berhasil diupdate!</b> Silahkan cek kembali data Anda.');
      redirect('admin/Tipe');
    } else {
      $this->session->set_flashdata('failed', '<b>Data gagal diupdate!</b> Silahkan cek kembali data Anda.');
      redirect('admin/Tipe');
    }
  }

  public function delete_tipe($id)
  {
    $this->Tipe_model->delete_tipe($id);
    $this->session->set_flashdata('success', '<b>Data berhasil dihapus!</b> Silahkan cek kembali data Anda.');
    redirect('admin/Tipe');
  }
}
