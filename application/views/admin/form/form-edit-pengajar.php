<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Form Edit Data Pengajar</h3>
                <p class="text-subtitle text-muted">Form yang bertujuan untuk mengedit data pengajar
                    pengajian</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Form Edit Data Pengajar
                        </li>
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
                        <h4 class="card-title">Edit Data Pengajar</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <?php foreach ($pengajar as $p) { ?>
                                <form class="form form-vertical" method="POST" action="<?php echo base_url() . 'pengajar/aksi_edit_pengajar' ?>">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group has-icon-left">
                                                    <label for="first-name-icon">Nama Pengajar</label>
                                                    <div class="position-relative">
                                                        <input type="hidden" name="id" value="<?php echo $p->pengajar_id ?>">
                                                        <input type="text" name="nama" class="form-control" value="<?= $p->pengajar_nama ?>" id="first-name-icon">
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
                                                        <select name="jk" class="form-select form-control" id="basicSelect">
                                                            <option <?php echo ($p->pengajar_jk == 'Laki-Laki') ? "selected" : "" ?>>Laki-Laki</option>
                                                            <option <?php echo ($p->pengajar_jk == 'Perempuan') ? "selected" : "" ?>>Perempuan</option>
                                                        </select>
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-person-badge"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group has-icon-left">
                                                <label for="first-name-icon">Tanggal Lahir</label>
                                                <div class="position-relative">
                                                    <input type="text" name="tgl_lahir_pengajar" class="form-control" id="first-name-icon" value="<?php echo $p->pengajar_lahir; ?>">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-calendar-event-fill"></i>
                                                    </div>
                                                </div>
                                                <?php echo form_error('tgl_lahir_pengajar'); ?>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group has-icon-left">
                                                    <label for="first-name-icon">No Telepon</label>
                                                    <div class="position-relative">
                                                        <input type="text" name="telp" class="form-control" id="first-name-icon" value="<?php echo $p->pengajar_telp; ?>">
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-phone-fill"></i>
                                                        </div>
                                                    </div>
                                                    <?php echo form_error('alamat_pengajar'); ?>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group has-icon-left">
                                                    <label for="first-name-icon">Alamat</label>
                                                    <div class="position-relative">
                                                        <input type="text" name="alamat_pengajar" class="form-control" id="first-name-icon" value="<?php echo $p->pengajar_alamat; ?>">
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-person"></i>
                                                        </div>
                                                    </div>
                                                    <?php echo form_error('alamat_pengajar'); ?>
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                                                <a href="<?php echo base_url() . 'pengajar/table_pengajar' ?>" class="btn btn-light-secondary me-1 mb-1">Batal</a>
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
</div>