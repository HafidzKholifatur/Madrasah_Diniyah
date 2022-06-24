<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mapel extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        // mengecek login
        if($this->session->userdata('status') != "login"){
            redirect(base_url().'welcome?pesan=belumlogin');
        }
    }

    function tabel_mapel(){
        $data['title'] = "Tabel Mata Pelajaran | Madrasah Diniyah Raport";
        $data['mapel'] = $this->m_madrasah->get_data('mapel')->result();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/table/table-mapel',$data);
        $this->load->view('admin/footer');
    }

    function tambah_mapel(){
        $data['title'] = "Tambah Mata Pelajaran | Madrasah Diniyah Raport";
        $this->load->view('admin/header', $data);
        $this->load->view('admin/form/form-tambah-mapel');
        $this->load->view('admin/footer');
    }

    function aksi_tambah_mapel(){
        $mapel = $this->input->post('mapel');
        $this->form_validation->set_rules('mapel', 'Mata Pelajaran', 'required');

        if($this->form_validation->run() != false){
            $data = array(
                'mapel_nama' => $mapel  
            );
            $this->m_madrasah->insert_data($data, 'mapel');
            redirect(base_url().'mapel/tabel_mapel');
        }else{
            $this->load->view('admin/header');
            $this->load->view('admin/form/form-tambah-mapel');
            $this->load->view('admin/footer');
        }
    }

    function mapel_edit($id){
        $where = array(
            'mapel_id' => $id
        );
        $data['title'] = "Edit Mata Pelajaran | Madrasah Diniyah Raport";
        $data['mapel'] = $this->m_madrasah->edit_data($where, 'mapel')->result();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/form/form-edit-mapel', $data);
        $this->load->view('admin/footer');
    }

    function aksi_edit_mapel(){
        $id = $this->input->post('id');
        $mapel = $this->input->post('mapel');
        $this->form_validation->set_rules('mapel', 'Mata Pelajaran', 'required');
        if($this->form_validation->run() != false){
            $where = array(
                'mapel_id' => $id
            ); 
            $data = array(
                'mapel_nama' => $mapel
            );
            $this->m_madrasah->update_data($where, $data, 'mapel');
            redirect(base_url().'mapel/tabel_mapel');
        }else{
            $where = array(
                'mapel_id' => $id
            );
            $data['mapel'] = $this->m_madrasah->edit_data($where, 'mapel')->result();
            $this->load->view('admin/header');
            $this->load->view('admin/form/form-edit-mapel', $data);
            $this->load->view('admin/footer');
        }
    }

    function mapel_hapus($id){
        $where = array(
            'mapel_id' => $id
        );
        $this->m_madrasah->delete_data($where, 'mapel');
        redirect(base_url().'mapel/tabel_mapel'); 

        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('Data berhasil dihapus');</script>";
        }
        echo "<script>window.location='" . site_url('mapel') . "';</script>";
    }

    function cetak_data_mapel(){
        $data['mapel'] = $this->m_madrasah->tampil_data_mapel("mapel")->result();
        $this->load->view('admin/cetak_data/cetak-data-mapel', $data);
    }
}