<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Nanti diisi variabel dari controller "title" buat setiap page terus dipanggil disini -->
    <title><?php echo $title ?></title>

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
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="<?php echo base_url().'admin' ?>">Madrasah Diniyah</a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item <?= active_menu('admin') ?>">
                            <a href="<?php echo site_url('admin'); ?>" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item  has-sub <?= active_menu('santri') ?>">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-person-workspace"></i>
                                <span>Data Santri</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item">
                                    <a href="<?php echo base_url() . 'santri/tabel_santri' ?>">Tabel Santri</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="<?php echo base_url() . 'santri/tambah_santri' ?>">Tambah Data Santri</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item  has-sub <?= active_menu('pengajar') ?>">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-collection-fill"></i>
                                <span>Data Pengajar</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="<?php echo base_url() . 'pengajar/table_pengajar' ?>">Tabel Pengajar</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="<?php echo base_url() . 'pengajar/tambah_pengajar' ?>">Tambah Data Pengajar</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item  has-sub <?= active_menu('mapel') ?>">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-book-half"></i>
                                <span>Data Mapel</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="<?php echo base_url() . 'mapel/tabel_mapel' ?>">Tabel Mapel</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="<?php echo base_url() . 'mapel/tambah_mapel' ?>">Tambah Data Mapel</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item  has-sub <?= active_menu('nilai') ?>">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-archive-fill"></i>
                                <span>Data Nilai</span>
                            </a>
                            <ul class="submenu ">
                            <li class="submenu-item ">
                                    <a href="<?php echo base_url() . 'nilai/card_nilai' ?>">List Nilai</a>
                                </li>
                                <!-- <li class="submenu-item ">
                                    <a href="<?php echo base_url() . 'nilai/tabel_nilai' ?>">Tabel Nilai</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="<?php echo base_url() . 'nilai/tambah_nilai' ?>">Tambah Data Nilai</a>
                                </li> -->
                            </ul>
                        </li>

                        <li class="sidebar-item <?= active_menu('tentang') ?>">
                            <a href="<?php echo base_url().'tentang/tentang' ?>" class='sidebar-link'>
                                <i class="bi bi-people-fill"></i>
                                <span>Tentang</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main" class="pt-0">
            <header class="my-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <header class='mb-3'>
                <nav class="navbar navbar-expand navbar-light p-0 bg-white rounded">
                    <div class="container-fluid">
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            </ul>
                            <div class="dropdown">
                                <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="user-menu d-flex">
                                        <div class="user-name text-end me-3">
                                            <h6 class="mb-0 text-gray-600"><?php echo $this->session->userdata('nama'); ?></h6>
                                            <p class="mb-0 text-sm text-gray-600">Administrator</p>
                                        </div>
                                        <div class="user-img d-flex align-items-center">
                                            <div class="avatar avatar-md">
                                                <img src="<?php echo base_url() . 'assets/images/faces/1.jpg' ?>">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton" style="min-width: 11rem;">
                                    <li>
                                        <h6 class="dropdown-header">Hello, <?php echo $this->session->userdata('nama'); ?></h6>
                                    </li>
                                    <!-- <li>
                                        <hr class="dropdown-divider">
                                    </li> -->
                                    <li><a class="dropdown-item" href="<?php echo base_url().'admin/logout'?>"><i class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>