<?php
// programmer : M. Irvan Alfi Hidayat, Oktaviano andi suryadi, Sadewa Mukti Witjaksono
// terakhir update syntax : -

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
    $this->template->load('templateAdmin', 'admin/data_review', $data);
  }
  // update status review 
  public function update_review_status($id_review)
  {
    $data = [
      "status"        => 1,
      "updated"       => date('Y-m-d H:i:s'),
      "updated_by"    => $this->session->userdata('id_user')
    ];

    $this->Review_model->update_review($data, $id_review);

    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('success', '<b>Data berhasil diupdate!</b> Silahkan cek kembali data Anda.');
      redirect('admin/review');
    } else {
      $this->session->set_flashdata('failed', '<b>Data gagal diupdate!</b> Silahkan cek kembali data Anda.');
      redirect('admin/review');
    }
  }

  public function delete_review($id)
  {
    $this->Review_model->delete_review($id);
    $this->session->set_flashdata('success', '<b>Data berhasil dihapus!</b> Silahkan cek kembali data Anda.');
    redirect('admin/review');
  }
}
