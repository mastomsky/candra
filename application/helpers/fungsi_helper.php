<?php

function check_already_login()
{
    $ci = &get_instance();
    $user_session = $ci->session->userdata('user_id');
    if ($user_session) {
        redirect('panel/dashboard');
    }
}


function check_not_login()
{
    $ci = &get_instance();
    $user_session = $ci->session->userdata('user_id');
    if (!$user_session) {
        redirect('panel/admin');
    }
}

function check_admin()
{
    $ci = &get_instance();
    $ci->load->library('fungsi');
    if ($ci->fungsi->user_login()->jabatan != 1) {
        redirect('panel/dashboard');
    }
}

function indo_currency($nominal)
{
    $result = "IDR. " . number_format($nominal, 0, '.', '.');
    return $result;
}

function indo_date($date)
{
    $d = substr($date, 8, 2);
    $m = substr($date, 5, 2);
    $y = substr($date, 0, 4);
    return $d . '-' . $m . '-' . $y;
}
// CSRF
if (!function_exists('get_csrf_token')) {
    function get_csrf_token()
    {
        $ci = &get_instance();
        if (!$ci->session->csrf_token) {
            $ci->session->csrf_token = hash('sha1', time());
        }
        return $ci->session->csrf_token;
    }
}
if (!function_exists('get_csrf_name')) {
    function get_csrf_name()
    {
        return "token";
    }
}
if (!function_exists('cek_csrf')) {
    function cek_csrf()
    {
        $ci = &get_instance();
        if ($ci->input->post('token') != $ci->session->csrf_token or !$ci->input->post('token') or !$ci->session->csrf_token) {
            $ci->session->unset_userdata('csrf_token');
            $ci->output->set_status_header(403);
            show_error('Oops! Page not found.');
            return false;
        } else {
            return true;
        }
    }
}
function csrf()
{
    return "<input type='hidden' name='" . get_csrf_name() . "' value='" . get_csrf_token() . "'/>";
}
