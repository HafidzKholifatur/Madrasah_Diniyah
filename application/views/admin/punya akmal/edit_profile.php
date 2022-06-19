<div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Profile Admin</li>
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
                                    <h4 class="card-title">Edit Data Admin</h4>
                                </div>

                                <div class="card-content">
                                    <div class="card-body">
                                    <?php foreach($santri as $s) { ?>
                                        <form class="form form-vertical" action="<?php echo base_url().'santri/santri_update' ?>" method="post">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group has-icon-left">
                                                            <label for="first-name-icon">Nama</label>
                                                            <div class="position-relative">
                                                            <input type="hidden" name="id" value="<?php echo $s->santri_id ?>">
                                                                <input type="text" name="nama" class="form-control"
                                                                    id="first-name-icon" value="<?php echo $s->santri_nama; ?>">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-person"></i>
                                                                </div>
                                                            </div>
                                                            <?php echo form_error('nama'); ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group has-icon-left">
                                                        <label for="first-name-icon">Email</label>
                                                        <div class="position-relative">
                                                            <input type="hidden" name="id" value="<?php echo $s->santri_id ?>">
                                                                <input type="text" name="nama" class="form-control"
                                                                    id="first-name-icon" value="<?php echo $s->santri_nama; ?>">
                                                                <div class="form-control-icon">
                                                                <i class="bi bi-envelope"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group has-icon-left">
                                                        <label for="first-name-icon">Foto Profile</label>
                                                        <div class="position-relative">
                                                        <input type="file" class="custom-file-input" id="inputGroupFile01">
                                                          <label class="custom-file-label" for="inputGroupFile01">Pilih Foto</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <div class="col-12 d-flex justify-content-end">
                                                        <button type="submit"
                                                            class="btn btn-primary me-1 mb-1">Simpan</button>
                                                        <button type="reset"
                                                            class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic Vertical form layout section end -->
            </div>