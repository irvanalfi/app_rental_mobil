<?php
function check_already_login()
{
    $CI = &get_instance();
    $user_session = $CI->session->userdata('id_user');
    if ($user_session) {
        redirect('beranda');
    }
}

function check_not_login()
{
    $CI = &get_instance();
    $user_session = $CI->session->userdata('id_user');
    if (!$user_session) {
        redirect('auth/login');
    }
}

function check_admin()
{
    $CI = &get_instance();
    // $CI->load->library('fungsi');
    if ($CI->session->userdata('role') != 1) {
        redirect('beranda');
    }
}

function indo_currency($nominal)
{
    $result = "Rp." . number_format($nominal, 0, ',', '.');
    return $result;
}

function indo_date($date)
{
    $d = substr($date, 8, 2);
    $m = substr($date, 5, 2);
    $y = substr($date, 0, 4);
    return $d . '/' . $m . '/' . $y;
}
