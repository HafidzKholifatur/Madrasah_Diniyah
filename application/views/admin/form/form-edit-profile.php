<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Profile Admin</h3>
                <!-- <p class="text-subtitle text-muted">Form yang bertujuan untuk menambahkan data Santri/Santriwati
                                pengajian</p> -->
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Profile Admin</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Basic Vertical form layout section start -->
    <section id="basic-vertical-layouts">
        <div class="row match-height">
            <div class="col-md-8 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Vertical Form</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <?= form_open_multipart('admin/edit_profile') ?>
                                <div class="form form-horizontal">
                                    <?php foreach($admin as $ad) { ?>
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Nama Admin</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="hidden" name="id" value="<?php echo $ad->admin_id ?>">
                                                <input type="text" id="first-name" class="form-control" name="nama" value="<?= $ad->admin_nama ?>">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Foto Profile</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <img src="" alt="" class="img-thumbnail">
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input type="file" id="image" class="form-control" name="image">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                            </div>
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