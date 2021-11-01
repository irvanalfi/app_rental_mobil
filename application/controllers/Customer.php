<?php

class Customer extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('Mobil_model');
        $this->load->model('User_model');
    }


    public function beranda()
    {
        $data['mobil'] = $this->Mobil_model->get_all_mobil();
        $this->template->load('templateCustomer', 'customer/beranda', $data);
    }

    public function mobil()
    {
        $data['mobil'] = $this->Mobil_model->get_all_mobil();
        $this->template->load('templateCustomer', 'customer/mobil', $data);
    }

    public function detailMobil($id)
    {
        $data['mobil']    = $this->Mobil_model->get_all_mobil();
        $data['detail']   = $this->Mobil_model->get_mobil_by_id($id);
        $this->template->load('templateCustomer', 'customer/detailmobil', $data);
    }

    public function contact()
    {
        $this->template->load('templateCustomer', 'customer/contact');
    }

    public function addRental($id)
    {
        check_not_login();
        $id_user          = $this->session->userdata('id_user');
        $data['detail']   = $this->Mobil_model->get_mobil_by_id($id);
        $data['user']     = $this->User_model->get_user_by_id($id_user);
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
