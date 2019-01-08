<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?=$title?>Index Kepuasan Masyarakat | Dinas Perhubungan Kota Bekasi</title>

    <link rel="stylesheet" href="<?= base_url('/assets/css/styles.css') ?>">
    <link rel="stylesheet" href="<?= base_url('/assets/plugins/icheck/skins/all.css') ?>">
    <link rel="stylesheet" href="<?= base_url('/assets/plugins/font-awesome/css/font-awesome.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('/assets/plugins/datatables/css/dataTables.bootstrap4.min.css') ?>">

    <script src="<?= base_url('/assets/js/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('/assets/js/jquery/jquery-3.3.1.slim.min.js') ?>"></script>
    <script src="<?= base_url('/assets/js/bootstrap/bootstrap.min.js') ?>"></script>

    <script src="<?= base_url('/assets/plugins/icheck/icheck.min.js') ?>"></script>
    <script src="<?= base_url('/assets/plugins/canvasjs/jquery.canvasjs.min.js') ?>"></script>
    <script src="<?= base_url('/assets/plugins/datatables/js/jquery.dataTables.min.js') ?>"></script>
    <script src="<?= base_url('/assets/plugins/datatables/js/dataTables.bootstrap4.min.js') ?>"></script>
    <script src="<?= base_url('/assets/plugins/tinymce/tinymce.min.js') ?>"></script>

    <script src="<?= base_url('/assets/js/main.js') ?>"></script>
</head>

<body>

    <nav class="navbar fixed-top navbar-light bg-light">
		<div class="container">
            <div class="col-lg-2 text-left">
                <img src="<?= base_url('/assets/img/logo-bekasi-kab.png') ?>" alt="Logo Kota Bekasi" height="80px">
            </div>
            <div class="col-lg-8 text-center">
                <h2>DINAS PERHUBUNGAN KAB. BEKASI</h2>
                <p>UPTD PENGUJIAN KENDARAAN BERMOTOR</p>
            </div>
            <div class="col-lg-2 text-right">
                <img src="<?= base_url('/assets/img/logo-dinas-perhubungan-dishub.png') ?>" alt="Logo Kota Bekasi" height="80px">
            </div>
		</div>
    </nav>
    
    <nav class="navigation">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url() ?>">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('/about') ?>">ABOUT</a>
                        </li>
                    </ul>  
                </div>
                <div class="col-lg-6">
                    <ul class="nav justify-content-end">
                        <?php if (!$this->session->userdata('isLogin')) { ?>
                            <li class="nav-item">
                                <a class="nav-link active" href="<?= base_url('/login') ?>">LOGIN</a>
                            </li>
                        <?php } else { ?>
                            <li class="nav-item">
                                <a class="nav-link active" href="<?= base_url('/survey') ?>">SURVEY</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="<?= base_url('/manage-question') ?>">MANAGE QUESTION</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="<?= base_url('/logout') ?>">LOGOUT</a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <main role="main" class="container bg-darken pt-2">
        <?php if (!$this->session->userdata('isLogin') && !isset($page)) { ?>
            <?php $background = ["bg-02.jpg", "bg-03.jpg"]?>
            <div class="mb-3 mt-5 p-3 bg-white rounded-0 shadow-sm" 
                style="min-height:450px; background: url(<?= isset($find->code) ? base_url('/assets/img/'. $background[rand(0, 1)]) : base_url('/assets/img/bg-01.jpg') ?>); background-size: cover; background-position: left;">
                <?php $this->load->view($container) ?>
            </div>
        <?php } else { ?>
                <?php if (isset($page) && $page == "finish") { ?>
                    <div class="mb-3 mt-5 p-3 bg-white rounded-0 shadow-sm" 
                        style="min-height:450px; background: url(<?= base_url('/assets/img/bg-04.jpg') ?>); background-size: cover; background-position: left;">
                        <?php $this->load->view($container) ?>
                    </div>
                <?php } else { ?>
                    <div class="mb-3 mt-5 p-3 bg-white rounded-0 shadow-sm" style="min-height:450px;">
                    <?php $this->load->view($container) ?>
                <?php } ?>
            </div>
        <?php }?>
	</main>
    
</body>

</html>