<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>List Penilaian</h3>
                <p class="text-subtitle text-muted">List yang berisi daftar penilaian yang ada di pengajian</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">List Penilaian</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="col-12 col-md-12 text-end">
        <a href="<?php echo base_url().'nilai/tambah_list' ?>" class="btn btn-primary mb-3 justify-content-end"><i class="bi bi-plus"></i> Tambah List Nilai Baru</a>
        </div>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-12">
                <div class="row">
                    <?php
                        $no = 1; 
                        foreach($kategori as $k) {
                    ?>
                    <div class="col-6 col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <h3 class="">Penilaian ke - <?= $no++; ?></h3>
                                    <hr>
                                    <h4 class="card-title"><?= $k->nama_kategori ?></h4>
                                    <p class="card-text">
                                        Dibuat Pada Tanggal <b><?= date('d/m/Y', strtotime($k->tgl_dibuat)); ?></b>
                                    </p>
                                    <div class="form-actions d-flex justify-content-start">
                                        <a href="<?php echo base_url().'nilai/tabel_nilai/'.$k->kategori_id; ?>" class="btn btn-primary me-2"><i class="bi bi-eye"></i> Lihat Detail</a>
                                        <a onClick="konfirmasi()" href="<?php echo base_url().'nilai/hapus_card/'.$k->kategori_id; ?>" class="btn btn-danger"><i class="bi bi-trash"></i> Hapus</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </section>
    </div>
</div>