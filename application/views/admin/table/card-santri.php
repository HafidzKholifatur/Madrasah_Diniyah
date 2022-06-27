<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Card Mode Santri</h3>
                <!-- <p class="text-subtitle text-muted">-------</p> -->
                <!-- <a href="<?php // echo base_url().'nilai/tambah_list' ?>" class="btn btn-primary mb-3 justify-content-end"><i class="bi bi-plus"></i> Tambah Card Santri</a> -->
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Card Penilaian Santri</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="col-12 col-md-12 text-end">
            <!-- <a href="<?php echo base_url().'nilai/tambah_card_per_kategori/'.$kate ?>" class="btn btn-success mb-3 justify-content-end"><i class="bi bi-plus"></i> Tambah Card Santri</a> -->
            <a href="<?php echo base_url().'nilai/tabel_nilai/'.$kate ?>" class="btn btn-info mb-3 justify-content-end"><i class="bi bi-table"></i> Table Mode</a>
        </div>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-12">
                <div class="row">
                    <?php
                        $no = 1; 
                        foreach($penilaian as $p) {
                    ?>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <h3 class=""><?= $p->santri_nama ?></h3>
                                    <hr>
                                    <!-- <h4 class="card-title"><?= $p->mapel_nama ?></h4>
                                    <p class="card-text">
                                        Dibuat Pada Tanggal <b><?= date('d/m/Y', strtotime($k->tgl_dibuat)); ?></b>
                                    </p> -->
                                    <div class="form-actions d-flex justify-content-start">
                                        <a href="<?php echo base_url().'nilai/table_per_card/'.$p->id_kategori.'/'.$p->id_santri ?>" class="btn btn-primary me-1"><i class="bi bi-eye"></i> Lihat Detail</a>
                                        <a href="<?php echo base_url().'nilai/cetak_data_nilai/'.$p->id_kategori.'/'.$p->id_santri ?>" target="_blank" class="btn btn-info me-1"><i class="bi bi-printer"></i> Cetak Data</a>
                                        <a href="<?php echo base_url().'nilai/hapus_card_santri/'.$p->id_kategori.'/'.$p->id_santri ?>" onclick="return confirm('Apakah anda ingin menghapus?')" class="btn btn-danger"><i class="bi bi-trash"></i> Hapus</a>
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