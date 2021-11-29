<?php

class Contact extends CI_Controller
{


  public function __construct()
  {
    parent::__construct();
    check_not_login(); /*pengecekan status login */
    check_admin(); /*pengecekan status level admin atau bukan */
    // load semua model yang dibutuhkan
    $this->load->model('Contact_model');
  }

  public function index()
  {
    $data['contact'] = $this->Contact_model->get_all_contact();
    $this->template->load('templateAdmin', 'admin/data_contact', $data);
  }
  // update status contact 
  public function update_contact_status($id_contact)
  {
    $this->Contact_model->update_contact($id_contact);

    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('success', '<b>Data berhasil diupdate!</b> Silahkan cek kembali data Anda.');
      redirect('admin/contact');
    } else {
      $this->session->set_flashdata('failed', '<b>Data gagal diupdate!</b> Silahkan cek kembali data Anda.');
      redirect('admin/contact');
    }
  }

  public function delete_contact($id)
  {
    $this->Contact_model->delete_contact($id);
    $this->session->set_flashdata('success', '<b>Data berhasil dihapus!</b> Silahkan cek kembali data Anda.');
    redirect('admin/contact');
  }
}
