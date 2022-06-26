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
                            <form class="form form-vertical" method="POST" action="<?php echo base_url().'nilai/aksi_edit_nilai' ?>">
                                <div class="form-body">
                                    <?php foreach($penilaian as $p) { ?>
                                    <div class="row">
                                        <div class="col-12 mb-3">
                                            <div class="form-group has-icon-left">
                                                <input type="hidden" name="kategori_id" value="<?php echo $kate ?>">
                                                <input type="hidden" name="id" value="<?php echo $p->penilaian_id ?>">
                                                <!-- <?php echo $p->penilaian_id ?> -->
                                                <label for="first-name-icon">Pilih Santri/Santriwati</label>
                                                <div class="position-relative">
                                                    <select class="form-select form-control" id="basicSelect" name="santri_id" disabled>
                                                        <option value="<?php echo $p->id_santri ?>"><?php echo $p->santri_nama ?></option>
                                                    </select>
                                                </div> 
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <div class="form-group has-icon-left">
                                                <label for="first-name-icon">Pilih Mata Pelajaran</label>
                                                <div class="position-relative">
                                                    <select class="form-select form-control" id="basicSelect" name="mapel_id" disabled>
                                                        <option value="<?php echo $p->id_mapel ?>"><?php echo $p->mapel_nama ?></option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="first-name-icon">Nilai</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" value="<?php echo $p->nilai ?>" placeholder="Masukan Nilai" id="first-name-icon" name="nilai" required>
                                                </div>
                                                <?php echo form_error('nilai'); ?>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button> 
                                            <a href="<?php echo base_url().'nilai/tabel_nilai/'.$kate ?>" class="btn btn-warning me-1 mb-1">Kembali</a>
                                        </div>
                                    </div>
                                    <?php } ?>
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