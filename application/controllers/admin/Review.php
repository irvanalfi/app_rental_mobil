<?php

class Review extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    check_not_login(); /*pengecekan status login */
    check_admin(); /*pengecekan status level admin atau bukan */
    // load semua model yang dibutuhkan
    $this->load->model('Review_model');
  }

  public function index()
  {
    $data['review'] = $this->Review_model->get_all_review();
    // var_dump(json_encode($data));
    // die();
    $this->template->load('templateAdmin', 'admin/data_review', $data);
  }
  // update status review 
  public function update_review_status($id_review)
  {
    $this->Review_model->update_review($id_review);

    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('success', '<b>Data berhasil diupdate!</b> Silahkan cek kembali data Anda.');
      redirect('admin/data_review');
    } else {
      $this->session->set_flashdata('failed', '<b>Data gagal diupdate!</b> Silahkan cek kembali data Anda.');
      redirect('admin/data_review');
    }
  }

  public function delete_review($id)
  {
    $this->Review_model->delete_review($id);
    $this->session->set_flashdata('success', '<b>Data berhasil dihapus!</b> Silahkan cek kembali data Anda.');
    redirect('admin/data_review');
  }
}
