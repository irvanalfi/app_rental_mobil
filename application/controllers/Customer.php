<?php
// berisi semua function yang berhubungan dengan tampilan customer
// programmer : M. Irvan Alfi Hidayat, Oktaviano andi suryadi, Sadewa Mukti Witjaksono
// terakhir update syntax : 2 November 2021

class Customer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // load semua model yang dibutuhkan
        $this->load->model('Tipe_model');
        $this->load->model('User_model');
        $this->load->model('Mobil_model');
        $this->load->model('Transaksi_model');
        $this->load->model('Review_model');
        $this->load->model('Contact_model');
    }

    // tampilan halaman beranda 
    public function beranda()
    {
        $data['mobil'] = $this->Mobil_model->get_all_mobil();
        $data['jmlh_cutomer'] = $this->User_model->get_jumlah_customer();
        $data['review'] = $this->Review_model->get_all_review_approved();
        $this->template->load('templateCustomer', 'customer/beranda', $data);
    }

    // tampilan halaman mobil 
    public function mobil()
    {
        $data['mobil'] = $this->Mobil_model->get_all_mobil();
        $this->template->load('templateCustomer', 'customer/mobil', $data);
    }

    // tampilan halaman detail mobil 
    public function detailMobil($id)
    {
        $data['mobil']    = $this->Mobil_model->get_all_mobil();
        $data['detail']   = $this->Mobil_model->get_mobil_by_id($id);
        $data['review']   = $this->Review_model->get_review_by_id_mobil($id);
        $data['jumlahReview'] = $this->Review_model->get_jumlah_review_approved_by_id_mobil($id);
        $this->template->load('templateCustomer', 'customer/detailmobil', $data);
    }

    // tampilan halaman kontak
    public function contact()
    {
        $id_user = $this->session->userdata('id_user');
        $data['user'] = $this->User_model->get_user_by_id($id_user);

        $this->form_validation->set_rules(
            'subject',
            'Subject',
            'required',
            array(
                'required' => '<p class="text-danger">  * Kamu belum mengisi %s !</p>'
            )
        );

        $this->form_validation->set_rules(
            'pesan',
            'Pesan',
            'required',
            array(
                'required' => '<p class="text-danger"> * Kamu belum mengisi %s !</p>'
            )
        );


        if ($this->form_validation->run() ==  FALSE) {
            $this->template->load('templateCustomer', 'customer/contact', $data);
        } else {
            $this->addContact();
        }
    }

    //proses input data contact ke database
    public function addContact()
    {
        $id_user = $this->session->userdata('id_user');
        $data = [
            "id_user"       => $id_user,
            "subject"       => $this->input->post('subject', true),
            "pesan"         => $this->input->post('pesan', true),
            "status"        => 0,
            "created"       => date('Y-m-d H:i:s'),
            "created_by"    => $this->session->userdata('id_user'),
        ];

        $this->Contact_model->add_contact($data);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', '<b>Pesan berhasil terkirim!</b> Admin akan segera menghubungi Anda.');
            redirect('customer/contact');
        } else {
            $this->session->set_flashdata('failed', '<b>Pesan gagal terkirim!</b> Silahkan mengirim pesan kembali.');
            redirect('customer/contact');
        }
    }

    // tampilan halaman form rental
    public function addRental($id)
    {
        check_not_login(); /*pengecekan staus login */
        $id_user          = $this->session->userdata('id_user');
        $data['detail']   = $this->Mobil_model->get_mobil_by_id($id);
        $data['user']     = $this->User_model->get_user_by_id($id_user);
        $data['transaksi'] = $this->Transaksi_model->get_transaksi_by_id_mobil_saja($id);
        $data['review']   = $this->Review_model->get_review_by_id_mobil($id);
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
        // melakukan perhitungan untuk total akhir
        $total_harga          = $selisih *  $harga;
        $total_harga_supir    = $hrg_supir * $selisih;
        $total_akhir          = $total_harga_supir + $total_harga;
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
            "total_harga_supir"     => $total_harga_supir,
            "total_denda"           => 0,
            "total_refund"          => 0,
            "total_akhir"           => $total_akhir,
            "tgl_pengembalian"      => null,
            "status_pengembalian"   => "Belum Kembali",
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

    // menampilkan halaman transaksi 
    public function halamanTransaksi()
    {
        check_not_login();
        $id_user = $this->session->userdata('id_user');
        $data['transaksi_terlambat'] = $this->Transaksi_model->get_transaksi_by_id_user($id_user);
        $data['review'] = $this->Review_model->get_all_review();

        // melakukan check apakah ada transaksi yang tidak terbayar.
        $this->transaksi_gagal_karena_tidak_terbayar($data['transaksi_terlambat'], $id_user);

        $data['transaksi'] = $this->Transaksi_model->get_transaksi_by_id_user($id_user);
        $this->template->load('templateCustomer', 'customer/transaksi', $data);
    }

    // menampilkan halaman pembayaran 
    public function halamanPembayaran($id_transaksi)
    {
        check_not_login();
        $id_user = $this->session->userdata('id_user');
        $data['bayar'] = $this->Transaksi_model->get_transaksi_by_id($id_transaksi);
        $this->template->load('templateCustomer', 'customer/pembayaran', $data);
    }

    // melakukan proses pembayaran ( mengupload bukti pembayaran )
    public function prosesPembayaran()
    {
        $id               = $this->input->post('id_transaksi');
        $bukti_pembayaran = $_FILES['bukti_pembayaran']['name'];

        if ($bukti_pembayaran = '') {
        } else {
            $config['upload_path']    = './assets/upload/struk';
            $config['allowed_types']  = 'jpg|jpeg|png|tiff|gif';
            $config['max_size']       = 5120;
            $config['file_name']      = 'Struk-' . date('dmy') . '-' . substr(md5(rand()), 0, 10);

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('bukti_pembayaran')) {
                echo "Bukti pembayaran mobil gagal diupload";
            } else {
                $struk = $this->upload->data('file_name');
            }
        }

        $this->Transaksi_model->update_bukti_pembayaran($struk, $id);

        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Bukti pembayaran anda berhasil diupload
            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button></div>');
        redirect('transaksi');
    }

    // pembatalan transaksi 
    public function delete_transaksi($id_transaksi)
    {
        $delete = $this->Transaksi_model->delete_transaksi($id_transaksi);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', '<b>Transaksi berhasil dihapus!</b> Terimakasih :)');
            redirect('transaksi');
        }
    }

    //hapus transaksi apabila melewati batas pembayaran
    public function countdown_selesai($id_transaksi)
    {

        $data = [
            "status_pengembalian"   => "Kembali",
            "status_rental"         => "Gagal",
            "updated"               => date('Y-m-d H:i:s'),
            "updated_by"            => $this->session->userdata('id_user'),
        ];

        $this->Transaksi_model->update_transaksi($data, $id_transaksi);
        if ($this->db->affected_rows() > 0) {
            redirect('transaksi/pembayaran/' . $id_transaksi);
        }
    }

    //update transaksi karena tidak terbayar hingga tanggal rental
    public function transaksi_gagal_karena_tidak_terbayar($transaksi)
    {
        // apabila ada transakasi yang tidak terbayar hingga hari ini, maka transaksi akan diupdate menjadi gagal.
        $tgl_hari_ini = date('Y/m/d');
        foreach ($transaksi as $t) {
            $tgl_rental = date('Y/m/d', strtotime($t['tgl_rental']));
            if ($t['status_rental'] != "Gagal" && $t['status_pembayaran'] == '0') {
                if ($tgl_hari_ini >= $tgl_rental) {
                    $data = [
                        "status_pengembalian"   => "Kembali",
                        "status_rental"         => "Gagal",
                        "updated"               => date('Y-m-d H:i:s'),
                        "updated_by"            => $this->session->userdata('id_user'),
                    ];

                    $this->Transaksi_model->update_transaksi($data, $t['id_transaksi']);

                    $this->session->set_flashdata('failed', '<b>Transaksi Gagal!</b> Transaksi rental mobil <b>'
                        . $t['merek'] . '(' . $t['no_plat'] . ')</b> dengan tanggal rental <b>' . $t['tgl_rental'] . ' - '
                        . $t['tgl_kembali'] . '</b> telah gagal karena Anda telat membayar biaya rental!');

                    // redirect('transaksi'); 
                }
            }
        }
    }

    //refund biaya ketika cancel kurang dari tanggal rental
    public function transaksi_full_refund($id_transaksi)
    {
        $transaksi = $this->Transaksi_model->get_transaksi_by_id($id_transaksi);

        $data = [
            "tgl_cancel"            => date('Y/m/d'),
            "status_rental"         => "Batal",
            "status_pengembalian"   => "Kembali",
            "total_refund"          => $transaksi['total_akhir'],
            "total_akhir"           => 0,
            "updated"               => date('Y-m-d H:i:s'),
            "updated_by"            => $this->session->userdata('id_user'),
        ];

        $this->Transaksi_model->update_transaksi($data, $id_transaksi);

        $this->session->set_flashdata('success', '<b>Transaksi berhasil dibatalkan!</b> Biaya refund akan segera diproses oleh admin. Silahkan cek pembayaran.');

        redirect('transaksi');
    }

    //update transaksi ketika pembatalan di hari h tanggal rental
    public function batal_hari_h($id_transaksi)
    {
        $transaksi = $this->Transaksi_model->get_transaksi_by_id($id_transaksi);

        $harga_mobil = $transaksi['harga'];
        $total_akhir = $transaksi['total_akhir'];

        $total_refund = $total_akhir - ($harga_mobil / 2);
        $total_akhir = $harga_mobil / 2;

        $data = [
            "tgl_cancel"            => date('Y/m/d'),
            "status_rental"         => "Batal",
            "total_refund"          => $total_refund,
            "total_akhir"           => $total_akhir,
            "updated"               => date('Y-m-d H:i:s'),
            "updated_by"            => $this->session->userdata('id_user'),
        ];

        $this->Transaksi_model->update_transaksi($data, $id_transaksi);

        $this->session->set_flashdata('success', '<b>Transaksi berhasil dibatalkan!</b> Biaya refund akan segera diproses oleh admin. Silahkan cek pembayaran.');

        redirect('transaksi');
    }


    // download bukti refund
    public function download_bukti_refund($id_transaksi)
    {
        $data = $this->Transaksi_model->get_transaksi_by_id($id_transaksi);
        $file = 'assets/upload/refund/' . $data['bukti_refund'];
        force_download($file, NULL);
    }

    // menampilkan halaman review 
    public function halamanReview($id_transaksi)
    {
        check_not_login();
        $data['transaksi'] = $this->Transaksi_model->get_transaksi_by_id($id_transaksi);

        $this->form_validation->set_rules(
            'review',
            'Review',
            'required',
            array(
                'required' => '<p class="text-danger"> Kamu belum mengisi %s !</p>'
            )
        );

        if ($this->form_validation->run() == FALSE) {
            $this->template->load('templateCustomer', 'customer/review', $data);
        } else {
            $this->addReview();
        }
    }

    // menginputkan review ke database
    public function addReview()
    {
        $id_transaksi =  $this->input->post('id_transaksi', true);

        $data = [
            "id_user"       => $this->session->userdata('id_user'),
            "id_mobil"      => $this->input->post('id_mobil', true),
            "id_transaksi"  => $id_transaksi,
            "review"        => $this->input->post('review', true),
            "star"          => $this->input->post('star', true),
            "status"        => 0,
            "created"       => date('Y-m-d H:i:s'),
            "created_by"    => $this->session->userdata('id_user')
        ];

        $this->Review_model->add_review($data);

        if ($this->db->affected_rows() > 0) {
            // alert pemberitahuan berhasil melakukan penginputan 
            $this->session->set_flashdata('success', '<b>Review terkirim!</b> Terimakasih atas review.');
            redirect('transaksi');
        } else {
            $this->session->set_flashdata('failed', '<b>Review gagal terkirim!</b> Silahkan lakukan review kembali.');
            redirect('transaksi/review/' . $id_transaksi);
        }
    }

    // print struk invoice 
    public function cetak_invoice($id)
    {
        $data['transaksi'] = $this->db->query("SELECT * FROM transaksi tr, mobil mb, customer cs WHERE tr.id_mobil=mb.id_mobil AND tr.id_customer=cs.id_customer AND tr.id_rental='$id'")->result();
        $this->load->view('customer/cetak_invoice', $data);
    }

}
