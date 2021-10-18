<?php

class Customer extends CI_Controller
{

    public function beranda()
    {
        $data['mobil'] = $this->rental_model->get_data('mobil')->result();
        $this->template->load('templateCustomer', 'customer/beranda', $data);
    }

    public function mobil()
    {
        $data['mobil'] = $this->rental_model->get_data('mobil')->result();
        $this->template->load('templateCustomer', 'customer/mobil', $data);
    }

    public function detailMobil($id)
    {
        $data['mobil']    = $this->rental_model->get_data('mobil')->result();
        $data['detail']   = $this->rental_model->ambil_id_mobil($id);
        $this->template->load('templateCustomer', 'customer/detailmobil', $data);
    }

    public function contact()
    {
        $this->template->load('templateCustomer', 'customer/contact');
    }

    public function addRental($id)
    {
        check_not_login();
        $id_customer        = $this->session->userdata('id_customer');
        $data['detail']     = $this->rental_model->ambil_id_mobil($id);
        $data['customer']   = $this->db->query("SELECT * FROM customer WHERE id_customer = '$id_customer'")->result();
        // var_dump(json_encode($data));
        // die();
        $this->template->load('templateCustomer', 'customer/addrental', $data);
    }

    public function prosesRental()
    {
        $id_customer    = $this->session->userdata('id_customer');
        $id_mobil       = $this->input->post('id_mobil');
        $tgl_rental     = $this->input->post('tgl_rental');
        $tgl_kembali    = $this->input->post('tgl_kembali');
        $denda          = $this->input->post('denda');
        $harga          = $this->input->post('harga');

        $data = array(
            'id_customer'          => $id_customer,
            'id_mobil'             => $id_mobil,
            'tgl_rental'           => $tgl_rental,
            'tgl_kembali'          => $tgl_kembali,
            'denda'                => $denda,
            'harga'                => $harga,
            'tgl_pengembalian'     => '-',
            'status_rental'        => 'Belum Selesai',
            'status_pengembalian'  => 'Belum Kembali',
            'total_denda'          => '0'
        );

        $this->rental_model->insert_data($data, 'transaksi');

        $status = array('status' => '0');
        $id = array('id_mobil' => $id_mobil);
        $this->rental_model->update_data('mobil', $status, $id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
          Transaksi berhasil, silahkan checkout!
          <button type="button" class="close" data-dismiss="alert" aria-label="close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
        redirect('customer/data_mobil');
    }
}
