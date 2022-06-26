public function ganti_password(){
    // $where = array(
        // 'santri_id' => $id
    // );

    // LINK TUTORIAL GANTI PASSWORD
    // https://www.youtube.com/watch?v=zwazZNZRKxQ

    $data['title'] = "Ganti Password | Madrasah Diniyah Raport";
    $data = $this->m_madrasah->get_data('admin')->result();
    $data['admin'] = $this->db->get_where('admin', ['admin_username' => $this->session->userdata('admin_username')])->row_array();

    $this->form_validation->set_rules('pass_lama', 'Password Lama', 'required|trim');
    $this->form_validation->set_rules('pass_baru', 'Password Baru', 'required|trim|matches[ulang_pass_baru]');
    $this->form_validation->set_rules('ulang_pass_baru', 'Ulang Password Baru', 'required|trim|matches[pass_baru]');

    if($this->form_validation->run() == false){
        $this->load->view('admin/header', $data);
        $this->load->view('admin/form/form-ganti-password', $data);
        $this->load->view('admin/footer');
    }else{  
        $pass_lama = $this->input->post('pass_lama');
        $pass_baru = $this->input->post('pass_baru');
        if(password_verify($pass_lama, $data['admin']['admin_password'])){
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Password Lama Salah!</div>');
            redirect('admin/ganti_password');
        } else {
            if($pass_lama == $pass_baru){
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Password Baru Tidak Boleh Sama Dengan Yang Lama!</div>');
                redirect('admin/ganti_password');
            } else {
                // password jika sudah benar
                $password_hash = password_hash($pass_baru, PASSWORD_DEFAULT);

                $this->db->update('admin');
                $this->db->where('admin_username', $this->session->userdata('admin_username'));
                $this->db->set('admin_password', $password_hash);                    

                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Password Berhasil Diubah!</div>');
                redirect('admin/ganti_password');
            }
        }
    }
}