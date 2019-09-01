<?php if($page=="kategori"){ ?>
<div class="wrap">
	 	<div class="features">
	 		<div class="row">
            <h2> Daftar Kategori </h2>
            <hr/>
              <ul class="list-inline">
              <?php foreach($produk->getKategori() as $data) : ?>
              <a href="index.php?page=kategori_detail&id_kategori=<?= $data['id_kategori'];?>">
                <li class="list-group-item col-xs-2 "><?= $data['kategori']; ?></li></a>
              <?php endforeach; ?>
              </ul>
   		 </div>
    </div>
</div>
<?php }elseif($page=="kategori_detail"){ ?>


<div class="wrap">
	 	<div class="features">
	 		<div class="row">
            <h2> Daftar Buku Berdasarkan Kategori </h2>
            <hr/>
                <!-- /.col-lg-4 -->
                <?php foreach($produk->getDataKategori($_GET['id_kategori']) as $data_kateg) : 
                  $data_bar = $produk->getDetail($data_kateg['id_buku']);
                  
                  ?>
		       	    <div class="col-sm-3" style="display: none;">
                  <img src="images/novel_img/<?= $data_bar['gambar']?>" class="col-sm-img" alt="" width="132" height="176" />
                  <div class="col-sm-body">
                  <h2><?= $data_bar['judul']?></h2>
		          
                  <h2>Rp. <?= number_format($data_bar['harga'])?>,-</h2>
                  
                  <?php 
                      $data_stok = $produk->getStok($data_bar['id_buku']);
                    ?>
                  <p>stok : <b><?= $data_stok['stok']; ?></b> </p>
		          <p><a class="read-more" href="index.php?page=produk-detail&id_buku=<?= $data_bar['id_buku']?>">Beli</a></p>
                  </div>
	          </div>
              <?php endforeach; ?>
                <!-- /.col-lg-4 -->
                
                
		      </div>
		   </div>
		 </div>
        




<?php } ?>