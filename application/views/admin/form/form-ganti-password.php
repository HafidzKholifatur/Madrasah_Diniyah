<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Form Ganti Password</h3>
                <p class="text-subtitle text-muted">Form yang bertujuan untuk mengganti password admin</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Form Ganti Password</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Basic Vertical form layout section start -->
    <section id="basic-vertical-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Ganti Password</h4>
                    </div>

                    <div class="card-content">
                        <div class="card-body">
                            <?php echo $this->session->flashdata('pesan'); ?>
                            <form class="form form-vertical" action="<?php echo base_url() . 'admin/ganti_password' ?>" method="post">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="first-name-icon">Password Lama</label>
                                                <div class="position-relative">
                                                    <input type="password" name="pass_lama" class="form-control" id="pass_lama" value="">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-lock"></i>
                                                    </div>
                                                </div>
                                                <?php echo form_error('pass_lama', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="first-name-icon">Password Baru</label>
                                                <div class="position-relative">
                                                    <input type="password" name="pass_baru" class="form-control" id="pass_baru" value="">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-key"></i>
                                                    </div>
                                                </div>
                                                <?php echo form_error('pass_baru', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="first-name-icon">Ketik Ulang Password Baru</label>
                                                <div class="position-relative">
                                                    <input type="password" name="ulang_pass_baru" class="form-control" id="ulang_pass_baru" value="">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-key"></i>
                                                    </div>
                                                </div>
                                                <?php echo form_error('ulang_pass_baru', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                                            <a href="<?php echo base_url() . 'santri/tabel_santri' ?>" class="btn btn-light-secondary me-1 mb-1">Batal</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- // Basic Vertical form layout section end -->
</div>