<!doctype html>
<html lang="en">
<head>  
    <meta charset="utf-8">
    <title>Rmit University</title>
    <meta content="VAP" name="author" />
    <meta name="og:title" content="Rmit Universit" />
    <meta name="og:description" content="" />
    <meta name="og:image" content="" />
    <meta property="og:url" content="">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Rmit Universit">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url('images/logo.ico'); ?>">
    <!-- plugin css -->
    <link href="<?= base_url('public/backend/'); ?>assets/libs/jsvectormap/css/jsvectormap.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="<?= base_url('public/backend/'); ?>assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url('public/backend/'); ?>assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="<?= base_url('public/backend/'); ?>assets/libs/spectrum-colorpicker2/spectrum.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url('public/backend/'); ?>assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet">
    <!-- DataTables -->
    <link href="<?= base_url('public/backend/'); ?>assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url('public/backend/'); ?>assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url('public/backend/'); ?>assets/libs/datatables.net-select-bs4/css/select.bootstrap4.min.css" rel="stylesheet" type="text/css">

    <!-- Responsive datatable examples -->
    <link href="<?= base_url('public/backend/'); ?>assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css">     
    <script src="<?= base_url('public/backend/'); ?>assets/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="<?= base_url('public/backend/'); ?>assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css">
    <!-- Icons Css -->
    <link href="<?= base_url('public/backend/'); ?>assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <!-- App Css-->
    <link href="<?= base_url('public/backend/'); ?>assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css">
    <script src="<?= base_url('public/backend/'); ?>ckeditor/ckeditor.js"></script>
    <script src="<?= base_url('public/backend/'); ?>ckfinder/ckfinder.js"></script>
</head>

<body data-sidebar="colored">
    
    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">
            
            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                      <!-- LOGO -->
                      <div class="navbar-brand-box">
                        <a href="" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="<?= base_url('public/frontent/assets/img/logo.png'); ?>" alt="logo-sm-dark" height="24">
                            </span>
                        </a>

                        <a href="" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="<?= base_url('public/frontent/assets/img/logo.png'); ?>" alt="logo-sm-light" height="24">
                            </span>
                            <span class="logo-lg">
                                <img src="<?= base_url('public/frontent/assets/img/logo.png'); ?>" alt="logo-light" height="25">
                            </span>
                        </a>
                    </div>

                    <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect vertical-menu-btn" id="vertical-menu-btn">
                        <i class="ri-menu-2-line align-middle"></i>
                    </button>
                    
                    <!-- start page title -->
                    <div class="page-title-box align-self-center d-none d-md-block">
                        <h4 class="page-title mb-0 text-uppercase"><?php if(isset($title)){ echo $title; }else{ echo 'Rmit university'; } ?></h4>
                    </div>
                    <!-- end page title -->
                </div>

                <div class="d-flex">


                    <div class="dropdown d-none d-lg-inline-block ms-1">
                        <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                            <i class="ri-fullscreen-line"></i>
                        </button>
                    </div>
                    
                </div>
            </div>
        </header>

        <!-- ========== Left Sidebar Start ========== -->
        <div class="vertical-menu">

           <!-- LOGO -->
           <div class="navbar-brand-box">
            <a href="" class="logo logo-dark">
                <span class="logo-sm">
                    <img src="<?= base_url('public/backend/'); ?>assets/images/logo-sm-dark.png" alt="logo-sm-dark" height="24">
                </span>
                <span class="logo-lg">
                    <img src="<?= base_url('public/backend/'); ?>assets/images/logo-dark.png" alt="logo-dark" height="22">
                </span>
            </a>

            <a href="" class="logo logo-light">
                <span class="logo-sm">
                    <img src="<?= base_url('public/frontent/assets/img/logo.png'); ?>" alt="logo-sm-light" height="24">
                </span>
                <span class="logo-lg">
                    <img src="<?= base_url('images/logo.png'); ?>" alt="logo-light" height="22">
                </span>
            </a>
        </div>

        <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect vertical-menu-btn" id="vertical-menu-btn">
            <i class="ri-menu-2-line align-middle"></i>
        </button>

        <div data-simplebar="" class="vertical-scroll">

            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <!-- Left Menu Start -->
                <?php $this->load->view('backend/layout/v_menu'); ?>

            </div>
            <!-- Sidebar -->
        </div>

        <div class="dropdown px-3 sidebar-user sidebar-user-info">
            <button type="button" class="btn w-100 px-0 border-0" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                        <img src="<?= base_url('images/logo.png'); ?>" class="img-fluid header-profile-user rounded-circle" alt="">
                    </div>

                    <div class="flex-grow-1 ms-2 text-start">
                        <span class="ms-1 fw-medium user-name-text">Admin</span>
                    </div>

                    <div class="flex-shrink-0 text-end">
                        <i class="mdi mdi-dots-vertical font-size-16"></i>
                    </div>
                </span>
            </button>
            <div class="dropdown-menu dropdown-menu-end">
                <!-- item-->
                <a class="dropdown-item" href="<?= base_url('edit-password'); ?>"><i class="fa-solid fa-lock-open" style="color: #000"></i> <span class="align-middle">Đổi mật khẩu</span></a>
                <a class="dropdown-item" href="<?= base_url('logout'); ?>"><i class="fa-solid fa-arrow-right-from-bracket" style="color: #000"></i> <span class="align-middle">Đăng xuất</span></a>
            </div>
        </div>

    </div>

    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">
                
                <?php $this->load->view('backend/layout/v_noti'); ?>
                
                