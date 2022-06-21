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
        $tgl_lahir = $this->input->post('tgl_lahir_pengajar');
        $telp = $this->input->post('telp');
        $alamat = $this->input->post('alamat_pengajar');
        $this->form_validation->set_rules('nama', 'Nama Pengajar', 'required');
        $this->form_validation->set_rules('tgl_lahir_pengajar', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('telp', 'Nomor Telepon', 'required');
        $this->form_validation->set_rules('alamat_pengajar', 'Alamat', 'required');

        if($this->form_validation->run() != false){
            $data = array(
                'pengajar_nama' => $nama,
                'pengajar_jk' => $jk,
                'pengajar_lahir' => $tgl_lahir,
                'pengajar_telp' => $telp,
                'pengajar_alamat' => $alamat
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
        $tgl_lahir_pengajar = $this->input->post('tgl_lahir_pengajar');
        $alamat_pengajar = $this->input->post('alamat_pengajar');
        $this->form_validation->set_rules('nama', 'Nama Pengajar', 'required');
        $this->form_validation->set_rules('tgl_lahir_pengajar', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('alamat_pengajar', 'Alamat ', 'required');


        if($this->form_validation->run() != false){
            $where = array(
                'pengajar_id' => $id
            );
            $data = array(
                'pengajar_nama' => $nama,
                'pengajar_jk' => $jk,
                'pengajar_lahir' => $tgl_lahir_pengajar,
                'pengajar_alamat' => $alamat_pengajar
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

    function cetak_data_pengajar(){
        $data['pengajar'] = $this->m_madrasah->tampil_data_pengajar("pengajar")->result();
        $this->load->view('admin/cetak_data/cetak-data-pengajar', $data);
    }
}