<?php

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
  }

  public function index()
  {
    $data['mobil']      = $this->Mobil_model->get_jumlah_mobil();
    $data['customer']   = $this->User_model->get_jumlah_customer();
    $data['transaksi']  = $this->Transaksi_model->get_jumlah_transaksi();
    $data['laporan']    = $this->Transaksi_model->get_jumlah_transaksi_selesai();   
    $this->template->load('templateAdmin', 'admin/dashboard', $data);
  }
}
