
 <div class="header-logo-nav">
             	  <div class="navbar navbar-inverse navbar-static-top nav-bg" role="navigation">
				      <div class="container">
				        <div class="navbar-header">
				          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				            <span class="sr-only">Toggle navigation</span>
				            <span class="icon-bar"></span>
				            <span class="icon-bar"></span>
				            <span class="icon-bar"></span>				          </button>
				         <div class="logo"> <a class="navbar-brand" href="index.html"><img src="images/logo.png" alt="" /></a></div>
				          <div class="clear"></div>
				        </div>
				        <div class="collapse navbar-collapse">
				          <ul class=" menu nav navbar-nav">
				            <li class="<?php if(!$page || $page=='home'){ echo 'active';  }?>"><a href="index.php?page=home">Home</a></li>
				            <li class="<?php  if(!$page || $page=='daftar_buku'){ echo 'active';  }?>"><a href="index.php?page=daftar_buku">Daftar Buku</a></li>
				            <li class="<?php  if($page=="detail_katalog" || $page=='katalog'){ echo 'active';  }?>"><a href="index.php?page=katalog">Katalog</a></li>
                            <li class="<?php  if(!$page || $page=='kategori'){ echo 'active'; } ?>"><a href="index.php?page=kategori">Kategori</a></li>
				            <li class="<?php  if(!$page || $page=='tentang'){ echo 'active'; } ?>"><a href="index.php?page=tentang">Tentang Kami</a></li>
				            <li class="<?php  if(!$page || $page=='kontak'){ echo 'active'; } ?>"><a href="index.php?page=kontak">Kontak</a></li>
							<li class="<?php  if(!$page || $page=='cari'){ echo 'active'; } ?>"><a href="index.php?page=cari" ><img src="images/search.png" height="15px" width="15px"/></a>
                              </li>
                            <li class="<?php  if(!$page || $page=='keranjang'){ echo 'active'; } ?>"><a href="index.php?page=keranjang" >
														<img src="images/cart.png" height="15px" width="15px"/> Cart ( <?= $cart; ?> )
                            </a>
                              </li>
				          </ul>
				        </div><!--/.nav-collapse -->
				      </div>
				    </div>
   <div class="clear"></div>
	        </div>
