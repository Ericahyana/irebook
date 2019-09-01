 <div class="news">
	      	<div class="wrap">
	      	  <h2>Buku / Novel terbaik minggu ini</h2>
	      	  <div class="row">
						<?php foreach($produk->getDataWeekly() as $data) : ?>
 					
		        <div class="col-lg-3 news-grid">
		          <img src="images/novel_img/<?= $data['gambar']; ?>" alt="" />
		          <div class="news-desc">
							<h2><?= $data['judul']; ?></h2>
							<p>Rp. <?= number_format($data['harga']); ?>,- <br/><?php 
							$data_stok = $produk->getStok($data['id_buku']);
						?>
		          <p> <a class="read-more" href="index.php?page=produk-detail&id_buku=<?php echo $data['id_buku'];
							?>"> Read More</a></p>
		            <div class="news-desc-bottom">
		            	<p class="left">Category: Adventure</p>
		            	<p class="right"><i class="fa fa-comment"></i> 125</p>
		               <div class="clear"></div>
		            </div>
		            <div class="image-icon"><span><i class="fa fa-align-left"></i></span></div>
							</div>
						 </div>
							<?php endforeach; ?>	
		       <!-- /.col-lg-4 -->
		      </div>
	      	 </div>
	      </div>
	 </div>