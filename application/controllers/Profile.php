<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // mengecek login
        if ($this->session->userdata('status') != "login") {
            redirect(base_url() . 'welcome?pesan=belumlogin');
        }
    }
    function myprofile()
    {
        $data['title'] = "Profile Admin | Madrasah Diniyah Raport";
        $this->load->view('admin/header', $data);
        $this->load->view('admin/profile');
        $this->load->view('admin/footer');
    }

    function edit_profile()
    {
        $data['title'] = "Edit Profile Admin | Madrasah Diniyah Raport";
        $data['admin'] = $this->m_madrasah->get_data('admin')->result();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/form/form-edit-profile');
        $this->load->view('admin/footer');
    }

    function aksi_edit_profile(){ 
        $id = $this->input->post('id');
        $nama = $this->input->post('nama_admin');
        $this->form_validation->set_rules('nama_admin', 'Nama admin', 'required');

        if($this->form_validation->run() != false){
            $where = array(
                'admin_id' => $id
            );
            $data = array(
                'admin_nama' => $nama
            );
            $this->m_madrasah->update_data($where, $data, 'admin');
            redirect(base_url().'profile/myprofile');
        }else{
            $where = array(
                'admin_id' => $id
            );
            $data['admin'] = $this->m_madrasah->edit_data($where, 'admin')->result();
            $this->load->view('admin/header');
            $this->load->view('admin/form/form-edit-profile', $data);
            $this->load->view('admin/footer');
        }
    }
}
