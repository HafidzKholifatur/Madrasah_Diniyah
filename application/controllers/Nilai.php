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
        $data['penilaian'] = $this->db->query("SELECT penilaian.*, santri.santri_nama, mapel.mapel_nama FROM ((penilaian INNER JOIN santri ON penilaian.id_santri = santri.santri_id) INNER JOIN mapel ON penilaian.id_mapel = mapel.mapel_id);")->result();
        // $data['mapel'] = $this->m_madrasah->get_data('mapel')->result();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/table/table-nilai', $data);
        $this->load->view('admin/footer');
    }

    // function tambah_nilai(){
    //     $data['title'] = "Tambah Nilai | Madrasah Diniyah Raport";
    //     $data['santri'] = $this->m_madrasah->get_data('santri')->result();
    //     $data['mapel'] = $this->m_madrasah->get_data('mapel')->result();
    //     $this->load->view('admin/header', $data);
    //     $this->load->view('admin/form/form-tambah-nilai', $data);
    //     $this->load->view('admin/footer');
    // }

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
        $mapel_id = $this->input->post('mapel_id');
        $nilai = $this->input->post('nilai');
        $this->form_validation->set_rules('nilai', 'Nilai', 'required');

        if($this->form_validation->run() != false){
            $data = array(
                'id_santri' => $santri,
                'id_mapel' => $mapel_id,
                'nilai' => $nilai
            );
            $this->m_madrasah->insert_data($data, 'penilaian');
            redirect(base_url().'nilai/tabel_nilai');
        }else{
            $this->load->view('admin/header');
            $this->load->view('admin/form/form-tambah-nilai2');
            $this->load->view('admin/footer');
        }
        

        var_dump($data);
    }

    // function aksi_tambah_nilai(){
    //     $santri = $this->input->post('santri_id');
    //     $mapel_id = $this->input->post('mapel_id');
    //     $nilai = $this->input->post('nilai');

        
    //     var_dump($nilai);

    //     var_dump($mapel_id);
    //     echo "<br>";
    //     var_dump($nilai);
    //     echo "<br>";

    //     foreach($mapel_id as $map){
    //         $map;
    //     }
    //     foreach($nilai as $nil){
    //         $nil;
    //     }

        
    //     ========================================================

    //     CARI CARA GIMANA $DATA MASUKIN SEMUA DATA, BUKAN CUMA 1

    //     var_dump($nilai);
    //     $data = array(
    //         'santri_id' => $santri,
    //         'mapel_id' => $mapel_id,
    //         'nilai' => $nilai
    //     );

    //     foreach($data as $dat){
    //         var_dump($dat);
    //         $this->m_madrasah->insert_data($dat, 'penilaian');
    //     }

    //     ========================================================

    //     $this->m_madrasah->insert_data($dat, 'penilaian');
    //     redirect(base_url().'nilai/tabel_nilai');

        
    //     if(){
    //         $data = array(
    //             'santri_id' => $santri,
    //             'mapel_id' => $mapel_id,
    //             'nilai' => $nilai
    //         );
    //         $this->m_madrasah->insert_data($data, 'nilai');
    //         redirect(base_url().'nilai/tabel_nilai');
    //     }else{

    //         redirect(base_url().'nilai/tambah_nilai');
    //         $this->load->view('admin/header');
    //         $this->load->view('admin/form/form-tambah-nilai');
    //         $this->load->view('admin/footer');
    //     }
    // }

    // function mobil_hapus($id){
    //     $where = array(
    //         'mobil_id' => $id
    //     );
    //     $this->m_rental->delete_data($where, 'mobil');
    //     redirect(base_url().'admin/mobil'); 
    // }

    function logout(){
        $this->session->sess_destroy();
        redirect(base_url().'welcome?pesan=logout');
    }
}