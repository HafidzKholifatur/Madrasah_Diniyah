            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Tabel Santri</h3>
                            <p class="text-subtitle text-muted">Tabel yang berisi data Santri/Santriwati pengajian</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Table Santri</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            Tabel Santri/Santriwati
                            <div class="float-lg-end">
                                <a href="<?php echo base_url().'santri/tambah_santri' ?>" class="btn btn-success btn-sm float-lg-end">Tambah Santri</a>
                                <a href="<?php echo base_url().'santri/cetak_data_santri' ?>" class="btn btn-info btn-sm float-lg-end me-2">Cetak Data</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr> 
                                        <th>No</th>
                                        <th>Nama Santri/Santriwati</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Alamat</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $no = 1; 
                                    foreach($santri as $s) { 
                                    ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $s->santri_nama ?></td>
                                        <td><?php echo $s->santri_jk ?></td>
                                        <td><?php echo date('d/m/Y', strtotime($s->santri_lahir)); ?></td>
                                        <td><?php echo $s->santri_alamat ?></td>
                                        <td class="text-center">
                                            <a href="<?php echo base_url().'santri/santri_edit/'.$s->santri_id; ?>" class="btn btn-warning btn-sm">
                                                <span class="glyphicon glyphicon-plus"></span> Edit
                                            </a>
                                            <a href="<?php echo base_url().'santri/santri_hapus/'.$s->santri_id; ?>" onclick="return confirm('Apakah anda ingin menghapus?')" class="btn btn-danger btn-sm">
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