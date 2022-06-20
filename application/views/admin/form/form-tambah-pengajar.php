            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Form Tambah Data Pengajar</h3>
                            <p class="text-subtitle text-muted">Form yang bertujuan untuk menambahkan data pengajar
                                pengajian</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Form Tambah Data Pengajar
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
                                    <h4 class="card-title">Tambah Data Pengajar</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form form-vertical" method="POST" action="<?php echo base_url() . 'pengajar/aksi_tambah_pengajar' ?>">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group has-icon-left">
                                                            <label for="first-name-icon">Nama Pengajar</label>
                                                            <div class="position-relative">
                                                                <input type="text" name="nama" class="form-control" placeholder="Masukan Nama Pengajar" id="first-name-icon">
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
                                                                    <!-- <option <?php echo ($k->jurusan == 'TI') ? "selected" : "" ?>>TI</option> -->
                                                                    <option value="Laki-Laki">Laki-Laki</option>
                                                                    <option value="Perempuan">Perempuan</option>
                                                                </select>
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-person-badge"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group has-icon-left">
                                                            <label for="first-name-icon">Tanggal Lahir</label>
                                                            <div class="position-relative">
                                                                <input type="date" name="tgl_lahir_pengajar" class="form-control">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-calendar-event-fill"></i>
                                                                </div>
                                                            </div>
                                                            <?php echo form_error('tgl_lahir_pengajar'); ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group has-icon-left">
                                                            <label for="first-name-icon">No Telepon</label>
                                                            <div class="position-relative">
                                                                <input type="number" name="telp" class="form-control" placeholder="Masukan Nomor Telepon" id="first-name-icon">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-phone-fill"></i>
                                                                </div>
                                                            </div>
                                                            <?php echo form_error('telp'); ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group has-icon-left">
                                                            <label for="first-name-icon">Alamat</label>
                                                            <div class="position-relative">
                                                                <input type="text" name="alamat_pengajar" class="form-control" placeholder="Masukan Alamat" id="first-name-icon">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-pin-map-fill"></i>
                                                                </div>
                                                            </div>
                                                            <?php echo form_error('alamat_pengajar'); ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 d-flex justify-content-end">
                                                        <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
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
            </div>