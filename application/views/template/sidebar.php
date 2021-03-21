<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url('assets/');?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url('assets/');?>https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url('assets/');?>css/sb-admin-2.min.css" rel="stylesheet">



  <!-- Custom styles for this page -->
  <link href="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>
<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">sisdigka </div>
      </a>

       <hr class="sidebar-divider my-0">

       <?php if($this->session->userdata('role') == 1){ ?>
         <!-- Nav Item - Dashboard -->
      <li <?= $this->uri->segment(2) == '' ? 'class="nav-item active"' : '' ?> class="nav-item ">
        <a class="nav-link" href="<?= base_url('welcome') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Mekanik</span></a>
      </li>

       <hr class="sidebar-divider my-0">

        <li <?= $this->uri->segment(2) == 'kendaraan_masuk' ? 'class="nav-item active"' : '' ?> class="nav-item ">
        <a class="nav-link" href="<?= base_url('welcome/kendaraan_masuk') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>kendaraan masuk</span></a>
      </li>

       <hr class="sidebar-divider my-0">

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

       <?php }else if($this->session->userdata('role') == 2){ ?>
         
      <hr class="sidebar-divider my-0">

      <li <?= $this->uri->segment(2) == 'dashboard' ? 'class="nav-item active"' : '' ?> class="nav-item ">
        <a class="nav-link" href="<?= base_url('mekanik') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
         <li <?= $this->uri->segment(2) == '' ? 'class="nav-item active"' : '' ?> class="nav-item ">
        <a class="nav-link" href="<?= base_url('mekanik') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Diagnosa Kendaraan</span></a>
      </li>

      
      <!-- Divider -->
      <hr class="sidebar-divider my-0">


     

       <?php }else{ ?>
      <li <?= $this->uri->segment(2) == 'view_penilaian' ? 'class="nav-item active"' : '' ?> class="nav-item ">
        <a class="nav-link" href="<?= base_url('welcome/view_penilaian') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Hasil Penilaian</span></a>
      </li>
    <?php } ?>
      
      <!-- Divider -->
      <hr class="sidebar-divider my-0">
     
        <!-- Nav Item - Dashboard -->
      <li  class="nav-item ">
        <a class="nav-link" href="<?= base_url('login/logout') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Logout </span></a>
      </li>


    
     
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->
