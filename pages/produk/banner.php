 <div class="header-banner">
	        	
			    <!-- Carousel ================================================== -->
			    <div id="myCarousel" class="carousel slide" data-ride="carousel">
			     <div class="wrap">
			      <div class="carousel-inner">
			        <div class="item active">
							<!--<div class="row">
							?php foreach($produk->getDataNew() as $data_baner): ?>
			           
				        	<div class="col-md-6">
				          <div class="banner-desc">
				        	<h2><?= $data_baner['judul'] ?></h2>
									<?php $data_stok = $produk->getStok($data_baner['id_buku']); ?>
				            <ul><li><span><i class="fa fa-chevron-right"></i>Stok Tersedia : <?=  $data_stok['stok']; ?></span></li>
				            <li><span><i class="fa fa-chevron-right"></i>Rp .<?= number_format($data_baner['judul']) ?></span></li>
				          </ul>
				          <div class="see-features"><a href="index.php?page=produk-detail&id_buku=<?php echo $data_baner['id_buku'];
							?>">Lihat detail</a></div>
				          </div>
				        </div>
				        <div class="col-md-6">
				        	<div class="banner-img">
			                <img src="images/novel_img/<?= $data_baner['gambar'] ?>" alt="First slide" />
			             </div>
				        </div>
						<	?php endforeach; ?
				      </div>	 -->
			        
			         <div class="item">   
                	<div class="row">
			          		<div class="col-md-6">
				        			<div class="banner-img">
			               	 <img src="images/novel_img/terry-goodkind.jpg" alt="First slide" />
			             		</div>
				       	 		</div>
				        			<div class="col-md-6">
				        				<div class="banner-desc">
				        					<h2>Terry Goodkind</h2>
				          					<ul><li><span><i class="fa fa-chevron-right"></i>By Eri</span></li>
				           						<li><span><i class="fa fa-chevron-right"></i>Rp . 51.000,00</span></li>
				          					</ul>
				          			<div class="see-features"><a href="detail.html">Lihat detail</a></div>
				          		</div>
				         		</div>
				      		</div>
			        	</div>
</div>

             <div class="item">
                     
			         <div class="row">
				        <div class="col-md-6">
				          <div class="banner-desc">
				        	<h2>Harry Poter </h2>
				          <ul><li><span><i class="fa fa-chevron-right"></i>By Eri</span></li>
				            <li><span><i class="fa fa-chevron-right"></i>Rp . 67.000,00</span></li>
				          </ul>
				          <div class="see-features"><a href="detail.html">Lihat detail</a></div>
                          </div>
				        </div>
				        <div class="col-md-6">
				        	<div class="banner-img">
			                <img src="images/novel_img/harryp.jpg" alt="First slide" />
			             </div>
				        </div>
				      </div>
			        </div>
			         <div class="item">
                     
                     <div class="row">
			          	<div class="col-md-6">
				        	<div class="banner-img">
			                <img src="images/novel_img/seaofrust.jpg" alt="First slide" />
			             </div>
				        </div>
				        <div class="col-md-6">
				        	<div class="banner-desc">
				        	<h2>Sea Of Rush</h2>
				          <ul><li><span><i class="fa fa-chevron-right"></i>By Eri</span></li>
				            <li><span><i class="fa fa-chevron-right"></i>Rp .57.000,00</span></li>
				          </ul>
				          <div class="see-features"><a href="detail.html">Lihat detail</a></div>
				          </div>
				         </div>
				      </div>
			        </div>
                    <div class="item">
                     
			          <div class="row">
				        <div class="col-md-6">
				          <div class="banner-desc">
				        	<h2>Intocaling Love</h2>
				          <ul><li><span><i class="fa fa-chevron-right"></i>By Eri</span></li>
				            <li><span><i class="fa fa-chevron-right"></i>Rp .49.000,00</span></li>
				          </ul>
				          <div class="see-features"><a href="detail.html">Lihat detail</a></div>
                          </div>
				        </div>
				        <div class="col-md-6">
				        	<div class="banner-img">
			                <img src="images/novel_img/intoxicial.jpg" alt="First slide" />
			             </div>
				        </div>
				      </div>
			        </div>       
			       </div>
			      </div>
			      <a class="left carousel-control left-arrow" href="#myCarousel" data-slide="prev"><span><i class="fa fa-chevron-left"></i></span></a>
			      <a class="right carousel-control right-arrow" href="#myCarousel" data-slide="next"><span><i class="fa fa-chevron-right"></i></span></a>
			    </div><!-- /.carousel -->
	           </div>
	          <span class="big-arrow"></span>
             </div>