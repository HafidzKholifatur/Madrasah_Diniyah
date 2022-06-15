<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Santri extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        // mengecek login
        // if($this->session->userdata('status') != "login"){
        //     redirect(base_url().'welcome?pesan=belumlogin');
        // }
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

    function mobil_add_act(){
        $merk = $this->input->post('merk');
        $plat = $this->input->post('plat');
        $warna = $this->input->post('warna');
        $tahun = $this->input->post('tahun');
        $status = $this->input->post('status');
        $this->form_validation->set_rules('merk', 'Merk Mobil', 'required');
        $this->form_validation->set_rules('status', 'Status Mobil', 'required');

        if($this->form_validation->run() != false){
            $data = array(
                'mobil_merk' => $merk,
                'mobil_plat' => $plat,
                'mobil_warna' => $warna,
                'mobil_tahun' => $tahun,
                'mobil_status' => $status
            );
            $this->m_rental->insert_data($data, 'mobil');
            redirect(base_url().'admin/mobil');
        }else{
            $this->load->view('admin/header');
            $this->load->view('admin/mobil_add');
            $this->load->view('admin/footer');
        }
    }

    function mobil_edit($id){
        $where = array(
            'mobil_id' => $id
        );
        $data['mobil'] = $this->m_rental->edit_data($where,'mobil')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/mobil_edit', $data);
        $this->load->view('admin/footer');
    }

    function mobil_update(){
        $id = $this->input->post('id');
        $merk = $this->input->post('merk');
        $plat = $this->input->post('plat');
        $warna = $this->input->post('warna');
        $tahun = $this->input->post('tahun');
        $status = $this->input->post('status');
        $this->form_validation->set_rules('merk', 'Merk Mobil', 'required');
        $this->form_validation->set_rules('status', 'Status Mobil', 'required');

        if($this->form_validation->run() != false){
            $where = array(
                'mobil_id' => $id
            );
            $data = array(
                'mobil_merk' => $merk,
                'mobil_plat' => $plat,
                'mobil_warna' => $warna,
                'mobil_tahun' => $tahun,
                'mobil_status' => $status
            );
            $this->m_rental->update_data($where, $data, 'mobil');
            redirect(base_url().'admin/mobil');
        }else{
            $where = array(
                'mobil_id' => $id
            );
            $data['mobil'] = $this->m_rental->edit_data($where, 'mobil')->result();
            $this->load->view('admin/header');
            $this->load->view('admin/mobil_edit', $data);
            $this->load->view('admin/footer');
        }
    }

    function mobil_hapus($id){
        $where = array(
            'mobil_id' => $id
        );
        $this->m_rental->delete_data($where, 'mobil');
        redirect(base_url().'admin/mobil'); 
    }

    function logout(){
        $this->session->sess_destroy();
        redirect(base_url().'welcome?pesan=logout');
    }
}