<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Print Nilai Pelajaran</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url() . 'assets/css/bootstrap.css' ?>">

    <link rel="stylesheet" href="<?php echo base_url() . 'assets/vendors/iconly/bold.css' ?>">

    <link rel="stylesheet" href="<?php echo base_url() . 'assets/vendors/jquery-datatables/jquery.dataTables.bootstrap5.min.css' ?>">
    <link rel="stylesheet" href="<?php echo base_url() . 'assets/vendors/fontawesome/all.min.css' ?>">

    <link rel="stylesheet" href="<?php echo base_url() . 'assets/vendors/simple-datatables/style.css' ?>">

    <link rel="stylesheet" href="<?php echo base_url() . 'assets/vendors/perfect-scrollbar/perfect-scrollbar.css' ?>">
    <link rel="stylesheet" href="<?php echo base_url() . 'assets/vendors/bootstrap-icons/bootstrap-icons.css' ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo base_url() . 'assets/css/app.css' ?>">
    <link rel="shortcut icon" href="<?php echo base_url() . 'assets/images/favicon.svg' ?>" type="image/x-icon">

    <!-- Import Font Awesome CDN -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">

    <!-- <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>

    <!-- Fungsi Cetak Barang -->
    <style type="text/css" media="print">
        @page {
            size: letter landscape
        }

        ;

        .page {
            -webkit-transform: rotate(-90deg);
            -moz-transform: rotate(-90deg);
            filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
        }
    </style>

</head>

<body>

    <div class="wrapper">
        <!-- Halaman Konten  -->
        <div id="content">

            <!-- Isi Konten -->

            <div class="teble-responsive">
                <div class="card-body">
                    <h4 class="card-title">Nilai Pelajaran</h4>
                    <br>
                    <table class="table table-bordered table-striped table-hover" id="table-datatable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th hidden></th>
                                <th>Nama Santri/Santriwati</th>
                                <th>Nama Mata Pelajaran</th>
                                <th>Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($penilaian as $p) {
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td hidden><?= $p->id_kategori ?></td>
                                    <td><?= $p->santri_nama ?></td>
                                    <td><?= $p->mapel_nama ?></td>
                                    <td><?= $p->nilai ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Akhir Dari Konten -->

        </div>
    </div>

    <!-- Import CDN Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Import Javascript Bootstrap -->
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

</body>
<script>
    window.print();
</script>

</html>