<?php
// programmer : M. Irvan Alfi Hidayat, Oktaviano andi suryadi, Sadewa Mukti Witjaksono
// terakhir update syntax : -

class Laporan extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    check_not_login(); /*pengecekan status login */
    check_admin(); /*pengecekan status level admin atau bukan */
    // load semua model yang dibutuhkan
    $this->load->model('Transaksi_model');
  }

  public function index()
  {
    $this->form_validation->set_rules(
      'dari',
      'Kolom Dari Mulai',
      'required',
      array(
        'required' => '<p class="text-danger"> * Kamu belum memilih %s !</p>'
      )
    );
    $this->form_validation->set_rules(
      'sampai',
      'Kolom Hingga Sampai',
      'required',
      array(
        'required' => '<p class="text-danger"> * Kamu belum memilih %s !</p>'
      )
    );
    $dari   = $this->input->post('dari') . ' 00:00:00';
    $sampai = $this->input->post('sampai') . ' 23:59:59';

    if ($this->form_validation->run() == FALSE) {
      $this->template->load('templateAdmin', 'admin/filter_laporan');
    } else {
      $data['laporan'] = $this->Transaksi_model->get_all_laporan_transaksi($dari, $sampai);
      $data['tanggal'] = [
        'dari'    => $dari,
        'sampai'  => $sampai
      ];
      $this->template->load('templateAdmin', 'admin/tampilkan_laporan', $data);
    }
  }

  public function print_laporan()
  {
    $dari   = $this->input->post('dari');
    $sampai = $this->input->post('sampai');
    $data['tanggal'] = [
      'dari'    => $dari,
      'sampai'  => $sampai
    ];
    $data['laporan'] = $this->Transaksi_model->get_all_laporan_transaksi($dari, $sampai);
    $this->load->view('admin/print_laporan', $data);
  }
}
