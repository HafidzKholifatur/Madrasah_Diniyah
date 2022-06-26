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