<?php

class Dashboard extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Mobil_model');
    $this->load->model('User_model');
    $this->load->model('Transaksi_model');

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
      redirect('beranda');
    }
  }

  public function index()
  {
    $data['mobil']      = $this->Mobil_model->get_jumlah_mobil();
    $data['customer']   = $this->User_model->get_jumlah_customer();
    $data['transaksi']  = $this->Transaksi_model->get_jumlah_transaksi();
    $data['laporan']    = $this->Transaksi_model->get_jumlah_transaksi_selesai();

    $this->load->view('templates_admin/header');
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/dashboard', $data);
    $this->load->view('templates_admin/footer');
  }
}
