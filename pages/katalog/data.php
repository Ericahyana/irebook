<?php if($page=="katalog"){ ?>
<div class="wrap">
	 	<div class="features">
	 		<div class="row">
            <h2> Daftar Katalog </h2>
            <hr/>
              <ul class="list-inline">
              <?php foreach($produk->getKatalog() as $data_ka) : ?>
              <a href="index.php?page=detail_katalog&id_katalog=<?= $data_ka['id_katalog'];?>">
                <li class="list-group-item col-xs-2 "><?= $data_ka['katalog']; ?></li></a>
              <?php endforeach; ?>
              </ul>
   		 </div>
    </div>
</div>
<?php } elseif($page=="detail_katalog") {?>


<div class="wrap">
	 	<div class="features">
	 		<div class="row">
            <h2> Daftar Buku Berdasarkan Katalog </h2>
            <hr/>
                <!-- /.col-lg-4 -->
                <?php foreach($produk->getlistKatalog($_GET['id_katalog']) as $data) : ?>
		       	<div class="col-sm-3" style="display: none;">
                  <img src="images/novel_img/<?= $data['gambar']; ?>" class="col-sm-img" alt="" width="132" height="176" />
                  <div class="col-sm-body">
                  <h2><?= $data['judul']; ?></h2>
		          
                  <h2>Rp. <?= number_format($data['harga']); ?>,-</h2>
                  
                  <?php 
						$data_stok = $produk->getStok($data['id_buku']);
					?>
                  <p>stok : <b><?= $data_stok['stok']; ?></b> </p>
		          <p><a class="read-more" href="index.php?page=produk-detail&id_buku=<?php echo $data['id_buku'];?>">Beli</a></p>
                  </div>
	          </div>
              <?php endforeach; ?>
                <!-- /.col-lg-4 -->
                
                
		      </div>
		   </div>
		 </div>
        




<?php } ?>