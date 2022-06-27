<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tentang extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        // mengecek login
        if($this->session->userdata('status') != "login"){
            redirect(base_url().'welcome?pesan=belumlogin');
        }
    }
    function tentang(){
        $data['title'] = "Tentang | Madrasah Diniyah Raport";
        $this->load->view('admin/header',$data);
        $this->load->view('admin/tentang');
        $this->load->view('admin/footer');
    }
}