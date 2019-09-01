	<?php
    include "../class/akun.php";
    include "../class/produk.php";
    include "../class/Transaksi.php";
    $produk = new Produk();
    $transaksi = new Transaksi();
		session_start();

        $akun = new Akun();
        $data = null;
        if(isset($_GET['id_su'])) {
            $data = $akun->getDetailSu($_GET['id_su']);
		}else if(isset($_SESSION['id_su'])) {
            $data = $akun->getDetailSu($_SESSION['id_su']);
		}else{
			header("location: ../index.php");
		}
	?>

    <?php
		// Cek Halaman Yang Dituju
		array_key_exists('page', $_GET) ? $page = $_GET['page'] : $page= 'dashboard';
	?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin IB | <?php if(!$page || $page=='dashboard'){ echo 'Dashboard';  }?>
        <?php  if(!$page || $page=='daftar_buku'){ echo 'Daftar Buku';  }?>
        <?php  if(!$page || $page=='tambah_buku'){ echo 'Tambah Buku';  }?>
        <?php  if(!$page || $page=='detail_buku'){ echo 'Detail Buku';  }?>
        <?php  if(!$page || $page=='detail_akun'){ echo 'Detail Akun';  }?>
         <?php  if(!$page || $page=='top_buku'){ echo 'Top Buku';  }?>
        <?php  if(!$page || $page=='katalog'){ echo 'Katalog';  }?>
        <?php  if(!$page || $page=='diskon'){ echo 'Diskon'; } ?>
        <?php  if(!$page || $page=='ketegori'){ echo 'Kategori'; } ?>
        <?php  if(!$page || $page=='admin'){ echo 'Admin'; } ?>
        <?php  if(!$page || $page=='customer'){ echo 'Customer'; } ?>
        <?php  if(!$page || $page=='cetak_customer'){ echo 'Cetak Pelanggan'; } ?>
        <?php  if(!$page || $page=='cetak_pembelian'){ echo 'Cetak Pembelian'; } ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- icon -->
  <link rel="shortcut icon" href="../images/icon/icon.png">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">

  <link rel="stylesheet" href="../bootstrap/css/main.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bootstrap/css/font-awesome.css">
  <link rel="stylesheet" href="../bootstrap/css/jquery-ui.min.css">

        <link href="../bootstrap/css/ionicons.min.css" rel="stylesheet" type="text/css" media="all" />
  <!-- Theme style -->
  <link rel="stylesheet" href="../bootstrap/dist/css/AdminLTE.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../bootstrap/dist/css/skins/_all-skins.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link media="all" type="text/css" rel="stylesheet" href="../bootstrap/css/bootstrap-select.min.css">

	<style>

    #output_image
    {
     max-width:300px;
	 max-height:350px;
	 mim-width:300px;
	 min-height:350px;
    }


	#Back-to-top {
		width: 40px;
		height: 40px;
		text-align: center;
		z-index: 9999;
		position: fixed;
		bottom: 20px;
		right: 30px;
		cursor: pointer;
		display: none;
		opacity: 0.7;
		border: 2px solid #FFFFFF;
		border-radius: 50%;

		margin:5px;
		padding:5px;
		background-color:#000000;
		}
	#Back-to-top:hover {
		opacity: 1;
		}
    </style>
	<script src="../bootstrap/js/jquery-1.12.4.js"></script>

	<script type="text/javascript" src="../bootstrap/js/back-to-top.js"></script>
	  <script>
		  $( function() {
		$( "#datepicker" ).datepicker({
		  changeMonth: true,
		  changeYear: true,
		  format: 'MM-DD-YYYY'
		});
	  } );
  </script>
</head>
<body class="hold-transition skin-blue-light sidebar-mini">

<?php if($data) : ?>

<div class="wrapper">
<div id='Back-to-top'>
		<h2 style="color:#FFFFFF;">^</h2>

        </div>
  <header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>I</b>B</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b> IB</span>    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../bootstrap/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?= $data['nama_su']; ?></span>            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../bootstrap/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  <?= $data['nama_su']; ?> - Web Developer
                  <small>Admin sejak Juli. 2018</small>                </p>
              </li>
              <!-- Menu Body -->

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>                </div>
                <div class="pull-right">
                  <a href="../pages/akun/logout.php" class="btn btn-default btn-flat">Sign out</a>                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
 <?php
 include "../pages/admin/navigasi.php";
 ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?php if(!$page || $page=='dashboard'){ echo 'Dashboard';  }?>
        <?php  if(!$page || $page=='daftar_buku'){ echo 'Daftar Buku';  }?>
        <?php  if(!$page || $page=='tambah_buku'){ echo 'Tambah Buku';  }?>
        <?php  if(!$page || $page=='detail_buku'){ echo 'Detail Buku';  }?>
        <?php  if(!$page || $page=='detail_akun'){ echo 'Detail Akun';  }?>
        <?php  if(!$page || $page=='update_akun'){ echo 'Update Akun';  }?>
        <?php  if(!$page || $page=='stok_buku')  { echo 'Stok Buku';    }?>
        <?php  if(!$page || $page=='top_buku'){ echo 'Top Buku';  }?>
        <?php  if(!$page || $page=='katalog'){ echo 'Katalog';  }?>
        <?php  if(!$page || $page=='kategori'){ echo 'Kategori'; } ?>
        <?php  if(!$page || $page=='akun'){ echo 'Akun'; } ?>
        <?php  if(!$page || $page=='stok_buku')  { echo 'Stok Buku';    }?>
        <?php  if(!$page || $page=='cetak_customer'){ echo 'Cetak Pelanggan'; } ?>
        <?php  if(!$page || $page=='cetak_pembelian'){ echo 'Cetak Pembelian'; } ?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    				<?php
						//redirect ke halaman data produk
						if($page=="dashboard"){
							include "../pages/admin/data2.php";

						}

						//page untuk buku
						if($page=="daftar_buku"){
							include "../pages/admin/buku/buku.php";
						}
						//page untuk tambah buku
						if($page=="tambah_buku"){
							include "../pages/admin/buku/tambah_buku.php";
						}
						//page untuk detail buku
						if($page=="daftar_buku_detail"){
							include "../pages/admin/buku/detail_buku.php";
						}
						//page untuk tambah buku
						if($page=="update_buku"){
							include "../pages/admin/buku/update_buku.php";
						}

						//page untuk kategori
						if($page=="kategori" || $page=="kategori-update" || $page=="kategori-delete"){
							include "../pages/admin/buku/kategori.php";
						}

						//page untuk katalog
						if($page=="katalog" || $page=="katalog-update" || $page=="katalog-delete"){
							include "../pages/admin/buku/katalog.php";
						}
						//page untuk diskon
						if($page=="stok_buku"){
							include "../pages/admin/buku/stok_buku.php";
						}
						//page untuk diskon
						if($page=="update_stok"){
							include "../pages/admin/buku/stok_buku.php";
						}
						//page untuk admin
						if($page=="akun"  || $page=="akun-update" || $page=="akun-delete"){
							include "../pages/admin/akun/akun.php";
						}
						//page untuk tambah akun
						if($page=="tambah_akun"){
							include "../pages/admin/akun/tambah_akun.php";
						}
						//page untuk detail akun
						if($page=="detail_akun"){
							include "../pages/admin/akun/detail_akun.php";
						}
						//page untuk update akun
						if($page=="update_akun"){
							include "../pages/admin/akun/update_akun.php";
						}

						//page untuk detail akun
						if($page=="edit_su"){
							include "../pages/admin/akun/edit_akun.php";
						}
						//page untuk detail akun
						if($page=="edit_cus"){
							include "../pages/admin/akun/edit_akun.php";
            }
            //page untuk
						if($page=="konfirm_beli"){
							include "../pages/admin/konfirm_beli.php";
            }
            
						



					?>

      <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>By</b> Eri   </div>
    <strong>Copyright &copy; 2018-2019 <a href="#">IRE BOOK</a>.</strong> All rights
    reserved.  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>          </li>
        </ul>
        <!-- /.control-sidebar-menu -->
      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->


<script type='text/javascript'>
function preview_image(event)
{
 var reader = new FileReader();
 reader.onload = function()
 {
  var output = document.getElementById('output_image');
  output.src = reader.result;
 }
 reader.readAsDataURL(event.target.files[0]);
}
</script>


<script src="../bootstrap/js/upload.js" type="text/javascript"></script>
<script src="../bootstrap/js/jquery-ui.js" type="text/javascript"></script>
<script src="../bootstrap/js/jquery.form.js" type="text/javascript"></script>
<script src="../bootstrap/js/dropzone.js"></script>
<!-- jQuery 3 -->
<script src="../bootstrap/js/jquery-1.10.2.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../bootstrap/js/jquery-ui.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->

<script src="../bootstrap/js/bootstrap.min.js"></script>

<script src="../bootstrap/js/bootstrap-select.min.js"></script>
<!-- AdminLTE App -->
<script src="../bootstrap/dist/js/adminlte.min.js"></script>
<script src="../bootstrap/dist/js/demdo.js"></script>
 <?php endif; ?>
</body>
</html>
