<?php 
		$data_cari=null;
	if(isset($_GET['judul'])) {
		$data_cari= $_GET['judul'];
	}
    ?>
<div class="wrap">
	 	<div class="features">
        <h2> Cari Buku</h2>
         <div class="subscribe">
			    	<form action="controllers/cari/cari.php" method="post">
			    		<input type="text" name="judul"placeholder="Cari" />
			    		<button type="submit" class="btn btn-success btn-lg" ><span class="fa fa-search"> Cari</span></button>
			    	</form>
			    </div>
	 		<div class="row">
            
            <hr/>
            <?php if($data_cari):?>
                <!-- /.col-lg-4 -->
                <?php foreach($produk->cariBuku($data_cari) as $data) : ?>
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
                
                <?php endif; ?>
		      </div>
		   </div>
		 </div>
        