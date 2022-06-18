<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajar extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        // mengecek login
        if($this->session->userdata('status') != "login"){
            redirect(base_url().'welcome?pesan=belumlogin');
        }
    }

    function table_pengajar(){
        $data['title'] = "Table Pengajar | Madrasah Diniyah Raport";
        $data['pengajar'] = $this->m_madrasah->get_data('pengajar')->result();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/table/table-pengajar', $data);
        $this->load->view('admin/footer');
    }

    function tambah_pengajar(){
        $data['title'] = "Tambah Pengajar | Madrasah Diniyah Raport";
        $this->load->view('admin/header', $data);
        $this->load->view('admin/form/form-tambah-pengajar');
        $this->load->view('admin/footer');
    }

    function aksi_tambah_pengajar(){
        $nama = $this->input->post('nama');
        $jk = $this->input->post('jk');
        $this->form_validation->set_rules('nama', 'Nama Pengajar', 'required');

        if($this->form_validation->run() != false){
            $data = array(
                'pengajar_nama' => $nama,
                'pengajar_jk' => $jk
            );
            $this->m_madrasah->insert_data($data, 'pengajar');
            redirect(base_url().'pengajar/table_pengajar');
        }else{
            $this->load->view('admin/header');
            $this->load->view('admin/form/form-tambah-pengajar');
            $this->load->view('admin/footer');
        }
    }

    function pengajar_edit($id){
        $where = array(
            'pengajar_id' => $id
        );
        $data['title'] = "Edit Pengajar | Madrasah Diniyah Raport";
        $data['pengajar'] = $this->m_madrasah->edit_data($where,'pengajar')->result();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/form/form-edit-pengajar', $data);
        $this->load->view('admin/footer');
    }

    function aksi_edit_pengajar(){
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $jk = $this->input->post('jk');
        $this->form_validation->set_rules('nama', 'Nama Pengajar', 'required');

        if($this->form_validation->run() != false){
            $where = array(
                'pengajar_id' => $id
            );
            $data = array(
                'pengajar_nama' => $nama,
                'pengajar_jk' => $jk
            );
            $this->m_madrasah->update_data($where, $data, 'pengajar');
            redirect(base_url().'pengajar/table_pengajar');
        }else{
            $where = array(
                'pengajar_id' => $id
            );
            $data['pengajar'] = $this->m_madrasah->edit_data($where, 'pengajar')->result();
            $this->load->view('admin/header');
            $this->load->view('admin/form/form-edit-pengajar', $data);
            $this->load->view('admin/footer');
        }
    }

    function pengajar_hapus($id){
        $where = array(
            'pengajar_id' => $id
        );
        $this->m_madrasah->delete_data($where, 'pengajar');
        redirect(base_url().'pengajar/table_pengajar'); 
    }

    function logout(){
        $this->session->sess_destroy();
        redirect(base_url().'welcome?pesan=logout');
    }
}