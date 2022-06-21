            <div class="page-heading"> 
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Table Mata Pelajaran</h3>
                            <p class="text-subtitle text-muted">Tabel yang berisi data mata pelajaran di pengajian</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Table Mata Pelajaran</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            Tabel Mata Pelajaran
                            <div class="float-lg-end">
                                <a href="<?php echo base_url().'mapel/tambah_mapel' ?>" class="btn btn-success btn-sm float-lg-end">Tambah Mata Pelajaran</a>
                                <a href="<?php echo base_url().'mapel/cetak_data_mapel' ?>" class="btn btn-info btn-sm float-lg-end me-2">Cetak Data</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Mata Pelajaran</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($mapel as $m) {
                                    ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $m->mapel_nama ?></td>
                                        <td class="text-center">
                                            <a href="<?php echo base_url() . 'mapel/mapel_edit/' . $m->mapel_id; ?>" class="btn btn-warning btn-sm">
                                                <span class="glyphicon glyphicon-plus"></span> Edit
                                            </a>
                                            <a href="<?php echo base_url() . 'mapel/mapel_hapus/' . $m->mapel_id; ?>" class="btn btn-danger btn-sm">
                                                <span class="glyphicon glyphicon-trash"></span> Hapus
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