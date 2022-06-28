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

    // Fungsi Untuk Menampilkan Isi Dari Table Penilaian Secara Keseluruhan
    function tabel_nilai($id){
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
    
    // Fungsi Untuk Menampilkan Card Nilai Per-Kategori
    function card_nilai(){
        $data['title'] = "List Card Nilai | Madrasah Diniyah Raport";
        $data['kategori'] = $this->m_madrasah->get_data('kategori')->result();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/table/card-nilai', $data);
        $this->load->view('admin/footer');
    }

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

        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('Data berhasil dihapus');</script>";
        }
        echo "<script>window.location='" . site_url('nilai') . "';</script>";
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
        $data['title'] = "Tambah List Nilai | Madrasah Diniyah Raport";
        $this->load->view('admin/header', $data);
        $this->load->view('admin/form/form-tambah-list');
        $this->load->view('admin/footer');
    }

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

        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('Data berhasil dihapus');</script>";
        }
        echo "<script>window.location='" . site_url('nilai') . "';</script>";
    }

    // Fungsi Untuk Tampilan Tambah Data Nilai Berdasarkan kategori_id
    function tambah_nilai($id){
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

    function tambah_nilai_card($id, $sid){
        $data['title'] = "Tambah Nilai | Madrasah Diniyah Raport";
        $data['santri'] = $this->m_madrasah->get_data('santri')->result();
        $data['mapel'] = $this->m_madrasah->get_data('mapel')->result();
        
        $kategori_id = array(
            'kategori_id' => $id
        );

        $santri_id = array(
            'santri_id' => $sid
        );

        foreach($kategori_id as $kate){
            $data['kate'] = $kate;
        }

        foreach($santri_id as $said){
            $data['said'] = $said;
        }

        foreach ($kategori_id as $kt_id) {
            $data['santri'] = $this->db->query("SELECT * FROM santri WHERE santri_id = '$said';")->result();
        }

        $this->load->view('admin/header', $data);
        $this->load->view('admin/form/form-tambah-nilai-card', $data);
        $this->load->view('admin/footer');
    }

    // Fungsi Untuk Aksi Tambah Data Nilai
    function aksi_tambah_nilai(){ 
        $kategori_id = $this->input->post('kategori_id');
        $santri = $this->input->post('santri_id');
        $mapel_id = $this->input->post('mapel_id');
        $nilai = $this->input->post('nilai');
        $this->form_validation->set_rules('nilai', 'Nilai', 'required');
        // $this->form_validation->set_rules('kategori_id', 'Kategori Id', 'trim|required|is_unique[penilaian.id_kategori]');
        // $this->form_validation->set_rules('santri', 'Santri', 'trim|required|is_unique[penilaian.id_santri]');
        // $this->form_validation->set_rules('mapel', 'Mapel', 'trim|required|is_unique[penilaian.id_mapel]');

        if($this->form_validation->run() != false){
            $data = array(
                'id_kategori' => $kategori_id,
                'id_santri' => $santri,
                'id_mapel' => $mapel_id,
                'nilai' => $nilai
            );
            
            $this->m_madrasah->insert_data($data, 'penilaian');
            redirect(base_url().'nilai/tabel_nilai/'.$kategori_id);
        }else{
            $this->load->view('admin/header');
            $this->load->view('admin/form/form-tambah-nilai/'.$kategori_id);
            $this->load->view('admin/footer');
        }
        
    }

    function aksi_tambah_nilai_card(){ 
        $kategori_id = $this->input->post('kategori_id');
        $santri = $this->input->post('santri_id');
        $mapel_id = $this->input->post('mapel_id');
        $nilai = $this->input->post('nilai');
        $this->form_validation->set_rules('nilai', 'Nilai', 'required');
        // $this->form_validation->set_rules('kategori_id', 'Kategori Id', 'trim|required|is_unique[penilaian.id_kategori]');
        // $this->form_validation->set_rules('santri', 'Santri', 'trim|required|is_unique[penilaian.id_santri]');
        // $this->form_validation->set_rules('mapel', 'Mapel', 'trim|required|is_unique[penilaian.id_mapel]');

        if($this->form_validation->run() != false){
            $data = array(
                'id_kategori' => $kategori_id,
                'id_santri' => $santri,
                'id_mapel' => $mapel_id,
                'nilai' => $nilai
            );
            
            $this->m_madrasah->insert_data($data, 'penilaian');
            redirect(base_url().'nilai/table_per_card/'.$kategori_id.'/'.$santri);
        }else{
            $this->load->view('admin/header');
            $this->load->view('admin/form/form-tambah-nilai/'.$kategori_id);
            $this->load->view('admin/footer');
        }
        
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
        $san = $this->input->post('san');
        $nilai = $this->input->post('nilai');
        $this->form_validation->set_rules('nilai', 'Nilai', 'required');

        if($this->form_validation->run() != false){
            $where = array(
                'penilaian_id' => $id
            );
            $data = array(
                'nilai' => $nilai
            );
            
            $this->m_madrasah->update_data($where, $data, 'penilaian');
            redirect(base_url().'nilai/table_per_card/'.$kategori_id.'/'.$san);
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

    function nilai_hapus($kategori_id, $id){
        $where = array(
            'penilaian_id' => $id
        );

        $this->m_madrasah->delete_data($where, 'penilaian');
        redirect(base_url().'nilai/tabel_nilai/'.$kategori_id);

        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('Data berhasil dihapus');</script>";
        }
        echo "<script>window.location='" . site_url('nilai') . "';</script>";
    }

    function nilai_hapus_card($kategori_id, $id, $santri_id){
        $where = array(
            'penilaian_id' => $id
        );

        $this->m_madrasah->delete_data($where, 'penilaian');
        redirect(base_url().'nilai/table_per_card/'.$kategori_id.'/'.$santri_id);
    }

    function cetak_data_nilai()
    {
        $data['penilaian'] = $this->db->query("SELECT penilaian.*, santri.santri_nama, mapel.mapel_nama FROM ((penilaian INNER JOIN santri ON penilaian.id_santri = santri.santri_id) INNER JOIN mapel ON penilaian.id_mapel = mapel.mapel_id) ;")->result();
        $this->load->view('admin/cetak_data/cetak-data-nilai', $data);
    }

    function cetak_data_nilai_card($id, $sid)
    {
        $kategori_id = array(
            'kategori_id' => $id
        );

        $santri_id = array(
            'santri_id' => $sid
        );

        foreach($kategori_id as $kate){
            $data['kate'] = $kate;
        }

        foreach($santri_id as $said){
            $data['said'] = $said;
        }

        // $data['rata'] = $this->db->query("SELECT AVG(nilai) FROM penilaian WHERE id_kategori = '$kate'; ")->result();
        $data['rata'] = $this->db->query("SELECT AVG(nilai) AS rata_nilai FROM penilaian WHERE id_kategori = '$kate' AND id_santri = '$said'; ")->result();

        $data['total'] = $this->db->query("SELECT SUM(nilai) AS total_nilai FROM penilaian WHERE id_kategori = '$kate' AND id_santri = '$said'; ")->result();
        // $data['total_n'] = $this->db->query("SELECT SUM(nilai) AS ttl_nilai FROM penilaian WHERE id_kategori = '$kate'; ")->result();

        // $data['jumlah'] =  $this->db->query("SELECT COUNT(id_santri) FROM penilaian WHERE id_kategori = '$kate'; ")->result();
        
        $data['penilaian'] = $this->db->query("SELECT penilaian.*, santri.santri_nama, mapel.mapel_nama FROM ((penilaian INNER JOIN santri ON penilaian.id_santri = santri.santri_id) INNER JOIN mapel ON penilaian.id_mapel = mapel.mapel_id) WHERE id_kategori = '$kate' AND id_santri = '$said'; ")->result();
        $this->load->view('admin/cetak_data/cetak-data-nilai-card', $data);
    }

    function logout(){
        $this->session->sess_destroy();
        redirect(base_url().'welcome?pesan=logout');
    }
}