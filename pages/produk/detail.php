<?php
	$db = new Database();
	$dbConnect = $db->connect();
	$data = null;
	if(isset($_GET['id_buku'])) {
		$data = $produk->getDetail($_GET['id_buku']);
	}
	?>
		<span class="big-arrow"></span>
        <div class="wrap">
           <center>
            <h1 style="margin-bottom:20px">Detail Buku</h1>
		   	</center>
            <div class="container-fluid">
			  <div class="row">
              <!-- start genre -->
                    <?php if($data) : ?>                    
                    <div class="card">
                        <div class="row">
                            <aside class="col-sm-5 border-right">
                    <article class="gallery-wrap"> 
                    <div class="img-big-wrap">
                      <div style="margin:auto; padding:80px;"> 
                      	<a href="#"><img style="border-radius:3%;" src="images/novel_img/<?= $data['gambar']; ?>"></a>
                      </div>
                    </div> <!-- slider-product.// -->
                    </article> <!-- gallery-wrap .end// -->
                            </aside>
                            <aside class="col-sm-7">
                    <article class="card-body p-5">
                        <h2><?= $data['judul']; ?> &nbsp;&nbsp;<a href="#"><img src="images/new_book.gif" title="Buku Baru" border="0"></a></h2>
                    
                    <p class="price-detail-wrap"> 
                        <span class="price h3 text-warning"> 
                            <span class="currency">Rp.<?= number_format($data['harga']); ?>,-</span>
                        </span> 
                    </p> <!-- price-detail-wrap .// -->
                    <dl class="item-property">
                    <br/><br/><br/><br/>
                      <dt>Deskripsi</dt>
                      <dd><p><?= $data['deskripsi']; ?></p></dd>
                    </dl>
                    <hr>
                    <div style="padding-left:20px;">
                        <div class="col-xs-12">
                        </div>
                            <div class="row">
                             <div class="row">
							 <?php $data_stok = $produk->getStok($data['id_buku']);?>
                                    <div class="col-xs-5 col-md-3">Stok</div>
                                    <div class="col-xs-7 col-md-9"><?php
									if($data_stok>0){
									echo" Stok siap !!";
									}else{
									echo" Stok habis!!";
									}?></div>
                                </div>
                            
                                <div class="row">
                                    <div class="col-xs-5 col-md-3">No. ISBN</div>
                                    <div class="col-xs-7 col-md-9"><?= $_GET['id_buku'] ?></div>
                                </div>
    
                                <div class="row">
                                    <div class="col-xs-5 col-md-3">Penulis</div>
                                    <div class="col-xs-7 col-md-9"><a class="penulis" href="#"><?= $data['pengarang']; ?></a></div>
                                </div>
        
                            <div class="row">
                                <div class="col-xs-5 col-md-3">Penerbit</div>
                                <div class="col-xs-7 col-md-9"><a class="penerbit" href="#"><?= $data['penerbit']; ?></a></div>
                            </div>
    
    
                                <div class="row">
                                    <div class="col-xs-5 col-md-3">Tanggal terbit</div>
                                    <div class="col-xs-7 col-md-9"><?= $data['tanggal']; ?></div>
                                </div>
                                    <div class="row">
                                    <div class="col-xs-5 col-md-3">Jumlah Halaman</div>
                                    <div class="col-xs-7 col-md-9"><?= $data['hal']; ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-5 col-md-3">Rating</div>
                                    <div class="col-xs-7 col-md-9"><?= $data['rating']; ?></div>
                                </div>
                                
    						<div class="row">
                                <div class="col-xs-5 col-md-3">
                                Katalog</div>
                                <div class="col-xs-7 col-md-9"><?php $data_katalog = $produk->getDetailKatalog($data['id_katalog']);?><?= $data_katalog['katalog']; ?></div>
                            </div>
    
                            <div class="row">
                                <div class="col-xs-5 col-md-3">Kategori</div>
                                <div class="col-xs-7 col-md-9">
                                
              					<?php  foreach($produk->getKategori2Buku($data['id_buku']) as $data2) :?>
                            		<?= $data2['kategori']; ?>,
                             <?php endforeach; ?>
                            </div>
                            
                            <div class="row">
                                <div class="col-xs-5 col-md-3"></div>
                                <div class="col-xs-7 col-md-9">
                                
                            </div>
    						
                          



                                <div class="row">
                                <div id="divBookImg" style="position:absolute;left:0;top:0;visibility:hidden;" onMouseOver="resizePic(event)" onMouseOut="resizePic(event)"></div>
                            </div>
                       </div>
                    <hr>
                        <div class="row">
                            <div class="col-sm-5">
                                <dl class="param param-inline">  
                                </dl>  <!-- item-property .// -->
                            </div> <!-- col.// -->
                            <div class="col-sm-7">
                                  <!-- item-property .// -->
                            </div> <!-- col.// -->
                        </div> <!-- row.// -->
                        <hr>
                        <?php
									if($data_stok>0){?>
									<a href='controllers/keranjang/keranjang.php?act=masukan&amp;id_buku=<?= $_GET['id_buku']; ?>&amp;ref=index.php?page=produk-detail'  class='btn btn-success  btn-lg'> Tambah Ke Keranjang</a>
									<?php }else{?>
									<a href='#' onClick='error()' class='btn btn-success  btn-lg'> Tambah Ke Keranjang</a>
									<?php }?>
                      
                       
                       
                        
                    </article> <!-- card-body.// -->
                    <br/><br/>
                            </aside> <!-- col.// -->
                        </div> <!-- row.// -->
                    </div> <!-- card.// -->

                <?php endif; ?>
                <!-- end genre -->
			  </div>
			</div>
		 </div> 