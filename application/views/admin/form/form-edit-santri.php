<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Form Edit Data Santri/Santriwati</h3>
                <p class="text-subtitle text-muted">Form yang bertujuan untuk mengubah data Santri/Santriwati
                    pengajian</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Form Edit Data Santri/Santriwati</li>
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
                        <h4 class="card-title">Edit Data Santri/Santriwati Pengajian</h4>
                    </div>

                    <div class="card-content">
                        <div class="card-body">
                            <?php foreach ($santri as $s) { ?>
                                <form class="form form-vertical" action="<?php echo base_url() . 'santri/aksi_edit_santri' ?>" method="post">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group has-icon-left">
                                                    <label for="first-name-icon">Nama Santri/Santriwati</label>
                                                    <div class="position-relative">
                                                        <input type="hidden" name="id" value="<?php echo $s->santri_id ?>">
                                                        <input type="text" name="nama" class="form-control" id="first-name-icon" value="<?php echo $s->santri_nama; ?>">
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-person"></i>
                                                        </div>
                                                    </div>
                                                    <?php echo form_error('nama'); ?>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group has-icon-left">
                                                    <label for="email-id-icon">Jenis Kelamin</label>
                                                    <div class="position-relative">
                                                        <select class="form-select form-control" name="jk" id="basicSelect">
                                                            <option <?php echo ($s->santri_jk == 'Laki-laki') ? "selected" : "" ?>>Laki-Laki</option>
                                                            <option <?php echo ($s->santri_jk == 'Perempuan') ? "selected" : "" ?>>Perempuan</option>
                                                        </select>
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-person-badge"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group has-icon-left">
                                                        <label for="first-name-icon">Tanggal Lahir</label>
                                                        <div class="position-relative">
                                                            <input type="date" name="tgl_lahir" class="form-control" id="first-name-icon" value="<?php echo $s->santri_lahir; ?>">
                                                            <div class="form-control-icon">
                                                                <i class="bi bi-calendar-event-fill"></i>
                                                            </div>
                                                        </div>
                                                        <?php echo form_error('tgl_lahir'); ?>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group has-icon-left">
                                                        <label for="first-name-icon">Alamat</label>
                                                        <div class="position-relative">
                                                            <input type="text" name="alamat" class="form-control" id="first-name-icon" value="<?php echo $s->santri_alamat; ?>">
                                                            <div class="form-control-icon">
                                                                <i class="bi bi-pin-map-fill"></i>
                                                            </div>
                                                        </div>
                                                        <?php echo form_error('alamat'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                                            <a href="<?php echo base_url() . 'santri/tabel_santri' ?>" class="btn btn-light-secondary me-1 mb-1">Batal</a>
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