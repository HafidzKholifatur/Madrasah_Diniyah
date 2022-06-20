<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Santri extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        // mengecek login
        if($this->session->userdata('status') != "login"){
            redirect(base_url().'welcome?pesan=belumlogin');
        }
    }

    function tabel_santri(){
        $data['title'] = "Tabel Santri | Madrasah Diniyah Raport";
        $data['santri'] = $this->m_madrasah->get_data('santri')->result();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/table/table-santri',$data);
        $this->load->view('admin/footer');
    }

    function tambah_santri(){
        $data['title'] = "Tambah Santri | Madrasah Diniyah Raport";
        $this->load->view('admin/header', $data);
        $this->load->view('admin/form/form-tambah-santri');
        $this->load->view('admin/footer');
    }

    function aksi_tambah_santri(){
        $nama = $this->input->post('nama');
        $jk = $this->input->post('jk');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $alamat = $this->input->post('alamat');
        $this->form_validation->set_rules('nama', 'Nama Santri/Santriwati', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');


        if($this->form_validation->run() != false){
            $data = array(
                'santri_nama' => $nama,
                'santri_jk' => $jk,
                'santri_lahir' => $tgl_lahir,
                'santri_alamat' => $alamat
            );
            $this->m_madrasah->insert_data($data, 'santri');
            redirect(base_url().'santri/tabel_santri');
        }else{
            $this->load->view('admin/header');
            $this->load->view('admin/form/form-tambah-santri');
            $this->load->view('admin/footer');
        }
    }

    function santri_edit($id){
        $where = array(
            'santri_id' => $id
        );
        $data['title'] = "Edit Santri | Madrasah Diniyah Raport";
        $data['santri'] = $this->m_madrasah->edit_data($where,'santri')->result();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/form/form-edit-santri', $data);
        $this->load->view('admin/footer');
    }

    function aksi_edit_santri(){ 
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $jk = $this->input->post('jk');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $alamat = $this->input->post('alamat');
        $this->form_validation->set_rules('nama', 'Nama Santri', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat ', 'required');

        if($this->form_validation->run() != false){
            $where = array(
                'santri_id' => $id
            );
            $data = array(
                'santri_nama' => $nama,
                'santri_jk' => $jk,
                'santri_lahir' => $tgl_lahir,
                'santri_alamat' => $alamat
            );
            $this->m_madrasah->update_data($where, $data, 'santri');
            redirect(base_url().'santri/tabel_santri');
        }else{
            $where = array(
                'santri_id' => $id
            );
            $data['santri'] = $this->m_madrasah->edit_data($where, 'santri')->result();
            $this->load->view('admin/header');
            $this->load->view('admin/form/form-edit-santri', $data);
            $this->load->view('admin/footer');
        }
    }


    function santri_hapus($id){
        $where = array(
            'santri_id' => $id
        );
        $this->m_madrasah->delete_data($where, 'santri');
        redirect(base_url().'santri/tabel_santri'); 
    }

    function cetak_data_santri(){
        $data['santri'] = $this->m_madrasah->tampil_data("santri")->result();
        $this->load->view('admin/cetak_data/cetak-data-pengajar', $data);
    }
}