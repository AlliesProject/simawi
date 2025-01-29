<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="../image/logo.png" rel="shortcut icon">
    <title>SIMAWI</title>


    <!-- Bootstrap -->
    <link href="<?php echo base_url() ?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="<?php echo base_url() ?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- NProgress -->
    <link href="<?php echo base_url() ?>assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo base_url() ?>assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- Datatables -->
    <link href="<?php echo base_url() ?>assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- PNotify -->
    <link href="<?php echo base_url() ?>assets/vendors/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">

    
    <link href="<?php echo base_url() ?>assets/vendors/select2/dist/css/select2.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url() ?>assets/build/css/custom.css" rel="stylesheet">


    <!-- jQuery -->
    <script src="<?php echo base_url() ?>assets/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url() ?>assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url() ?>assets/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url() ?>assets/vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url() ?>assets/vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="<?php echo base_url() ?>assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/jszip/dist/jszip.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/pdfmake/build/vfs_fonts.js"></script>

    <script src="<?php echo base_url() ?>assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="<?php echo base_url() ?>assets/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/google-code-prettify/src/prettify.js"></script>

    <script src="<?php echo base_url() ?>assets/js/jquery.mask.min.js"></script>

    <!-- PNotify -->
    <script src="<?php echo base_url() ?>assets/vendors/pnotify/dist/pnotify.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/pnotify/dist/pnotify.buttons.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/pnotify/dist/pnotify.nonblock.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/select2/dist/js/select2.min.js"></script>

    <script type="text/javascript">
      function notiferror(pesane){
       new PNotify({
        title: 'Terjadi Kesalahan!',
        text: pesane,
        type: 'error',
        styling: 'bootstrap3'
      });
     }

     function notifsukses(pesans){
       new PNotify({
        title: 'Berhasil!',
        text: pesans,
        type: 'success',
        styling: 'bootstrap3'
      }); 
     }
   </script>

    <!-- Pesan Sukses-->
    <?php
    $message = $this->session->flashdata('message');
    if ($message){
        if ($message=="simpan") {     
            $notifs = "Berhasil Simpan Data!!!";
        }elseif ($message=="ubah") {  
            $notifs = "Berhasil Ubah Data!!!";
        }elseif ($message=="hapus") {  
            $notifs = "Berhasil Menghapus Data!!!";
        }
    ?>
        <script>
            window.onload = function() {
                notifsukses('<?php echo $notifs;?>');
            }
        </script>
    <?php
    }
    ?>

    <!-- Pesan Error-->
    <?php
    $msgerror = $this->session->flashdata('msgerror');
    if ($msgerror){
      if ($msgerror=="erroremail") {     
        $notife = "Email sudah digunakan!!!";
      }elseif ($msgerror=="errornik") {     
        $notife = "NIK sudah digunakan!!!";
      }elseif ($msgerror=="errorpatient") {     
        $notife = "Pasien sudah daftar hari ini!!!";
      }
    ?>     

        <script>
            window.onload = function() {
                notiferror('<?php echo $notife;?>');
            }
        </script>

    <?php
    } 
    ?>

 </head>

 <body class="nav-md" style="background: #252324;">
  <!--validasi session-->

  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col" style="background: #252324;">
        <div class="left_col scroll-view" style="background: #252324; width:100%;"">
          <div class="profile" align="center" style="background: #ffffff; padding:20px">
            <h1>SIMAWI</h1>
          </div>
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <h3>&nbsp;</h3>
              <ul class="nav side-menu">
                <li><a href="<?php echo base_url() ?>home"><i class="fa fa-home"></i>Dashboard </a></li>
                <?php
                if ($this->session->userdata('role')=='Admin') {
                  ?>
                  <li><a href="<?php echo base_url() ?>user"><i class="fa fa-user"></i>User </a></li>
                  <li><a href="<?php echo base_url() ?>patient"><i class="fa fa-users"></i>Pasien </a></li>
                  <li><a href="<?php echo base_url() ?>registrasi"><i class="fa fa-book"></i>Registrasi Pasien </a></li>
                  <?php
                }elseif ($this->session->userdata('role')=='Doctor') {
                  ?>
                  <li><a href="<?php echo base_url() ?>rekammedis"><i class="fa fa-book"></i>Rekam Medis </a></li>
                  <?php
                }
                ?>
              </ul>
            </div>

          </div>
          <!-- /sidebar menu -->

        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">
        <div class="nav_menu" style="background: #1d83c7; color: white;">
          <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
          </div>
          <nav class="nav navbar-nav">
            <ul class=" navbar-right">
              <li class="nav-item dropdown open" style="padding-left: 15px;">
                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                  <span style="color: white;"><?php echo $this->session->userdata('name'); ?></span>
                </a>
                <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item"  href="<?php echo base_url() ?>login/logout""><i class="fa fa-sign-out pull-right"></i> Keluar</a>
                </div>
              </li>
            </ul>
          </nav>
        </div>
      </div>