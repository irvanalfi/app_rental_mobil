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
        $data['detail'] = $this->rental_model->ambil_id_mobil($id);
        $this->template->load('templateCustomer', 'customer/beranda');
    }
}
