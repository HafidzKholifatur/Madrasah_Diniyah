<div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Form Edit Data Mata Pelajaran</h3>
                            <p class="text-subtitle text-muted">Form yang bertujuan untuk mengubah data mata pelajaran</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Form Edit Data Mata Pelajaran
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
                                    <h4 class="card-title">Tambah Edit Mata Pelajaran</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                    <?php foreach($mapel as $m) { ?>
                                        <form class="form form-vertical" action="<?php echo base_url().'mapel/aksi_edit_mapel' ?>" method="post">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group has-icon-left">
                                                        <label for="first-name-icon">Nama Mata Pelajaran</label>
                                                            <div class="position-relative">
                                                                <input type="hidden" name="id" value="<?php echo $m->mapel_id ?>">
                                                                <input type="text" name="mapel" class="form-control"
                                                                    id="first-name-icon" value="<?php echo $m->mapel_nama ?>">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-book"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 d-flex justify-content-end">
                                                        <button type="submit"
                                                            class="btn btn-primary me-1 mb-1">Simpan</button>
                                                        <a href="<?php echo base_url().'mapel/tabel_mapel' ?>" class="btn btn-light-secondary me-1 mb-1">Batal</a>
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