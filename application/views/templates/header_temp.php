<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- SweetAlert 2 borderlessTHeme -->
    <!--<link rel="stylesheet" href="@sweetalert2/theme-borderless/borderless.css">-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url()?>css/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.10.25/b-1.7.1/b-html5-1.7.1/b-print-1.7.1/r-2.2.9/sl-1.3.3/datatables.min.css"/>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type = 'text/javascript' src = "<?php echo base_url(); ?>js/script.js"></script>
    <script type = 'text/javascript' src = "<?php echo base_url(); ?>js/app_script.js"></script>
    
    <script src="https://kit.fontawesome.com/810e0baa68.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.10.25/b-1.7.1/b-html5-1.7.1/b-print-1.7.1/r-2.2.9/sl-1.3.3/datatables.min.js"></script>
    
  </head>
  <body>
    <nav class="navbar navbar-expand d-flex flex-column align-item-start" id="sidebar">
      <div class="row">
        <div class="container-fluid" id="logoContainer">
          <a href="<?= site_url('home')?>" class="navbar-brand">
            <img src="<?= base_url()?>images/logo.png" class="img_layout img-fluid" alt="Ciiteam logo">
          </a>
        </div>
      </div>
      <ul class="ul_nav navbar-nav d-flex flex-column mt-1 w-100">
        <li class="nav-item w-100">
            <a href="<?= site_url('home')?>" 
            class="<?=($this->uri->segment(1)==='home')
            ?'activenavlink nav-link'
            :'navLink nav-link'?>">Dashboard</a>
        </li>
        <?php if($this->session->manage_employee === "1"): ?>
          <li class="nav-item w-100">
              <a href="<?= site_url('empManagement')?>" 
              class="<?=($this->uri->segment(1)==='empManagement' 
              or $this->uri->segment(1)==='empAdd'
              or $this->uri->segment(1)==='EmpManage'
              or $this->uri->segment(1)==='showRequest'
              or $this->uri->segment(1)==='showInactive')
              ?'activenavlink nav-link'
              :'navLink nav-link'?>">
              Manage Employee</a>
          </li>
        <?php endif;?>
        <?php if($this->session->manage_leave === "1"): ?>
          <li class="nav-item w-100">
              <a href="<?= site_url('leaveManagement')?>" 
              class="<?=($this->uri->segment(1)==='leaveManagement' 
              or $this->uri->segment(1)==='manageapproved' 
              or $this->uri->segment(1)==='managecancelled' 
              or $this->uri->segment(1)==='LeaveManage'
              or $this->uri->segment(1)==='assigncredits')
              ?'activenavlink nav-link'
              :'navLink nav-link'?>">Manage Leave</a>
          </li>
        <?php endif;?>
        <?php if($this->session->payroll === "1"): ?>
          <li class="nav-item w-100">
              <a href="<?= site_url('payrollhome')?>"
              class="<?=($this->uri->segment(1)==='payrollhome'
              or $this->uri->segment(1)==='payroll_create')
              ?'activenavlink nav-link'
              :'navLink nav-link'?>">Payroll</a>
          </li>
        <?php endif;?>
        <?php if($this->session->attendance === "1"): ?>
          <li class="nav-item w-100">
              <a href="<?= site_url('attendancehome')?>" 
              class="<?=($this->uri->segment(1)==='attendancehome')
              ?'activenavlink nav-link'
              :'navLink nav-link'?>">Attendance</a>
          </li>
        <?php endif;?>
        <?php if($this->session->resignations === "1"): ?>
          <li class="nav-item w-100">
              <a href="<?= site_url('resignhome')?>" 
              class="<?=($this->uri->segment(1)==='resignhome'
              or $this->uri->segment(1)==='Resigncontroller')
              ?'activenavlink nav-link'
              :'navLink nav-link'?>">
              Resignations</a>
          </li>
        <?php endif;?>
        <?php if($this->session->recruitment === "1"): ?>
          <li class="nav-item w-100">
              <a href="<?= site_url('recruithome')?>" 
              class="<?=($this->uri->segment(1)==='recruithome'
              or $this->uri->segment(1)==='Recruitcontroller'
              or $this->uri->segment(1)==='showschedules')
              ?'activenavlink nav-link'
              :'navLink nav-link'?>">
              Recruitments</a>
          </li>
        <?php endif;?>
        <?php if($this->session->manage_mails === "1"): ?>
          <li class="nav-item w-100">
              <a href="<?= site_url('mailManagement')?>" 
              class="<?=($this->uri->segment(1)==='mailManagement' 
              or $this->uri->segment(1)==='respondedMail' 
              or $this->uri->segment(1)==='MailManage')
              ?'activenavlink nav-link'
              :'navLink nav-link'?>">
              Manage Mails</a>
          </li>
        <?php endif;?>
        <?php if($this->session->manage_admin === "1"): ?>
          <li class="nav-item w-100">
              <a href="<?= site_url('manage_admin')?>" 
              class="<?=($this->uri->segment(1)==='manage_admin' 
              or $this->uri->segment(1)==='Pages')
              ?'activenavlink nav-link'
              :'navLink nav-link'?>">
              Manage Admins</a>
          </li>
        <?php endif;?>
        <?php if($this->session->announcements === "1"): ?>
          <li class="nav-item w-100">
              <a href="<?= site_url('homeAnnouncements')?>" 
              class="<?=($this->uri->segment(1)==='homeAnnouncements' 
              or $this->uri->segment(1)==='searchAnnounce' 
               or $this->uri->segment(1)==='AnnounceManage')
              ?'activenavlink nav-link'
              :'navLink nav-link'?>">
              Announcements</a>
          </li>
        <?php endif;?>
      </ul>
    </nav>
    <section class="my-container">
      <nav class="navTop navbar-light shadow-sm " id="navTop">
        <div class="container-fluid d-flex justify-content-between">
            <button class="btn_toggler btn" id="menuBtn"><i class="fas fa-bars"></i></button>
            <a class="dropBtnAcc nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <?php if($this->session->logged_in):?>
                <?=$this->session->username?>
              <?php endif ?>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" type="button" id="changePass">Change Password</a></li>
              <li><a class="dropdown-item" href="<?= site_url('Pages/logout')?>">Logout</a></li>
            </ul>
        </div>
      </nav>
      