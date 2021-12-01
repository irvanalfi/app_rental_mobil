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
  }

  public function index()
  {
    $data['transaksi'] = $this->Transaksi_model->get_all_transaksi();
    $this->template->load('templateAdmin', 'admin/data_transaksi', $data);
  }

  // tampilan halaman form rental
  public function addRental($id)
  {
    check_not_login(); /*pengecekan staus login */
    $id_user              = $this->session->userdata('id_user');
    $data['detail']       = $this->Mobil_model->get_mobil_by_id($id);
    $data['user']         = $this->User_model->get_user_by_id($id_user);
    $data['transaksi']    = $this->Transaksi_model->get_transaksi_by_id_mobil_saja($id);
    $data['review']       = $this->Review_model->get_review_by_id_mobil($id);
    $data['jumlahReview'] = $this->Review_model->get_jumlah_review_approved_by_id_mobil($id);

    // form validation 
    $this->form_validation->set_rules(
      'alamat_penjemputan',
      'Alamat penjemputan',
      'required',
      array(
        'required' => '* %s kamu masih kosong loh !'
      )
    );
    $this->form_validation->set_rules(
      'waktu_penjemputan',
      'Waktu penjemputan',
      'required',
      array(
        'required' => '* %s kamu masih kosong loh !'
      )
    );
    $this->form_validation->set_rules(
      'tgl_rental',
      'Tanggal rental',
      'required',
      array(
        'required' => '* %s kamu masih kosong loh !'
      )
    );
    $this->form_validation->set_rules(
      'tgl_kembali',
      'Tanggal pengembalian',
      'required',
      array(
        'required' => '* %s kamu masih kosong loh !'
      )
    );

    if ($this->form_validation->run() == FALSE) {
      // jika gagal menjalankan form validation 
      $this->template->load('templateCustomer', 'customer/addrental', $data);
    } else {
      // jika berhasil langsung masuk ke function prosesRental untuk input data ke data base transaksi
      $this->prosesRental();
    }
  }

  public function prosesRental()
  {
    check_not_login();

    $harga                = $this->input->post('hrg_hari', true);
    $hrg_supir            = $this->input->post('hrg_supir', true);
    $id_mobil             = $this->input->post('id_mobil', true);

    // mencari selisih dari tanggal rental dan tanggal kembali 
    $tanggal_rental       = strtotime($this->input->post('tgl_rental', true));
    $tanggal_kembali      = strtotime($this->input->post('tgl_kembali', true));
    $selisih              = abs($tanggal_rental - $tanggal_kembali) / (60 * 60 * 24) + 1;
    // melakukan perhitungan untuk pajak dan total akhir
    $total_harga          = $selisih *  $harga;
    $pajak                = $total_harga * 0.02;
    $total_harga_supir    = $hrg_supir * $selisih;
    $total_akhir          = $total_harga_supir + $total_harga + $pajak;
    // perubahan format tanggal
    $tanggal_rental_f     = $this->input->post('tgl_rental', true);
    $tanggal_kembali_f    = $this->input->post('tgl_kembali', true);


    $data = [
      "id_user"               => $this->session->userdata('id_user'),
      "id_mobil"              => $id_mobil,
      "tgl_rental"            => $tanggal_rental_f,
      "tgl_kembali"           => $tanggal_kembali_f,
      "alamat_penjemputan"    => $this->input->post('alamat_penjemputan', true),
      "waktu_penjemputan"     => $this->input->post('waktu_penjemputan', true),
      "total_harga"           => $total_harga,
      "pajak"                 => $pajak,
      "total_harga_supir"     => $total_harga_supir,
      "total_denda"           => 0,
      "total_refund"          => 0,
      "total_akhir"           => $total_akhir,
      "tgl_pengembalian"      => null,
      "status_pengembalian"   => "Belum diambil",
      "status_rental"         => "Belum Selesai",
      "tgl_cancel"            => null,
      "status_refund"         => "Belum Selesai",
      "total_refund"          => 0,
      "bukti_refund"          => null,
      "bukti_pembayaran"      => null,
      "status_pembayaran"     => 0,
      "confirm_by"            => null,
      "created"               => date('Y-m-d H:i:s'),
      "created_by"            => $this->session->userdata('id_user'),
    ];

    $status_booking = $this->cek_ketersediaan_rental($tanggal_rental_f, $tanggal_kembali_f, $id_mobil);

    if ($status_booking != "terbooking") {
      // input data ke tabel transaksi 
      $this->Transaksi_model->add_transaksi($data);
      if ($this->db->affected_rows() > 0) {
        // alert pemberitahuan berhasil melakukan penginputan 
        $id_mobil       = $this->input->post('id_mobil', true);
        $this->session->set_flashdata('success', '<b>Proses transaksi berhasil!</b> Silahkan melakukan pembayaran dan
                  unggah bukti pembayaran.');
        redirect('transaksi');
      }
      echo "<script>window.location='" . site_url('customer/addRental/' . $id_mobil) . "'</script>";
    }
  }


  // cek ketersediaan tanggal perentalan
  public function cek_ketersediaan_rental($tgl_rental, $tgl_kembali, $id_mobil)
  {
    $status = "tidak terbooking";

    $tgl_booking = array();
    while ($tgl_rental <= $tgl_kembali) {
      array_push($tgl_booking, $tgl_rental);
      $tgl_rental = date('Y/m/d', strtotime('+1 days', strtotime($tgl_rental)));
    }
    $tgl_terbooking = $this->Transaksi_model->get_transaksi_by_id_mobil_saja($id_mobil);

    foreach ($tgl_terbooking as $tt) {
      foreach ($tgl_booking as $key => $tb) {
        if ($tb == $tt['tgl_rental'] || $tb == $tt['tgl_kembali']) {
          $status = "terbooking";
          $this->session->set_flashdata('failed', 'Tanggal Sudah terbooking!');
          redirect('customer/addRental/' . $id_mobil);
        }
      }
    }

    return $status;
  }

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

  public function transaksiSelesai()
  {
    $id                 = $this->input->post('id_rental');
    $id_mobil           = $this->input->post('id_mobil');
    $tgl_pengembalian   = $this->input->post('tgl_pengembalian');
    $tgl_kembali        = $this->input->post('tgl_kembali');
    $denda              = $this->input->post('denda');

    $x                  = strtotime($tgl_pengembalian);
    $y                  = strtotime($tgl_kembali);
    $selisih            = abs($x - $y) / (60 * 60 * 24);
    $total_denda        = $selisih * $denda;

    $data = array(
      'tgl_pengembalian'    => $tgl_pengembalian,
      'status_rental'       => 'Selesai',
      'status_pengembalian' => 'Kembali',
      'total_denda'         => $total_denda
    );

    $data2 = array('status' => 1);
    $where  = array('id_rental' => $id);
    $where2 = array('id_mobil' => $id_mobil);

    $this->rental_model->update_data('transaksi', $data, $where);
    $this->rental_model->update_data('mobil', $data2, $where2);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
    Transaksi berhasil diupdate
    <button type="button" class="close" data-dismiss="alert" aria-label="close">
      <span aria-hidden="true">&times;</span>
    </button></div>');
    redirect('admin/transaksi');
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
