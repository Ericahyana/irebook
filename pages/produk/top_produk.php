
<div class="testimonials-news">
		   <div class="clients">
		   	 <h2 class="features">Buku Populer</h2>
             
    			<div class="testimonials">
		   	      <div id="carousel-demo">
		   	      	<div class="wrap">
		                <div id="owl-demo" class="owl-carousel">
                        <?php foreach($produk->getDataTop() as $data) : ?>	
                        <a class="read-more" href="index.php?page=produk-detail&id_buku=<?php echo $data['id_buku'];
							?>"> 	                
		                 <div class="item">
		                	<img class="img-circle"  src="images/novel_img/<?= $data['gambar']; ?>" alt="" />
		                	<h3><?= $data['judul']; ?></h3>
		                	<p>Rp. <?= number_format($data['harga']); ?>,- <br/><?php 
							$data_stok = $produk->getStok($data['id_buku']);
						?>
                          <p>Stok tersedia <b><?= $data_stok['stok']; ?></b> </p>
                          </p>
		                </div>
                        </a>
                           <?php endforeach; ?>
		               </div>
	                </div>
		               <div class="customNavigation">
		                <a class="btn prev"><i class="fa fa-chevron-left"></i></a>
		                <a class="btn next"><i class="fa fa-chevron-right"></i></a>             
		              </div>
		         </div>
		      </div>
	       </div>