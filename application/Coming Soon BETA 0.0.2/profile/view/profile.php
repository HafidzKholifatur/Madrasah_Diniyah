<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Profile Admin</h3>
                <!-- <p class="text-subtitle text-muted">Form yang bertujuan untuk menambahkan data Santri/Santriwati
                                pengajian</p> -->
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Profile Admin</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Basic Vertical form layout section start -->
    <section id="basic-vertical-layouts">
        <div class="row match-height">
            <div class="col-md-6 col-12">
                <div class="card" >
                <!-- style="max-width: 1200px;" -->
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row g-0"> 
                                <div class="col-md-3">
                                    <img src="<?php echo base_url() . 'assets/images/faces/1.jpg' ?>" class="img-fluid rounded" alt="" >
                                </div>
                                <div class="col-md-9">
                                    <div class="card-body">
                                        <h2><?php echo $this->session->userdata('nama'); ?></h2>
                                        <h5 class="card-text text-muted mb-3">Administrator</h5>
                                        <a href="<?php echo base_url() . 'admin/edit_profile/' . $this->session->userdata('admin_id'); ?>" class="btn btn-success me-1">Edit Profile</a>
                                        <a href="<?php echo base_url() . 'admin/ganti_password'; ?>" class="btn btn-info">Ganti Password</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- // Basic Vertical form layout section end -->
</div>