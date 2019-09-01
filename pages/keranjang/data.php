		<div style="background-color:#EAEAEA; border-radius:2%; padding-bottom:50px; margin: 70px 70px;">
           <center>
            <h1 style="margin-bottom:20px">Keranjang Belanja</h1>
		   	</center>
            <div class="container-fluid">
			  <div class="row">
              <!-- start genre -->
                     <!-- Content-Starts-Here -->
                        <div class="container">

                            <!-- Mainbar-Starts-Here -->
                            <div class="main-bar">
                                <div class="product">
                                    <h3>Produk</h3>
                                </div>
                                <div class="quantity">
                                    <h3>Qty</h3>
                                </div>
                                <div class="price">
                                    <h3>Harga</h3>
                                </div>
                                <div class="price">
                                    <h3>Harga Total</h3>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <!-- //Mainbar-Ends-Here -->
                     	<!-- Items-Starts-Here -->
                            <div class="items">
						   <?php

                            $no = 1;
							$qty_total=0;
                            $total = 0;

                            if (isset($_SESSION['item'])) {
                                foreach ($_SESSION['item'] as $key => $val) {
                                    $data= $produk->getDetail($key);
									$data_stok= $produk->getStok($key);
                                    $jumlah_harga = $data['harga'] * $val;
                                    $total += $jumlah_harga;
                                	$qty_total +=$val;

                            ?>




                                <!-- Item1-Starts-Here -->
                                <div class="item1">
                                    <div class="close1">
                                        <!-- Remove-Item --><a href="controllers/keranjang/keranjang.php?act=hapus&amp;id_buku=<?= $key; ?>&amp;ref=index.php?page=keranjang&amp;qty=<?= $val; ?>"><div class="alert-close1"> </div></a><!-- //Remove-Item -->
                                        <div class="image1">
                                            <img src="images/novel_img/<?= $data['gambar']; ?>" alt="item1">
                                        </div>
                                        <div class="title1">
                                            <p><?= $data['judul']; ?></p>
                                        </div>
                                        <div class="quantity1">
                                       <p>
                                       <a href="controllers/keranjang/keranjang.php?act=tambah&amp;id_buku=<?= $key; ?>&amp;ref=index.php?page=keranjang" class="btn btn-primary btn-sm">+</a>
                                       <?= number_format($val); ?>
                                       <a href="controllers/keranjang/keranjang.php?act=kurang&amp;id_buku=<?= $key; ?>&amp;ref=index.php?page=keranjang" class="btn btn-danger btn-sm">-</a></p>
                                        </div>
                                        <div class="price1">
                                            <p>Rp. <?= number_format($data['harga']); ?></p>
                                        </div>
                                         <div class="price2">
                                            <p>Rp. <?= number_format($jumlah_harga); ?></p>
                                        </div>

                                        <div class="clear"></div>
                                    </div>
                                </div>
                                <!-- //Item1-Ends-Here -->
                    		<?php } } ?>
                    			<?php
									if($total == 0){?>
                                    <div class="item1">
                                    Ups, Keranjang Kosong !! silahkan pilih buku dulu !
                                    </div>
                                    <?php } ?>
                            </div>
                            <!-- //Items-Ends-Here -->

                            <!-- Total-Price-Starts-Here -->
                            <div class="total">
                                <div class="total1">Total QTY : <?= $qty_total; ?> &nbsp;|&nbsp; Total Harga</div>

                                <div class="total2">Rp. <?= number_format($total)?>,00,-</div>
                                <div class="clear"></div>
                            </div>
                            <!-- //Total-Price-Ends-Here -->

                            <!-- Checkout-Starts-Here -->
                            <div class="checkout">
                            <?php if(!$total==0){?>
                                    <?php if(isset($_SESSION['id_cus'])){?>      
                                        <div class="checkout-btn" style="float:right">
                                            <a href="index.php?page=checkout">Checkout</a>
                                        </div>
                                     <?php }else{ ?>
                                        <div class="checkout-btn" style="float:right">
                                            <a href="pages/akun/login.php" onClick="BelumLogin()">Checkout</a>
                                        </div>
                                <?php } ?>
                            <?php } ?>
                                 <div class="checkout-btn" style="float:right">
                                <a href="index.php">&laquo; Lanjutkan belanja</a>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <!-- //Checkout-Ends-Here -->

                        </div>
                        <!-- Content-Ends-Here -->
                <!-- end genre -->
			  </div>
         </div>
         </div>
