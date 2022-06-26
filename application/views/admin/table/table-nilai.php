<div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Table Penilaian</h3>
                            <p class="text-subtitle text-muted">Tabel yang berisi data penilaian dari mata pelajaran
                                yang di pengajian</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Table Penilaian</li>
                                </ol>
                            </nav> 
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <a href="<?php echo base_url().'nilai/card_nilai/' ?>" class="btn btn-primary"><i class="bi bi-arrow-left"></i> Kembali</a>
                            <div class="float-lg-end">
                                <!-- <input type="text"   value="<?php echo $kate ?>">   -->
                                <!-- <a href="<?php echo base_url().'nilai/tambah_nilai/'?>" class="btn btn-sm btn-success me-1">Tambah Nilai</a> -->
                                <a href="<?php echo base_url().'nilai/tambah_nilai/'.$kate ?>" class="btn btn-success"><i class="bi bi-plus"></i> Tambah Nilai</a>
                                <a href="<?php echo base_url().'nilai/tabel_nilai' ?>" class="btn btn-primary me-1"><i class="bi bi-printer-fill"></i> Cetak Data</a>
                                <a href="<?php echo base_url().'nilai/list_santri/'.$kate ?>" class="btn btn-info float-lg-end"><i class="bi bi-back"></i> Card Mode</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                            <thead>
                                    <tr> 
                                        <th>No</th>
                                        <th hidden></th>
                                        <th>Nama Santri/Santriwati</th>
                                        <th>Nama Mata Pelajaran</th>
                                        <th>Nilai</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $no = 1; 
                                    foreach($penilaian as $p) { 
                                    ?>
                                    <tr>
                                        <td><?=$no++ ?></td>
                                        <td hidden><?=$p->id_kategori ?></td>
                                        <td><?=$p->santri_nama ?></td>
                                        <td><?=$p->mapel_nama ?></td>
                                        <td><?=$p->nilai ?></td>
                                        <td class="text-center">
                                            <a href="<?php echo base_url().'nilai/nilai_edit/'.$p->id_kategori.'/'.$p->penilaian_id ?>" class="btn btn-warning btn-sm">
                                                <i class="bi bi-pencil-square"></i> Edit
                                            </a>
                                            <a href="<?php echo base_url().'nilai/nilai_hapus/'.$p->id_kategori.'/'.$p->penilaian_id ?>" class="btn btn-danger btn-sm">
                                                <i class="bi bi-trash"></i> Hapus
                                            </a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </section>
            </div>