
<div class="wrap">
	 	<div class="features">
	 		<div class="row">
            <h2> Daftar Buku Terbaru </h2>
            <hr/>
                <!-- /.col-lg-4 -->
                <?php foreach($produk->getDataNew() as $data) : ?>
		       	<div class="col-sm-3 blogBox moreBox" style="display: none;">
                  <img src="images/novel_img/<?= $data['gambar']; ?>" class="col-sm-img" alt="" width="132" height="176" />
                  <div class="col-sm-body">
                  <h2><?= $data['judul']; ?></h2>
		          
                  <h2>Rp. <?= number_format($data['harga']); ?>,-</h2>
                  
                  <?php 
						$data_stok = $produk->getStok($data['id_buku']);
					?>
                  <p>stok tersedia <b><?= $data_stok['stok']; ?></b> </p>
		          
                    <p><a class="read-more" href="index.php?page=produk-detail&id_buku=<?php echo $data['id_buku'];
							?>">Beli</a></p>
                 </div>
	          </div>
              <?php endforeach; ?>
                <!-- /.col-lg-4 -->
                
                
		      </div>
		   </div>
		   
		   <div id="loadMore" style="">
    		 	 <a href="#">Load More</a>
              	</div>
		 </div>
        