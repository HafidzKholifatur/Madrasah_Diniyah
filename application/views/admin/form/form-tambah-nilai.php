<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Form Tambah Data Nilai</h3>
                <p class="text-subtitle text-muted">Form yang bertujuan untuk menambahkan data nilai
                    pengajian.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Form Tambah Data Nilai</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Basic Vertical form layout section start -->
    <section id="basic-vertical-layouts">
        <div class="row match-height">
            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tambah Data Nilai Pengajian</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical" method="POST" action="<?php echo base_url().'nilai/aksi_tambah_nilai' ?>">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12 mb-3">
                                            <div class="form-group has-icon-left">
                                                <input type="hidden" name="kategori_id" value="<?php echo $kate ?>">
                                                <?php echo form_error('kategori_id'); ?>
                                                <label for="first-name-icon">Pilih Santri/Santriwati</label>
                                                <div class="position-relative">
                                                    <select class="form-select form-control" id="basicSelect" name="santri_id">
                                                        <?php foreach($santri as $s) { ?>
                                                        <option value="<?php echo $s->santri_id ?>"><?php echo $s->santri_nama ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <?php echo form_error('santri'); ?>
                                                </div> 
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <div class="form-group has-icon-left">
                                                <label for="first-name-icon">Pilih Mata Pelajaran</label>
                                                <div class="position-relative">
                                                    <select class="form-select form-control" id="basicSelect" name="mapel_id">
                                                        <?php foreach($mapel as $m) { ?>
                                                        <option value="<?php echo $m->mapel_id ?>"><?php echo $m->mapel_nama ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <?php echo form_error('mapel'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="first-name-icon">Nilai</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" placeholder="Masukan Nilai" id="first-name-icon" name="nilai" required>
                                                </div>
                                                <?php echo form_error('nilai'); ?>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-success me-1 mb-1"><i class="bi bi-save"></i> Simpan</button>
                                            <a href="<?php echo base_url().'nilai/tabel_nilai/'.$kate ?>" class="btn btn-primary me-1 mb-1"><i class="bi bi-arrow-left"></i> Kembali</a>
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