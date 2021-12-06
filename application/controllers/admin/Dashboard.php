<?php
// programmer : M. Irvan Alfi Hidayat, Oktaviano andi suryadi, Sadewa Mukti Witjaksono
// terakhir update syntax : -

class Dashboard extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    check_not_login(); /*pengecekan status login */
    check_admin(); /*pengecekan status level admin atau bukan */

    $this->load->model('Mobil_model');
    $this->load->model('User_model');
    $this->load->model('Transaksi_model');
    $this->load->model('Review_model');
  }

  public function index()
  {
    $data['mobil']            = $this->Mobil_model->get_jumlah_mobil();
    $data['customer']         = $this->User_model->get_jumlah_customer();
    $data['jml_transaksi']    = $this->Transaksi_model->get_jumlah_transaksi();
    $data['transaksi']        = $this->Transaksi_model->get_total_transaksi_bulan();
    $data['laporan']          = $this->Transaksi_model->get_jumlah_transaksi_selesai();
    $data['review_jelek']     = $this->Review_model->get_total_review_jelek();
    $data['review_baik']      = $this->Review_model->get_total_review_baik();

    $this->template->load('templateAdmin', 'admin/dashboard', $data);
  }
}
