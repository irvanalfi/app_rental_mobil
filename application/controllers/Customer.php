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
    }
    // tampilan halaman beranda 
    public function beranda()
    {
        $data['mobil'] = $this->Mobil_model->get_all_mobil();
        $data['jmlh_cutomer'] = $this->User_model->get_jumlah_customer();
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
        $this->template->load('templateCustomer', 'customer/detailmobil', $data);
    }
    // tampilan halaman kontak
    public function contact()
    {
        $this->template->load('templateCustomer', 'customer/contact');
    }
    // tampilan halaman form rental
    public function addRental($id)
    {
        check_not_login(); /*pengecekan staus login */
        $id_user          = $this->session->userdata('id_user');
        $data['detail']   = $this->Mobil_model->get_mobil_by_id($id);
        $data['user']     = $this->User_model->get_user_by_id($id_user);
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
        // mencari selisih dari tanggal rental dan tanggal kembali 
        $tanggal_rental       = strtotime($this->input->post('tgl_rental', true));
        $tanggal_kembali      = strtotime($this->input->post('tgl_kembali', true));
        // $tanggal_rental       = $this->input->post('tgl_rental', true);
        // $tanggal_kembali      = $this->input->post('tgl_kembali', true);

        $selisih              = abs($tanggal_rental - $tanggal_kembali) / (60 * 60 * 24) + 1;
        // melakukan perhitungan untuk total akhir
        $total_harga          = $selisih *  $harga;
        $total_harga_supir    = $hrg_supir * $selisih;
        $total_akhir          = $total_harga_supir + $total_harga;
        // perubahan format tanggal
        $tanggal_rental_f     = date_format(date_create_from_format('m/d/Y', $this->input->post('tgl_rental', true)), 'Y/m/d');
        $tanggal_kembali_f    = date_format(date_create_from_format('m/d/Y', $this->input->post('tgl_kembali', true)), 'Y/m/d');

        $data = [
            "id_user"               => $this->session->userdata('id_user'),
            "id_mobil"              => $this->input->post('id_mobil', true),
            "tgl_rental"            => $tanggal_rental_f,
            "tgl_kembali"           => $tanggal_kembali_f,
            "alamat_penjemputan"    => $this->input->post('alamat_penjemputan', true),
            "waktu_penjemputan"     => $this->input->post('waktu_penjemputan', true),
            "total_harga"           => $total_harga,
            "total_harga_supir"     => $total_harga_supir,
            "total_denda"           => 0,
            "total_akhir"           => $total_akhir,
            "tgl_pengembalian"      => null,
            "status_pengembalian"   => "Belum Kembali",
            "bukti_pembayaran"      => null,
            "status_pembayaran"     => 0,
            "confirm_by"            => null,
            "created"               => date('Y-m-d H:i:s'),
            "created_by"            => $this->session->userdata('nama'),
        ];
        // input data ke tabel transaksi 
        $this->Transaksi_model->add_transaksi($data);
        if ($this->db->affected_rows() > 0) {
            // pengubahan status mobil menjadi sudah di rental 
            $id_mobil       = $this->input->post('id_mobil', true);
            $this->Mobil_model->update_status_mobil($id_mobil);
            // alert pemberitahuan berhasil melakukan penginputan 
            $this->session->set_flashdata('success', 'Data has been successfully saved!!');
            redirect('transaksi');
        }
        echo "<script>window.location='" . site_url('customer/addRental/' . $id_mobil) . "'</script>";
    }

    // menampilkan halaman transaksi 
    public function halamanTransaksi()
    {
        check_not_login();
        $id_user = $this->session->userdata('id_user');
        $data['transaksi'] = $this->Transaksi_model->get_transaksi_by_id_user($id_user);
        $this->template->load('templateCustomer', 'customer/transaksi', $data);
    }
    // menampilkan halaman pembayaran 
    public function halamanPembayaran($id_mobil)
    {
        check_not_login();
        $id_user = $this->session->userdata('id_user');
        $data['bayar'] = $this->Transaksi_model->get_transaksi_by_id_mobil($id_user, $id_mobil);
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
    // print struk invoice 
    public function cetak_invoice($id)
    {
        $data['transaksi'] = $this->db->query("SELECT * FROM transaksi tr, mobil mb, customer cs WHERE tr.id_mobil=mb.id_mobil AND tr.id_customer=cs.id_customer AND tr.id_rental='$id'")->result();
        $this->load->view('customer/cetak_invoice', $data);
    }
    // pembatalan transaksi 
    public function deleteTransaksi($id)
    {
        $where = array('id_rental' => $id);

        $data = $this->rental_model->get_where($where, 'transaksi')->row();

        $where2 = array('id_mobil' => $data->id_mobil);
        $data2 = array('status' => '1');

        $this->rental_model->update_data('mobil', $data2, $where2);
        $this->rental_model->delete_data($where, 'transaksi');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Transaksi berhasil dibatalkan
            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button></div>');
        redirect('customer/transaksi');
    }
}
