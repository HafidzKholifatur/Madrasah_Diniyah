<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        // mengecek login
        if($this->session->userdata('status') != "login"){
            redirect(base_url().'welcome?pesan=belumlogin');
        }
    }

    function index(){ 
        $data['title'] = "Dashboard | Madrasah Diniyah Raport";
        $data['santri'] = $this->m_madrasah->get_data('santri')->result();
        // $data['transaksi'] = $this->db->query("SELECT * FROM transaksi ORDER BY transaksi_id DESC LIMIT 10")->result();
        // $data['kostumer'] = $this->db->query("SELECT * FROM kostumer ORDER BY kostumer_id DESC LIMIT 10")->result();
        // $data['mobil'] = $this->db->query("SELECT * FROM mobil ORDER BY mobil_id DESC LIMIT 10")->result();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('admin/footer');
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

    function kontak(){
        $this->load->view('admin/header');
        $this->load->view('admin/form/form-tambah-pengajar');
        $this->load->view('admin/footer');
    }

    // public function ganti_password(){

	// 	$this->form_validation->set_rules('old_pass', 'Old Password', 'trim|required|max_length[150]');
	// 	$this->form_validation->set_rules('new_pass', 'New Password', 'trim|required|max_length[150]');
	// 	$this->form_validation->set_rules('rep_new_pass', 'Repeat Password', 'trim|required|max_length[150]|matches[new_pass]');

	// 	if($this->form_validation->run() == false){

	// 		$data['title'] = "Ganti Password";
	// 		$this->load->view('admin/header',$data);
	// 		$this->load->view('admin/form/chanage_password');
	// 		$this->load->view('admin/footer');
	// 	}else{

	// 		// Update Data
	// 		$data = array(
	// 			'admin_password' => md5($this->input->post('new_pass')),
	// 		);
	// 		// Check Old {Password}
	// 		$result = $this->user_model->Check_Old_Password($this->session->userdata('admin_id'), md5($this->input->post('old_pass')));
	// 		if($result > 0 AND $result === true ){
	// 			// updata user data
	// 			$result = $this->user_model->Update_User_Data($this->session->userdata('admin_id'), $data);
	// 			if($result > 0){
	// 				$this->session->set_flashdata('success_msg', 'User Password Change.');
	// 				return redirect('admin/ganti_password');
	// 			}else{
	// 				$this->session->set_flashdata('error_msg', '<b>Error: </b>User Password not Change.');
	// 				return redirect('admin/ganti_password');
	// 			}
	// 		}else{
	// 			$this->session->set_flashdata('error_msg', '<b>Error: </b>User Old Password not Match.');
	// 			return redirect('admin/ganti_password');
	// 		}
	// 	}
		
	// }
    

    // public function ganti_password(){
    //     // $where = array(
    //         // 'santri_id' => $id
    //     // );

    //     // LINK TUTORIAL GANTI PASSWORD
    //     // https://www.youtube.com/watch?v=zwazZNZRKxQ

    //     $data['title'] = "Ganti Password | Madrasah Diniyah Raport";
    //     $data = $this->m_madrasah->get_data('admin')->result();
    //     $data['admin'] = $this->db->get_where('admin', ['admin_username' => $this->session->userdata('admin_username')])->row_array();

    //     $this->form_validation->set_rules('pass_lama', 'Password Lama', 'required|trim');
    //     $this->form_validation->set_rules('pass_baru', 'Password Baru', 'required|trim|matches[ulang_pass_baru]');
    //     $this->form_validation->set_rules('ulang_pass_baru', 'Ulang Password Baru', 'required|trim|matches[pass_baru]');

    //     if($this->form_validation->run() == false){
    //         $this->load->view('admin/header', $data);
    //         $this->load->view('admin/form/form-ganti-password', $data);
    //         $this->load->view('admin/footer');
    //     }else{  
    //         $pass_lama = $this->input->post('pass_lama');
    //         $pass_baru = $this->input->post('pass_baru');
    //         if(password_verify($pass_lama, $data['admin']['admin_password'])){
    //             $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Password Lama Salah!</div>');
    //             redirect('admin/ganti_password');
    //         } else {
    //             if($pass_lama == $pass_baru){
    //                 $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Password Baru Tidak Boleh Dengan Yang Lama!</div>');
    //                 redirect('admin/ganti_password');
    //             } else {
    //                 // password jika sudah benar
    //                 $password_hash = password_hash($pass_baru, PASSWORD_DEFAULT);

    //                 $this->db->set('admin_password', $password_hash);
    //                 $this->db->where('admin_username', $this->session->userdata('admin_username'));
    //                 $this->db->update('admin');

    //                 $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Password Berhasil Diubah!</div>');
    //                 redirect('admin/ganti_password');
    //             }
    //         }
    //     }
    // }

    function profile(){
        $data['title'] = "Profile Admin | Madrasah Diniyah Raport";
        $this->load->view('admin/header', $data);
        $this->load->view('admin/profile');
        $this->load->view('admin/footer');
    }

    function edit_profile(){
        $data['title'] = "Edit Profile Admin | Madrasah Diniyah Raport";
        $data['admin'] = $this->m_madrasah->get_data('admin')->result();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/form/form-edit-profile');
        $this->load->view('admin/footer');
    }

    function logout(){
        $this->session->sess_destroy();
        redirect(base_url().'welcome?pesan=logout');
    }
}