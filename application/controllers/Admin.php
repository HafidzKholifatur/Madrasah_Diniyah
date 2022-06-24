<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        // mengecek login
        if($this->session->userdata('status') != "login"){
            redirect(base_url().'welcome?pesan=belumlogin');
        }
    }

    function index(){ 
        $data['title'] = "Dashboard | Madrasah Diniyah Raport";
        $data['santri'] = $this->m_madrasah->get_data('santri')->result();
        $data['hitung_santri'] = $this->db->count_all_results('santri');
        $data['hitung_mapel'] = $this->db->count_all_results('mapel');
        $data['hitung_pengajar'] = $this->db->count_all_results('pengajar');
        // $data['transaksi'] = $this->db->query("SELECT * FROM transaksi ORDER BY transaksi_id DESC LIMIT 10")->result();
        // $data['kostumer'] = $this->db->query("SELECT * FROM kostumer ORDER BY kostumer_id DESC LIMIT 10")->result();
        // $data['mobil'] = $this->db->query("SELECT * FROM mobil ORDER BY mobil_id DESC LIMIT 10")->result();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('admin/footer');
    }

    function tabel_santri(){
        // $data['santri'] = $this->m_madrasah->get_data('santri')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/table/table-santri');
        $this->load->view('admin/footer');
    }

    function tambah_santri(){
        $this->load->view('admin/header');
        $this->load->view('admin/form/form-tambah-santri');
        $this->load->view('admin/footer');
    }

    function tentang(){
        // $data['santri'] = $this->m_madrasah->get_data('santri')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/tentang');
        $this->load->view('admin/footer');
    }

    function logout(){
        $this->session->sess_destroy();
        redirect(base_url().'welcome?pesan=logout');
    }
}