<?php
// programmer : M. Irvan Alfi Hidayat, Oktaviano andi suryadi, Sadewa Mukti Witjaksono
// terakhir update syntax : -

class Transaksi extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    check_not_login(); /*pengecekan status login */
    check_admin(); /*pengecekan status level admin atau bukan */
    // load semua model yang dibutuhkan
    $this->load->model('Transaksi_model');
    $this->load->model('User_model');
    $this->load->model('Mobil_model');
  }

  public function index()
  {
    $data['transaksi'] = $this->Transaksi_model->get_all_transaksi();
    $this->template->load('templateAdmin', 'admin/data_transaksi', $data);
  }

  // tambpilan pilih user ketika akan merental
  public function pilihCustomer()
  {
    $data['customer'] = $this->User_model->get_user_customer();
    $this->template->load('templateAdmin', 'admin/form_pilih_customer', $data);
  }

  // tambpilan pilih mobil ketika akan merental
  public function pilihMobil($id)
  {
    $data['mobil'] = $this->Mobil_model->get_all_mobil();
    $data['user'] = $id;
    $this->template->load('templateAdmin', 'admin/form_pilih_mobil', $data);
  }

  // masuh halaman cek pembayaran
  public function cekPembayaran($id_transaksi)
  {
    $data['transaksi'] = $this->Transaksi_model->get_transaksi_by_id($id_transaksi);
    $this->form_validation->set_rules(
      'status_pembayaran',
      'Status Pembayaran',
      'required',
      array(
        'required'    => '<p class="text-danger"> * Kamu belum mengubah %s !</p>'
      )
    );

    if ($this->form_validation->run() == FALSE) {
      $this->template->load('templateAdmin', 'admin/cek_pembayaran', $data);
    } else {
      $this->cekPembayaranProses($id_transaksi);
    }
  }
  // proses ubah status pembayaran 
  public function cekPembayaranProses($id_transaksi)
  {
    $data = array(
      'status_pembayaran' => $this->input->post('status_pembayaran'),
      'confirm_by'        => $this->session->userdata('nama')
    );

    $this->Transaksi_model->update_status_pembayaran($data, $id_transaksi);
    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('success', '<b>Status Pembayaran sukses diupdate!</b> Silahkan cek kembali data Anda.');
      redirect('admin/transaksi');
    } else {
      $this->session->set_flashdata('failed', '<b>Status Pembayaran gagal diupdate!</b> Silahkan cek kembali data Anda.');
      redirect('admin/transaksi');
    }
  }

  public function downloadPembayaran($id)
  {
    $this->load->helper('download');
    $file = 'assets/upload/struk/' . $id;
    force_download($file, NULL);
  }

  // print struk invoice 
  public function cetakStruk($id)
  {
    $data['transaksi'] = $this->Transaksi_model->get_transaksi_by_id($id);
    $this->load->view('admin/cetak_invoice', $data);
  }

  public function transaksiSelesai($id_transaksi)
  {
    $transaksi = $this->Transaksi_model->get_transaksi_by_id($id_transaksi);
    $id_mobil           = $transaksi['id_mobil'];
    $tgl_pengembalian   = date('Y/m/d');
    $tgl_kembali        = $transaksi['tgl_kembali'];
    $denda              = $transaksi['denda'];

    if ($tgl_pengembalian > $tgl_kembali) {
      $x                  = strtotime($tgl_pengembalian);
      $y                  = strtotime($tgl_kembali);
      $selisih            = abs($x - $y) / (60 * 60 * 24);
      $total_denda        = $selisih * $denda;
    } else {
      $total_denda        = 0;
      $selisih            = 0;
    }
    $total_akhir          = $transaksi['total_akhir'] + $total_denda;

    $data = array(
      'tgl_pengembalian'    => $tgl_pengembalian,
      'status_rental'       => 'Selesai',
      'status_pengembalian' => 'Kembali',
      'total_denda'         => $total_denda,
      'total_akhir'         => $total_akhir,
      "updated"             => date('Y-m-d H:i:s'),
      'updated_by'          => $this->session->userdata('id_user')
    );

    $mobil = [
      'status'              => 1
    ];

    $this->Transaksi_model->update_transaksi($data, $id_transaksi);
    $this->Mobil_model->update_mobil($mobil, $id_mobil);
    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('success', '<b>Transaksi telah diselesaikan!</b> Silahkan cek kembali data Anda.');
      redirect('admin/transaksi');
    } else {
      $this->session->set_flashdata('failed', '<b>Transaksi gagal di selesaikan!</b> Silahkan cek kembali data Anda.');
      redirect('admin/transaksi');
    }
  }

  public function batal_transaksi($id)
  {
    $where = array('id_rental' => $id);

    $data = $this->rental_model->get_where($where, 'transaksi')->row();

    $where2 = array('id_mobil' => $data->id_mobil);
    // var_dump($where2);
    // die;
    $data2 = array('status' => '1');

    $this->rental_model->update_data('mobil', $data2, $where2);
    $this->rental_model->delete_data($where, 'transaksi');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
    Transaksi berhasil dibatalkan
    <button type="button" class="close" data-dismiss="alert" aria-label="close">
      <span aria-hidden="true">&times;</span>
    </button></div>');
    redirect('admin/transaksi');
  }
}
