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
      'status'              => 1,
      "updated"             => date('Y-m-d H:i:s'),
      'updated_by'          => $this->session->userdata('id_user')
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

  public function batalTransaksi($id_transaksi)
  {
    $transaksi                  = $this->Transaksi_model->get_transaksi_by_id($id_transaksi);
    $id_mobil                   = $transaksi['id_mobil'];
    $tgl_cancel                 = date('Y/m/d');
    $tgl_kembali                = $transaksi['tgl_kembali'];
    $harga_mobil                = $transaksi['harga'];
    $total_harga_mobil          = $transaksi['total_harga'];
    $harga_supir                = $transaksi['hrg_supir'];
    $total_harga_supir          = $transaksi['total_harga_supir'];
    $total_akhir                = $transaksi['total_akhir'];
    $pajak_per_hari             = $harga_mobil * 0.02;
    $total_pajak                = $transaksi['pajak'];


    $y                          = strtotime(date('Y/m/d'));
    $x                          = strtotime($transaksi['tgl_kembali']);
    $selisih                    = abs($x - $y) / (60 * 60 * 24);

    $ganti_total_harga_supir    = $total_harga_supir - ($harga_supir  * $selisih);
    $ganti_total_harga_pajak    = $total_pajak - ($pajak_per_hari * 0.5 * $selisih);
    $ganti_total_harga_mobil    = $total_harga_mobil - ($harga_mobil * 0.5 * $selisih);

    // yang di tambah hasil perhitungan (pajak perhari di kali selisih) + (hargamobil * 0.5 * selisih ) = total refund
    // update total akhir adalah total akhir lama - total refund
    $total_refund               = ($harga_supir * $selisih) + ($pajak_per_hari * 0.5 * $selisih) + ($harga_mobil * 0.5 * $selisih);
    $update_total_akhir         = $total_akhir - $total_refund;
    $data = [
      'status_rental'         => 'Batal',
      'status_pengembalian'   => 'Kembali',
      'tgl_pengembalian'      => $tgl_cancel,
      'tgl_cancel'            => $tgl_cancel,
      'total_harga'           => $ganti_total_harga_mobil,
      'total_harga_supir'     => $ganti_total_harga_supir,
      'pajak'                 => $ganti_total_harga_pajak,
      'total_refund'          => $total_refund,
      'total_akhir'           => $update_total_akhir,
      "updated"               => date('Y-m-d H:i:s'),
      'updated_by'            => $this->session->userdata('id_user')
    ];


    $mobil = [
      'status'              => 1,
      'updated'             => date('Y-m-d H:i:s'),
      'updated_by'          => $this->session->userdata('id_user')
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

  public function updateStatusPengembalian($id_transaksi)
  {
    $transaksi = $this->Transaksi_model->get_transaksi_by_id($id_transaksi);
    $id_mobil = $transaksi['id_mobil'];

    $data = [
      "status_pengembalian" => 'Belum Kembali',
      "updated"             => date('Y-m-d H:i:s'),
      "updated_by"          => $this->session->userdata('id_user')
    ];

    $mobil = [
      'status'              => 0,
      "updated"             => date('Y-m-d H:i:s'),
      'updated_by'          => $this->session->userdata('id_user')
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

  // proses upload bukti refund 
  public function uploadRefund($id_transaksi)
  {
    $data['transaksi'] = $this->Transaksi_model->get_transaksi_by_id($id_transaksi);
    $transaksi = $this->Transaksi_model->get_transaksi_by_id($id_transaksi);
    $data['user'] = $this->User_model->get_user_by_id($transaksi['updated_by']);
    $this->template->load('templateAdmin', 'admin/upload_refund', $data);
  }

  public function uploadRefundProses($id_transaksi)
  {
    $bukti_refrund = $_FILES['bukti_refund']['name'];
    if ($bukti_refrund = '') {
    } else {
      $config['upload_path']    = './assets/upload/refund/';
      $config['allowed_types']  = 'jpg|jpeg|png';
      $config['detect_mime']    = TRUE;
      $config['max_size']       = 5120;
      $config['file_name']      = 'Refund-' . date('dmy') . '-' . substr(md5(rand()), 0, 10);

      $this->upload->initialize($config);
      $upload   = $this->upload->do_upload('bukti_refund');
      $refund   = $this->upload->data('file_name');
      if (!$upload) {
        $this->session->set_flashdata('failed', '<b>Proses upload bukti pembayarn gagal!</b> Silahkan upload kembali');
        redirect('admin/transaksi/uploadRefund/' . $id_transaksi);
      }
    }

    $data = [
      "bukti_refund"        => $refund,
      "status_refund"       => 'Selesai',
      "updated"             => date('Y-m-d H:i:s'),
      "updated_by"          => $this->session->userdata('id_user')
    ];

    $this->Transaksi_model->update_transaksi($data, $id_transaksi);

    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('success', '<b>Proses upload bukti pembayarn berhasil!</b> Silahkan mengunggu konfirmasi admin.');
      redirect('admin/transaksi');
    }
  }

  public function downloadBuktiRefund($image)
  {
    $file = 'assets/upload/refund/' . $image;
    force_download($file, NULL);
  }
}
