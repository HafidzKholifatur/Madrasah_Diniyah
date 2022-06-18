<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        // mengecek login
        if($this->session->userdata('status') != "login"){
            redirect(base_url().'welcome?pesan=belumlogin');
        }
    }

    function tabel_nilai(){
        $data['title'] = "Table Nilai | Madrasah Diniyah Raport";
        $data['mapel'] = $this->m_madrasah->get_data('mapel')->result();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/table/table-nilai');
        $this->load->view('admin/footer');
    }

    function tambah_nilai(){
        $data['title'] = "Tambah Nilai | Madrasah Diniyah Raport";
        $data['santri'] = $this->m_madrasah->get_data('santri')->result();
        $data['mapel'] = $this->m_madrasah->get_data('mapel')->result();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/form/form-tambah-nilai', $data);
        $this->load->view('admin/footer');
    }

    function aksi_tambah_nilai(){
        $santri = $this->input->post('santri_id');
        $mapel_id = $this->input->post('mapel_id[]');
        $nilai = $this->input->post('nilai[]');

        var_dump($mapel_id);
        echo "<br>";
        var_dump($nilai);
        echo "<br>";

        // foreach($mapel_id as $map){
        //     $map;
        // }
        // foreach($nilai as $nil){
        //     $nil;
        // }

        // CARI CARA GIMANA $DATA MASUKIN SEMUA DATA, BUKAN CUMA 1

        // var_dump($nilai);
        $data = array(
            'santri_id' => $santri,
            'mapel_id' => $mapel_id,
            'nilai' => $nilai
        );

        foreach($data as $dat){
            var_dump($dat);
            $this->m_madrasah->insert_data($dat, 'penilaian');
        }
        // $this->m_madrasah->insert_data($dat, 'penilaian');
        // redirect(base_url().'nilai/tabel_nilai');

        // 
        // if(){
        //     $data = array(
        //         'santri_id' => $santri,
        //         'mapel_id' => $mapel_id,
        //         'nilai' => $nilai
        //     );
        //     $this->m_madrasah->insert_data($data, 'nilai');
        //     redirect(base_url().'nilai/tabel_nilai');
        // }else{

        //     redirect(base_url().'nilai/tambah_nilai');
        //     $this->load->view('admin/header');
        //     $this->load->view('admin/form/form-tambah-nilai');
        //     $this->load->view('admin/footer');
        // }
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