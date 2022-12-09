<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth
{

    function __construct()
    {
        $CI = &get_instance();
        $CI->load->library('session');

        
        // $browser = $_SERVER['HTTP_USER_AGENT'];
        // $browser = strtolower($browser);
        // if (strpos($browser, 'chrome') == false) {
        //     print_r("<center><p style='margin-top:100px;'>Opps!, Aplikasi ini hanya didukung oleh browser <b>chrome</b>. <br/><br/>Silahkan gunakan browser <b>Chrome</b> untuk membuka halaman pada applikasi.</p></center>");
        //     die();
        // }else{
        //     print_r("ok");
        // }
    }

    function isLogin(){
        $CI = &get_instance();
        if ($CI->session->userdata("logged") == null || !$CI->session->userdata('logged')) {
            redirect('login');
            die();
        }else{
            $st = $CI->encryption->decrypt($CI->session->userdata('ua'));
            if ($st != "admin" && $st != "administrator"){
                redirect('login');
                die();
            }
        }
    }

    function isadministrator()
    {
        $this->isLogin();

        $CI = &get_instance();
        if ($CI->encryption->decrypt($CI->session->userdata('ua')) != "administrator") {
            redirect('login');
            die();
        }
    }
    function isadmin()
    {
        $this->isLogin();
        $CI = &get_instance();
        if ($CI->encryption->decrypt($CI->session->userdata('ua')) != "admin") {
            redirect('login');
            die();
        }
    }
    
    function goToPage(){
        $CI = &get_instance();
        if( $CI->session->userdata("logged") == null || !$CI->session->userdata('logged') ){
            
        }else{
            if($CI->encryption->decrypt($CI->session->userdata('ua')) == 'administrator'){
                redirect("data/user");
            }else if($CI->encryption->decrypt($CI->session->userdata('ua')) == 'admin'){
                redirect("data/hospital");
            }else{
                $CI->session->sess_destroy();
                redirect("login");
            }
        }
    }

    
}
