<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilai extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        // mengecek login
        if ($this->session->userdata('status') != "login") {
            redirect(base_url() . 'welcome?pesan=belumlogin');
        }
    }

<<<<<<< HEAD
    // Fungsi Untuk Menampilkan Isi Dari Table Penilaian Secara Keseluruhan
    function tabel_nilai($id){
=======
    function tabel_nilai()
    {
>>>>>>> 30a29fa0aa0369477f767b20176fc265fe8512b9
        $data['title'] = "Table Nilai | Madrasah Diniyah Raport";
        $kategori_id = array(
            'kategori_id' => $id
        );
        foreach($kategori_id as $kate){
            $data['kate'] = $kate;
        }
        
        foreach ($kategori_id as $kt_id) {
            $data['penilaian'] = $this->db->query("SELECT penilaian.*, santri.santri_nama, mapel.mapel_nama FROM ((penilaian INNER JOIN santri ON penilaian.id_santri = santri.santri_id) INNER JOIN mapel ON penilaian.id_mapel = mapel.mapel_id) WHERE id_kategori = '$kt_id';")->result();
        }
        $this->load->view('admin/header', $data);
        $this->load->view('admin/table/table-nilai', $data);
        $this->load->view('admin/footer');
    }
<<<<<<< HEAD
    
    // Fungsi Untuk Menampilkan Card Nilai Per-Kategori
    function card_nilai(){
=======

    // function tambah_nilai(){
    //     $data['title'] = "Tambah Nilai | Madrasah Diniyah Raport";
    //     $data['santri'] = $this->m_madrasah->get_data('santri')->result();
    //     $data['mapel'] = $this->m_madrasah->get_data('mapel')->result();
    //     $this->load->view('admin/header', $data);
    //     $this->load->view('admin/form/form-tambah-nilai', $data);
    //     $this->load->view('admin/footer');
    // }

    function card_nilai()
    {
>>>>>>> 30a29fa0aa0369477f767b20176fc265fe8512b9
        $data['title'] = "List Card Nilai | Madrasah Diniyah Raport";
        $data['kategori'] = $this->m_madrasah->get_data('kategori')->result();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/table/card-nilai', $data);
        $this->load->view('admin/footer');
    }

<<<<<<< HEAD
    // Fungsi Untuk Menghapus Card Kategori Nilai
    function hapus_card($id){
        $where = array(
            'id_kategori' => $id
        );

        $wh = array(
            'kategori_id' => $id
        );
        
        $this->m_madrasah->delete_data($where, 'penilaian');
        $this->m_madrasah->delete_data($wh, 'kategori');
        redirect(base_url().'nilai/card_nilai');
    }

    function table_per_card($kategori_id, $id){
        $data['title'] = "List Nilai | Madrasah Diniyah Raport";
        $where = array(
            'santri_id' => $id
        );

        $kategori_id = array(
            'kategori_id' => $kategori_id
        );

        foreach($where as $wh){
            $data['wh'] = $wh;
        }

        foreach($kategori_id as $kate){
            $data['kate'] = $kate;
        }

        foreach ($kategori_id as $kt_id) {
            $data['penilaian'] = $this->db->query("SELECT penilaian.*, santri.santri_nama, mapel.mapel_nama FROM ((penilaian INNER JOIN santri ON penilaian.id_santri = santri.santri_id) INNER JOIN mapel ON penilaian.id_mapel = mapel.mapel_id) WHERE id_kategori = '$kt_id' AND id_santri = '$wh';")->result();
        }
        $this->load->view('admin/header', $data);
        $this->load->view('admin/table/table-nilai-card', $data);
        $this->load->view('admin/footer');
    }

    // function hapus_list($id){
    //     $where = array(
    //         'kategori_id' => $id
    //     );

        
    //     if(confirm("") == true){

    //     }
    //     $this->m_madrasah->delete_data($where, 'kategori');
    //     redirect(base_url().'nilai/card_nilai'); 
    // }

    // Fungsi Untuk Menampilkan Form Tambah List Kategori Baru
    function tambah_list(){
=======
    function tambah_list()
    {
>>>>>>> 30a29fa0aa0369477f767b20176fc265fe8512b9
        $data['title'] = "Tambah List Nilai | Madrasah Diniyah Raport";
        $this->load->view('admin/header', $data);
        $this->load->view('admin/form/form-tambah-list');
        $this->load->view('admin/footer');
    }

<<<<<<< HEAD
    // Fungsi Untuk Aksi Menambah List Kategori Baru
    function aksi_tambah_list(){
        $nama = $this->input->post('nama');
        $tgl_buat = $this->input->post('tgl_buat');
        $this->form_validation->set_rules('nama', 'Nama Kategori', 'required');

        if($this->form_validation->run() != false){
            $data = array(
                'nama_kategori' => $nama,
                'tgl_dibuat' => $tgl_buat
            );
            $this->m_madrasah->insert_data($data, 'kategori');
            redirect(base_url().'nilai/card_nilai');
        }else{
            $this->load->view('admin/header');
            $this->load->view('admin/form/form-tambah-list');
            $this->load->view('admin/footer');
        }
    }

    // Fungsi Untuk Menampilkan Nilai Dalam Bentuk Card List Per-Kategori
    function list_santri($id){
        $data['title'] = "List Card Nilai | Madrasah Diniyah Raport";
        // $data['kategori'] = $this->m_madrasah->get_data('kategori')->result();

        $kategori_id = array(
            'kategori_id' => $id
        );
        foreach($kategori_id as $kate){
            $data['kate'] = $kate;
        }
        
        foreach ($kategori_id as $kt_id) {
            $data['penilaian'] = $this->db->query("SELECT penilaian.*, santri.santri_nama, mapel.mapel_nama FROM ((penilaian INNER JOIN santri ON penilaian.id_santri = santri.santri_id) INNER JOIN mapel ON penilaian.id_mapel = mapel.mapel_id) WHERE id_kategori = '$kt_id' GROUP BY santri_nama;")->result();
        }

        // foreach ($kategori_id as $kt_id) {
        //     $data['kategori'] = $this->db->query("SELECT * kategori WHERE kategori_id = '$kt_id'")->result;
        // }
        $this->load->view('admin/header', $data);
        $this->load->view('admin/table/card-santri', $data);
        $this->load->view('admin/footer');
    }

    function hapus_card_santri($kategori_id, $id){
        $where = array(
            'id_santri' => $id
        );
        
        $kategori_id = array(
            'kategori_id' => $kategori_id
        );
        
        foreach($kategori_id as $kate){
            $data['kate'] = $kate;
        }

        $this->m_madrasah->delete_data($where, 'penilaian');
        redirect(base_url().'nilai/list_santri/'.$kate);
    }

    // Fungsi Untuk Tampilan Tambah Data Nilai Berdasarkan kategori_id
    function tambah_nilai($id){
=======
    function tambah_nilai()
    {
>>>>>>> 30a29fa0aa0369477f767b20176fc265fe8512b9
        $data['title'] = "Tambah Nilai | Madrasah Diniyah Raport";
        $data['santri'] = $this->m_madrasah->get_data('santri')->result();
        $data['mapel'] = $this->m_madrasah->get_data('mapel')->result();
        
        $kategori_id = array(
            'kategori_id' => $id
        );

        foreach($kategori_id as $kate){
            $data['kate'] = $kate;
        }

        $this->load->view('admin/header', $data);
        $this->load->view('admin/form/form-tambah-nilai', $data);
        $this->load->view('admin/footer');
    }

<<<<<<< HEAD
    // Fungsi Untuk Aksi Tambah Data Nilai
    function aksi_tambah_nilai(){ 
        $kategori_id = $this->input->post('kategori_id');
=======
    function aksi_tambah_nilai()
    {
>>>>>>> 30a29fa0aa0369477f767b20176fc265fe8512b9
        $santri = $this->input->post('santri_id');
        $mapel_id = $this->input->post('mapel_id');
        $nilai = $this->input->post('nilai');
        $this->form_validation->set_rules('nilai', 'Nilai', 'required');
        // $this->form_validation->set_rules('kategori_id', 'Kategori Id', 'trim|required|is_unique[penilaian.id_kategori]');
        // $this->form_validation->set_rules('santri', 'Santri', 'trim|required|is_unique[penilaian.id_santri]');
        // $this->form_validation->set_rules('mapel', 'Mapel', 'trim|required|is_unique[penilaian.id_mapel]');

        if ($this->form_validation->run() != false) {
            $data = array(
                'id_kategori' => $kategori_id,
                'id_santri' => $santri,
                'id_mapel' => $mapel_id,
                'nilai' => $nilai
            );
            
            $this->m_madrasah->insert_data($data, 'penilaian');
<<<<<<< HEAD
            redirect(base_url().'nilai/tabel_nilai/'.$kategori_id);
        }else{
=======
            redirect(base_url() . 'nilai/tabel_nilai');
        } else {
>>>>>>> 30a29fa0aa0369477f767b20176fc265fe8512b9
            $this->load->view('admin/header');
            $this->load->view('admin/form/form-tambah-nilai/'.$kategori_id);
            $this->load->view('admin/footer');
        }
<<<<<<< HEAD
        
    }

    // Fungsi Untuk Tampilan Edit Data Nilai
    function nilai_edit($kategori_id, $id){ 
        $where = array(
            'penilaian_id' => $id
        );

        $kategori_id = array(
            'kategori_id' => $kategori_id
        );

        foreach($where as $wh){
            $data['wh'] = $wh;
        }

        foreach($kategori_id as $kate){
            $data['kate'] = $kate;
        }
        // var_dump($kate);

        foreach ($kategori_id as $kt_id) {
            $data['penilaian'] = $this->db->query("SELECT penilaian.*, santri.santri_nama, mapel.mapel_nama FROM ((penilaian INNER JOIN santri ON penilaian.id_santri = santri.santri_id) INNER JOIN mapel ON penilaian.id_mapel = mapel.mapel_id) WHERE penilaian_id = '$wh';")->result();
        }

        $data['title'] = "Edit Penilaian | Madrasah Diniyah Raport";
        // $data['penilaian'] = $this->m_madrasah->edit_data($where,'penilaian')->result();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/form/form-edit-nilai', $data);
        $this->load->view('admin/footer');
    }

    // Fungsi Untuk Aksi Edit Data Nilai
    function aksi_edit_nilai(){ 
        $id = $this->input->post('id');
        $kategori_id = $this->input->post('kategori_id');
        // $santri = $this->input->post('santri_id');
        // $mapel_id = $this->input->post('mapel_id');
        $nilai = $this->input->post('nilai');
        $this->form_validation->set_rules('nilai', 'Nilai', 'required');

        if($this->form_validation->run() != false){
            $where = array(
                'penilaian_id' => $id
            );
            $data = array(
                // 'id_kategori' => $kategori_id,
                // 'id_santri' => $santri,
                // 'id_mapel' => $mapel_id,
                'nilai' => $nilai
            );
            
            $this->m_madrasah->update_data($where, $data, 'penilaian');
            redirect(base_url().'nilai/tabel_nilai/'.$kategori_id);
        }else{
            $where = array(
                'penilaian_id' => $id
            );
            
            $data['penilaian'] = $this->m_madrasah->edit_data($where, 'penilaian')->result();
            $this->load->view('admin/header');
            $this->load->view('admin/form/tabel-nilai/'.$kategori_id);
            $this->load->view('admin/footer');
        }
        
    }

    function nilai_edit_card($kategori_id, $id){ 
        $where = array(
            'penilaian_id' => $id
        );

        $kategori_id = array(
            'kategori_id' => $kategori_id
        );

        foreach($where as $wh){
            $data['wh'] = $wh;
        }

        foreach($kategori_id as $kate){
            $data['kate'] = $kate;
        }
        // var_dump($kate);

        foreach ($kategori_id as $kt_id) {
            $data['penilaian'] = $this->db->query("SELECT penilaian.*, santri.santri_nama, mapel.mapel_nama FROM ((penilaian INNER JOIN santri ON penilaian.id_santri = santri.santri_id) INNER JOIN mapel ON penilaian.id_mapel = mapel.mapel_id) WHERE penilaian_id = '$wh';")->result();
        }

        $data['title'] = "Edit Penilaian | Madrasah Diniyah Raport";
        // $data['penilaian'] = $this->m_madrasah->edit_data($where,'penilaian')->result();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/form/form-edit-nilai-per-card', $data);
        $this->load->view('admin/footer');
    }

    // Fungsi Untuk Aksi Edit Data Nilai Didalam Card
    function aksi_edit_nilai_card(){ 
        $id = $this->input->post('id');
        $kategori_id = $this->input->post('kategori_id');
        $santri_id = $this->input->post('santri_id');
        $nilai = $this->input->post('nilai');
        $this->form_validation->set_rules('nilai', 'Nilai', 'required');

        if($this->form_validation->run() != false){
            $where = array(
                'penilaian_id' => $id
            );
            $data = array(
                'nilai' => $nilai
            );

            // $kat = array(
            //     'kategori_id' => $kat
            // );
            // $san = array(
            //     'santri_id' => $san
            // );

            // foreach($kat as $kate){
            //     $data['kate'] = $kate;
            // }

            // foreach($san as $sant){
            //     $data['sant'] = $sant;
            // }
            
            $this->m_madrasah->update_data($where, $data, 'penilaian');
            redirect(base_url().'nilai/table_per_card/');
        }else{
            $where = array(
                'penilaian_id' => $id
            );
            
            $data['penilaian'] = $this->m_madrasah->edit_data($where, 'penilaian')->result();
            $this->load->view('admin/header');
            $this->load->view('admin/form/table_per_card/'.$kategori_id.'/'.$santri_id);
            $this->load->view('admin/footer');
        }
        
    }
    

=======

        var_dump($data);
    }

    function cetak_data_nilai()
    {
        $data['penilaian'] = $this->db->query("SELECT penilaian.*, santri.santri_nama, mapel.mapel_nama FROM ((penilaian INNER JOIN santri ON penilaian.id_santri = santri.santri_id) INNER JOIN mapel ON penilaian.id_mapel = mapel.mapel_id);")->result();
        $this->load->view('admin/cetak_data/cetak-data-nilai', $data);
    }

>>>>>>> 30a29fa0aa0369477f767b20176fc265fe8512b9
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

    function nilai_hapus($kategori_id, $id){
        $where = array(
            'penilaian_id' => $id
        );
        // $kategori_id = array(
        //     'kategori_id' => $kategori_id
        // );
        
        // var_dump($where);
        // echo "<br>";
        // var_dump($kategori_id);

        $this->m_madrasah->delete_data($where, 'penilaian');
        redirect(base_url().'nilai/tabel_nilai/'.$kategori_id);
    }

    function nilai_hapus_card($kategori_id, $id, $santri_id){
        $where = array(
            'penilaian_id' => $id
        );
        // $kategori_id = array(
        //     'kategori_id' => $kategori_id
        // );
        
        // var_dump($where);
        // echo "<br>";
        // var_dump($kategori_id);

        $this->m_madrasah->delete_data($where, 'penilaian');
        redirect(base_url().'nilai/table_per_card/'.$kategori_id.'/'.$santri_id);
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url() . 'welcome?pesan=logout');
    }
}
