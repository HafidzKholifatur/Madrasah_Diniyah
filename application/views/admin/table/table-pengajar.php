            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Tabel Pengajar</h3>
                            <p class="text-subtitle text-muted">Tabel yang berisi data pengajar pengajian</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Tabel Pengajar</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <!-- <div class="card-header">
                            Simple Datatable
                        </div> -->
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pengajar</th>
                                        <th>Jenis Kelamin</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <?php 
                                    $no = 1;
                                    foreach($pengajar as $p) { 
                                ?> 
                                <tbody>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $p->pengajar_nama ?></td>
                                        <td><?= $p->pengajar_jk ?></td>
                                        <td class="text-center">
                                            <a href="<?php echo base_url().'pengajar/pengajar_edit/'.$p->pengajar_id; ?>" class="btn btn-warning btn-sm">
                                                <span class="glyphicon glyphicon-plus"></span> Edit
                                            </a>
                                            <a href="<?php echo base_url().'pengajar/pengajar_hapus/'.$p->pengajar_id; ?>" class="btn btn-danger btn-sm">
                                                <span class="glyphicon glyphicon-trash"></span> Hapus
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                                <?php } ?>
                            </table>
                        </div>
                    </div>

                </section>
            </div>