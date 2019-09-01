	<?php
   		session_start();
		include "class/db.php";
		include "class/produk.php";
		include "class/akun.php";
		$produk = new Produk();
        $akun = new Akun();
        $data_cus = null;
        if(isset($_GET['id_cus'])) {
            $data_cus = $akun->getDetailCus($_GET['id_cus']);
		}else if(isset($_SESSION['id_cus'])) {
            $data_cus = $akun->getDetailCus($_SESSION['id_cus']);
		}
		$cart=0;
		if (isset($_SESSION['item'])) {
			foreach ($_SESSION['item'] as $jml) {
				$cart++;
			}
		}
		// Cek Halaman Yang Dituju
		array_key_exists('page', $_GET) ? $page = $_GET['page'] : $page= 'home';
	?>

<!DOCTYPE HTML>
<html>
	<head>
        <title>IreBook |
        <?php if(!$page || $page=='home'){ echo 'Home';  }
          if(!$page || $page=='daftar_buku'){ echo 'Daftar Buku';  }
          if(!$page || $page=='katalog'){ echo 'Katalog';  }
          if(!$page || $page=='diskon'){ echo 'Diskon'; }
          if(!$page || $page=='ketegori'){ echo 'Kategori'; }
          if(!$page || $page=='about'){ echo 'Tentang Kami'; }
          if(!$page || $page=='contact'){ echo 'Kontak'; }
          if(!$page || $page=='produk-detail'){ echo 'Detail Buku'; }
          if(!$page || $page=='keranjang'){ echo 'Keranjang'; } ?>
        </title>
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="shortcut icon" href="images/icon/icon.png">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800,600,300' rel='stylesheet' type='text/css'>
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <link href="bootstrap/css/style.css" rel="stylesheet" type="text/css" media="all" />
        <link href="bootstrap/css/font-awesome.css" rel="stylesheet" type="text/css" media="all" />
        <link href="bootstrap/css/carousel.css" rel="stylesheet" type="text/css" media="all" />
        <link href="bootstrap/css/owl.carousel.css" rel="stylesheet" type="text/css" media="all" />
        <link href="bootstrap/css/style_cart.css" rel="stylesheet" type="text/css" media="all" />
        <link href="bootstrap/css/load-more-button.css" rel="stylesheet" type="text/css" media="all" />
   <!-- sweet arlet -->
        <link href="bootstrap/arlet/css/sweetalert.css" rel="stylesheet" type="text/css" media="all"/>

    <!-- -->
	<style type="text/css">
		.via{
				display: none;
				margin-top: 1px;
			}

    #output_image
    {
     max-width:560px;
	 max-height:330px;
	 min-width:560px;
	 min-height:330px;
    }
	</style>
	<style>
    .example-modal .modal {
      position: relative;
      top: auto;
      bottom: auto;
      right: auto;
      left: auto;
      display: block;
      z-index: 1;
    }

    .example-modal .modal {
      background: transparent !important;
    }
  </style>

		<script src="bootstrap/js/jquery-1.10.2.min.js" type="text/javascript"></script>
        <script src="bootstrap/js/bootstrap.js" type="text/javascript"></script>
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="bootstrap/js/owl.carousel.js" type="text/javascript"></script>
        <?php if($page=="home"||$page=="daftar_buku"){?>
        <script src="bootstrap/js/load-more-button.js" type="text/javascript"></script>
    	<?php }else{?>
        <script src="bootstrap/js/allproduk.js" type="text/javascript"></script>
    	<?php }?>
    <!--sweet arlet -->

		<script src="bootstrap/alert/js/sweetalert.min.js"></script>
        <script src="bootstrap/alert/js/qunit-1.18.0.js"></script>
    <!-- back to top -->
	<script type="text/javascript" src="bootstrap/js/back-to-top.js"></script>
	  <script>
        $(document).ready(function() {

          var owl = $("#owl-demo");

          owl.owlCarousel({

          items :4, //10 items above 1000px browser width
          itemsDesktop : [1000,4], //5 items between 1000px and 901px
          itemsDesktopSmall : [900,3], // 3 items betweem 900px and 601px
          itemsTablet: [600,2], //2 items between 600 and 0;
          itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option

          });

          // Custom Navigation Events
          $(".next").click(function(){
            owl.trigger('owl.next');
          })
          $(".prev").click(function(){
            owl.trigger('owl.prev');
          })

        });
        </script>

  <!-- sweet arlet-->
    		 <script>
    		    function normal () {
     		   alert("Normal Alert!");
   			    }
    		    function sweet (){
     		 	 swal({
					  icon: "success",
					});
    		    }
				function error (){
				swal({
					title: 'Stock Telah Habis',
					text:  'Belilah buku yg menarik lain nya !!',
					type: 'error',
					showConfirmButton: true
				});

    		    }

				function BelumLogin() {
					alert("OOPSS, Sepertinya anda belum Melakukan login !!\nSilahkan login terlebih dahulu !");
				}
				function info (){
     		   alert("Perhatian !", "perhatian!", "info");
    		    }
        </script>

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
<!-- //Remove-Item-JavaScript -->
</head>
<body>


	<!-- Back to top -->

		<div id='Back-to-top'>
        <img alt='Scroll to top' src='images/back-to-top.png'/>
        </div>

   <!-- Start Header -->
   		<?php include "pages/top_header.php"; ?>
        <?php include "pages/mid_header.php"; ?>
	<!--<	?php if($page=="home"){include "pages/produk/banner.php";}?> -->

   <!-- End Header -->

   <!-- Start Main Content -->
	 <div class="main">
		 			<?php
						//redirect ke halaman data produk
						if($page=="home"){
							include "pages/produk/data.php";
							include "pages/produk/top_produk.php";
							include "pages/produk/top_weekly.php";
						}
						//redirect ke halaman daftar buku
						elseif($page=="daftar_buku"){
							include "pages/produk/all_data.php";
							include "pages/produk/top_produk.php";
							include "pages/produk/top_weekly.php";
						}
						//redirect ke halaman katalog
						elseif($page=="katalog"||$page=="detail_katalog"){
							include "pages/katalog/data.php";
							include "pages/produk/top_produk.php";
							include "pages/produk/top_weekly.php";
						}
						//redirect ke halaman keranjang
						elseif($page=="keranjang"){
							include "pages/keranjang/data.php";
							include "pages/produk/top_produk.php";
							include "pages/produk/top_weekly.php";
						}
						//redirect ke halaman kategori
						elseif($page=="kategori"||$page=="kategori_detail"){
							include "pages/kategori/data.php";
							include "pages/produk/top_produk.php";
							include "pages/produk/top_weekly.php";
						}
						//redirect ke halaman tentang kami
						elseif($page=="tentang"){
							include "pages/tentang.php";
						}
						//redirect ke halaman kontak
						elseif($page=="kontak"){
							include "pages/kontak.php";
						}//redirect ke halaman user
						elseif($page=="user"){
							include "pages/akun/data.php";
						}
						elseif($page=="detail_transaksi"){
							include "pages/akun/detail_transaksi.php";
						}
						elseif($page=="checkout"){
							include "pages/checkout/data.php";
						}elseif($page=="selesai"){
							include "pages/checkout/selesai.php";
						}
						//redirect ke halaman detail produk
						elseif($page=="produk-detail"){
							include "pages/produk/detail.php";
							include "pages/produk/top_produk.php";
							include "pages/produk/top_weekly.php";
						}//redirect ke halaman detail produk

						elseif($page=="cari"){
							include "pages/produk/cari.php";
							include "pages/produk/top_produk.php";
							include "pages/produk/top_weekly.php";

						}else{
							include "pages/404.php";
						}


							?>
    </div>
   <!-- End Main Content -->

  <!-- Start Footer -->
       <span class="footer-arrow"></span>
       <div class="footer">
       	 <div class="wrap">
		  <div class="row">
			   <div class="col-lg-6">
               <h2>Tentang Kami</h2>
              	<ul style="color:#FFFFFF">
                     <li class="icon">Kp. pamoyanan Rt02/13, Bandung Barat.</li>
                     <li class="icon">089-86897962</li>
                     <li class="icon">WA: 08986897962</li>
             	</ul>
			    <ul class="links">
			    	<li><a href="#">About</a> /</li>
			    	<li><a href="#">Term of Services</a> /</li>
			    	<li><a href="#">Press</a> /</li>
			    	<li><a href="#">Staff</a> /</li>
			    	<li><a href="#">News</a></li>
			    </ul>
			   </div>
			    <div class="col-lg-6">
			     <h2>Payment Method</h2>
			     <div class="products-list">
			     <ul>
                    <li class="icon"><img alt="bca" src="images/bca.png"></li>
                    <li class="icon"><img alt="bri" src="images/bri.png"></li>
                    <li class="icon"><img alt="bni" src="images/bni.png"></li>
                    <li class="icon"><img alt="mandiri" src="images/mandiri.png"></li>
                    <li class="icon"><img alt="kartu kredit" src="images/credit_card.png"></li>

             	</ul>
                <h2>Shipping Method</h2>
			     <div class="products-list">
			     <ul>

                <li class="icon"></li>
                <li class="icon"><img alt="sicepat" src="images/sicepat.png"></li>
                <li class="icon"><img alt="tiki" src="images/tiki.png"></li>
                <li class="icon"><img alt="pos" src="images/pos.png"></li>
			     </ul>
			     <div class="clear"></div>
			    </div>
			     <div class="subscribe">
			    	<form>
			    		<input type="text" placeholder="youremail@domain.com" />
			    		<input type="submit" value="Subscribe" />
			    	</form>
			    </div>
			   </div>
               </div>
			  </div>
			 </div>
		   </div>
			 <div class="footer-bottom">
			 	<div class="wrap">
			 	<div class="copy-right">
			 		<p>IREBOOK Copyright &copy; 2018 </p>
			 	</div>
			 	<div class="social-icons">
			 		<ul>
			 			<li><a href="#"><i class="fa fa-twitter"></i></a></li>
			 			<li><a href="#"><i class="fa fa-facebook"></i></a></li>
			 			<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
			 			<li><a href="#"><i class="fa fa-rss"></i></a></li>
			 			<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
			 		</ul>
			 	</div>
			 	<div class="clear"></div>
			 </div>
	       </div>
  <!-- End Footer -->
  </body>
</html>
