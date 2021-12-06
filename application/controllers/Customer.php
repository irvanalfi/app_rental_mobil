<?php
// programmer : M. Irvan Alfi Hidayat, Oktaviano andi suryadi, Sadewa Mukti Witjaksono
// terakhir update syntax : -

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
        check_not_login();
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
            $this->template->load('templateCustomer', 'customer/contact');
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

        $tanggal_hari_ini     = strtotime(date('Y/n/j'));

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
            "status_pengembalian"   => "Belum Diambil",
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

        if ($tanggal_hari_ini != $tanggal_rental) {
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
        } else {
            $this->session->set_flashdata('failed', 'Tidak bisa booking hari ini, pilih tanggal lainya!');
            redirect('customer/addRental/' . $id_mobil);
        }
    }

    // cek ketersediaan tanggal perentalan
    public function cek_ketersediaan_rental($tgl_rental, $tgl_kembali, $id_mobil)
    {
        $status = "tidak terbooking";

        $tgl_rental     = date('Y/m/d', strtotime($tgl_rental));
        $tgl_kembali    = date('Y/m/d', strtotime($tgl_kembali));

        echo $tgl_rental . '<br>';
        echo $tgl_kembali . '<br>';

        $tgl_booking = array();
        while ($tgl_rental <= $tgl_kembali) {
            array_push($tgl_booking, $tgl_rental);
            $tgl_rental = date('Y/m/d', strtotime('+1 days', strtotime($tgl_rental)));
        }


        $tgl_terbooking = $this->Transaksi_model->get_transaksi_by_id_mobil_saja($id_mobil);

        foreach ($tgl_terbooking as $tt) {
            $tgl_rental_terbooking = date('Y/m/d', strtotime($tt['tgl_rental']));
            $tgl_kembali_terbooking = date('Y/m/d', strtotime($tt['tgl_kembali']));
            foreach ($tgl_booking as $key => $tb) {
                if ($tb == $tgl_rental_terbooking || $tb == $tgl_kembali_terbooking) {
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
            $config['upload_path']    = './assets/upload/struk/';
            $config['allowed_types']  = 'jpg|jpeg|png|tiff|gif';
            $config['detect_mime']    = TRUE;
            $config['max_size']       = 5120;
            $config['file_name']      = 'Struk-' . date('dmy') . '-' . substr(md5(rand()), 0, 10);

            $this->upload->initialize($config);
            $upload = $this->upload->do_upload('bukti_pembayaran');
            $struk = $this->upload->data('file_name');
            if (!$upload) {
                $this->session->set_flashdata('failed', '<b>Proses upload bukti pembayarn gagal!</b> Silahkan upload kembali');
                redirect('transaksi');
            }
        }

        $data = [
            'bukti_pembayaran' => $struk
        ];

        $this->Transaksi_model->update_transaksi($data, $id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', '<b>Proses upload bukti pembayarn berhasil!</b> Silahkan mengunggu konfirmasi admin.');
            redirect('transaksi');
        }
    }

    // pembatalan transaksi 
    public function delete_transaksi($id_transaksi)
    {
        $this->Transaksi_model->delete_transaksi($id_transaksi);
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
        $data['review'] = $this->Review_model->get_review_by_id_transaksi($id_transaksi);

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
            $this->session->set_flashdata('success', '<b>Review terkirim!</b> Terimakasih atas review anda.');
            redirect('transaksi');
        } else {
            $this->session->set_flashdata('failed', '<b>Review gagal terkirim!</b> Silahkan lakukan review kembali.');
            redirect('transaksi/review/' . $id_transaksi);
        }
    }

    // print struk invoice 
    public function cetakStruk($id)
    {
        $data['transaksi'] = $this->Transaksi_model->get_transaksi_by_id($id);
        $this->load->view('customer/cetak_invoice', $data);
    }

    // pencarian mobil
    public function search()
    {
        $keyword = $this->input->get('keyword');
        $data['mobil'] = $this->Mobil_model->get_mobil_by_keyword($keyword);
        $data['keyword'] = $keyword;
        $this->template->load('templateCustomer', 'customer/search', $data);
    }

    public function profil()
    {
        check_not_login();
        $id_user        = $this->session->userdata('id_user');
        $data['user']   = $this->User_model->get_user_by_id($id_user);

        $username_old   = $this->input->post('username_old');
        $email_old      = $this->input->post('email_old');
        $no_ktp_old     = $this->input->post('no_ktp_old');

        $username_new   = $this->input->post('username');
        $email_new      = $this->input->post('email');
        $no_ktp_new     = $this->input->post('no_ktp');

        $username_is_unique = '|is_unique[user.username]';
        $email_is_unique    = '|is_unique[user.email]';
        $no_ktp_is_unique   = '|is_unique[user.no_ktp]';

        if ($username_old == $username_new) {
            $username_is_unique = '';
        }

        if ($email_old == $email_new) {
            $email_is_unique = '';
        }

        if ($no_ktp_old == $no_ktp_new) {
            $no_ktp_is_unique = '';
        }

        $this->form_validation->set_rules(
            'nama',
            'Nama',
            'required',
            array(
                'required'    => '<p class="text-danger">  * Kamu belum mengisi %s !</p>'
            )
        );

        $this->form_validation->set_rules(
            'username',
            'Username',
            'required|min_length[5]' . $username_is_unique,
            array(
                'required'    => '<p class="text-danger"> * Kamu belum mengisi %s !</p>',
                'is_unique'   => '<p class="text-danger">  * %s ini telah digunakan!</p>',
                'min_length'  => '<p class="text-danger">  * %s harus lebih dari 5 karakter!</p>'
            )
        );

        $this->form_validation->set_rules(
            'alamat',
            'Alamat',
            'required',
            array(
                'required'    => '<p class="text-danger"> * Kamu belum mengisi %s !</p>'
            )
        );

        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|valid_email' . $email_is_unique,
            array(
                'required'    => '<p class="text-danger"> * Kamu belum mengisi %s !</p>',
                'valid_email' => '<p class="text-danger"> * %s tidak sesuai !</p>',
                'is_unique'   => '<p class="text-danger">  * %s ini telah digunakan!</p>'
            )
        );

        $this->form_validation->set_rules(
            'no_telepon',
            'No. Telepon',
            'required',
            array(
                'required'    => '<p class="text-danger"> * Kamu belum mengisi %s !</p>'
            )
        );

        $this->form_validation->set_rules(
            'no_ktp',
            'No. KTP',
            'required' . $no_ktp_is_unique,
            array(
                'required'    => '<p class="text-danger"> * Kamu belum mengisi %s !</p>',
                'is_unique'   => '<p class="text-danger">  * %s ini telah digunakan!</p>'
            )
        );

        // pengecekan apakah passwor di perbarui atau tidak
        if ($this->input->post('password')) {
            $this->form_validation->set_rules(
                'password',
                'Password',
                'required|min_length[5]',
                array(
                    'required'    => '<p class="text-danger"> * Kamu belum mengisi %s !</p>',
                    'min_length'  => '<p class="text-danger">  * %s harus lebih dari 5 karakter!</p>'
                )
            );
            $this->form_validation->set_rules(
                'cpassword',
                'Konfirmasi Password',
                'required|matches[password]',
                array(
                    'required'    => '<p class="text-danger"> * Kamu belum mengisi %s !</p>',
                    'matches'     => '<p class="text-danger">  * %s tidak sama dengan password!</p>'
                )
            );
        }


        if ($this->form_validation->run() ==  FALSE) {
            $this->template->load('templateCustomer', 'customer/profile', $data);
        } else {
            $this->update_data_diri($id_user);
        }
    }

    public function update_data_diri($id_user)
    {
        $user = $this->User_model->get_user_by_id($id_user);

        if ($this->input->post('password') == NULL) {
            $password = $user['password'];
        } else {
            $password = md5($this->input->post('password'));
        }

        $data = [
            "nama"        => $this->input->post('nama'),
            "username"    => $this->input->post('username'),
            "alamat"      => $this->input->post('alamat'),
            "email"       => $this->input->post('email'),
            "password"    => $password,
            "no_telepon"  => $this->input->post('no_telepon'),
            "no_ktp"      => $this->input->post('no_ktp'),
            "gender"      => $this->input->post('gender'),
            "updated"     => date('Y-m-d H:i:s'),
            "updated_by"  => $id_user
        ];

        $this->User_model->update_user($data, $id_user);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', '<b>Data Berhasil Diubah!</b> Silahkan cek data Anda.');
            redirect('profil');
        } else {
            $this->session->set_flashdata('failed', '<b>Data Gagal Diubah</b> Silahkan lakukan lagi.');
            redirect('profil');
        }
    }

    public function update_foto()
    {
        $id_user        = $this->session->userdata('id_user');
        $foto_ktp_old   = $this->input->post('foto_ktp_old');
        $avatar_old     = $this->input->post('avatar_old');

        if (empty($_FILES['foto_ktp']['name'])) {
            $foto_ktp_new = $foto_ktp_old;
        } else {
            $foto_ktp_new = $this->ubah_foto_ktp($id_user);
        }

        if (empty($_FILES['avatar']['name'])) {
            $avatar_new = $avatar_old;
        } else {
            $avatar_new = $this->ubah_foto_avatar($id_user);
        }

        $data = [
            "foto_ktp"      => $foto_ktp_new,
            "avatar"        => $avatar_new,
            "updated"       => date('Y-m-d H:i:s'),
            "created_by"    => $this->session->userdata('id_user')
        ];

        $this->User_model->update_user($data, $id_user);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', '<b>Foto Berhasil Diubah!</b> Silahkan cek data Anda.');
            redirect('profil');
        } else {
            $this->session->set_flashdata('failed', '<b>Foto Gagal Diubah</b> Silahkan lakukan lagi.');
            redirect('profil');
        }
    }

    private function ubah_foto_ktp($id)
    {
        $user = $this->User_model->get_user_by_id($id);
        $config['upload_path']    = './assets/upload/user/ktp/';
        $config['allowed_types']  = 'jpg|jpeg|png';
        $config['detect_mime']    = TRUE;
        $config['max_size']       = 5120;
        $config['file_name']      = 'ktp-' . date('dmy') . '-' . substr(md5(rand()), 0, 10);

        $this->upload->initialize($config);
        $uploadKTP    = $this->upload->do_upload('foto_ktp');
        $namaKTP      = $this->upload->data('file_name');

        if ($uploadKTP) {
            unlink('./assets/upload/user/ktp/' . $user['foto_ktp']);
            return $namaKTP;
        } elseif (!$uploadKTP) {
            $this->session->set_flashdata('failed', "<b>Eror !</b> Gagal upload foto KTP, silahkan pilih gambar yang lain.");
            redirect('profil');
        }
    }

    private function ubah_foto_avatar($id)
    {
        $user = $this->User_model->get_user_by_id($id);
        $config['upload_path']    = './assets/upload/user/avatar/';
        $config['allowed_types']  = 'jpg|jpeg|png';
        $config['detect_mime']    = TRUE;
        $config['max_size']       = 5120;
        $config['file_name']      = 'avatar-' . date('dmy') . '-' . substr(md5(rand()), 0, 10);

        $this->upload->initialize($config);
        $uploadAvatar = $this->upload->do_upload('avatar');
        $namaAvatar   = $this->upload->data('file_name');
        if (!$uploadAvatar) {
            $this->session->set_flashdata('failed', "<b>Eror !</b> Gagal upload foto avatar, silahkan pilih gambar yang lain.");
            redirect('profil');
        } elseif ($uploadAvatar) {
            unlink('./assets/upload/user/avatar/' . $user['avatar']);
            return $namaAvatar;
        }
    }
}
