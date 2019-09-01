<?php

	$alfabet = array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z");
?>
<div id="page-wrapper" style="min-height: 501px;">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="breadcrumb">
                                    <li><a href="#">Produk</a></li>
                                    	<li class="active">Daftar Buku</li>
                        </ul>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
						<?php if(isset($_SESSION['message'])) : ?>
                        <!-- Jika Terdapat Error Maka munculkan pesan pada session yang telah dibuat -->
                         <?= $_SESSION['message'] ?>    
                            <!--mengosongkan session message agar pesan tidak muncul kembali -->
                            <?php unset($_SESSION['message']); ?>
                        <?php endif; ?>
                        <?php if(isset($_SESSION['message_success'])) : ?>
                        <!-- Jika Success Maka munculkan pesan pada session yang telah dibuat -->
                        <?= $_SESSION['message_success'] ?>        
                            <!--mengosongkan session message agar pesan tidak muncul kembali -->
                            <?php unset($_SESSION['message_success']); ?>
                        <?php endif; ?>
<div class="row">
   <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-list fa-fw"></i> Daftar Buku
                <div class="pull-right">
                    <a href="index.php?page=tambah_buku" class="btn btn-primary btn-sm pull-right" role="button">Buat Buku Baru</a>
                </div>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="row">
                                        <div class="col-sm-12">
                        <div class="alphabetic-box">
                            <span class="alphabetic disabled unknown">#</span>
                            				<?php for($i=0; $i<count($alfabet); $i++) :?>
                                            			<a href="#<?= $alfabet[$i]?>">
                                                        <span class="alphabetic <?= $alfabet[$i];?>"><?=$alfabet[$i];?></span>
                                                        </a>
                                                        <!--span class="alphabetic D">D</span-->
                                             <?php endfor; ?>           
                                                    </div>
                    </div>
					<?php foreach($produk->getDataAll() as $data) : ?> 
                    <div class="col-sm-12">
					
                     <?php
							 $text=substr($data['judul'],0,1); //string yg menapung 1 huruf 
							
							if($text===$text){
							 ?>
							 <div class="page-header" id="<?=$text;?>">
                            	<b>
								<?= $text;
								
								?>
								</b>
                        	</div>
                            <?php }?>
							
                            
                            
                           
                                                                     
                        <div class="row">
                         
                            <div class="col-md-12">
                                <div class="media manga-box">
                                    <div class="hot-mark"><i class="fa fa-bookmark"></i></div>
                                    <div class="media-left manga-cover">
                                        <a href="index.php?page=daftar_buku_detail&id_buku=<?= $data['id_buku']; ?>">
                                        <img width="100" height="100" src="../images/novel_img/<?= $data['gambar']; ?>">
                                        </a>
                                    </div>
                                    <div class="media-body" style="width: 100%;">
                                          <div class="manga-created pull-right">
                                            <i class="fa fa-user"></i>
                                            <small>admin,</small>
                                            <i class="fa fa-calendar-o"></i>
                                            <small><?= $data['tanggal']; ?></small>
                                          </div>
                                        <h5 style="margin: 5px 0 0;">
                                            <a href="index.php?page=daftar_buku_detail&id_buku=<?= $data['id_buku']; ?>"><?= $data['judul']; ?></a>    
                                        </h5>
                                        
                                        <div class="readOnly-1" style="display: inline-block; width: 100px;" title="Not rated yet!">
                                        <img src="../images/star-on.png" alt="1" title="Not rated yet!">&nbsp;<img src="../images/star-on.png" alt="2" title="Not rated yet!">&nbsp;<img src="../images/star-on.png" alt="3" title="Not rated yet!">&nbsp;
                                        <img src="../images/star-on.png" alt="4" title="Not rated yet!">&nbsp;<img src="../images/star-on.png" alt="5" title="Not rated yet!">
                                        <input type="hidden" name="score" readonly="readonly"></div>
                                        <span style="vertical-align: middle;"><?= $data['rating']; ?></span>
                                        
                                        <div>
                                            
                                        </div>

                                                                                <div class="categories">
                                            <i class="fa fa-tags"></i>
                                            <?php  foreach($produk->getKategori2Buku($data['id_buku']) as $data2) :?>
												<?= $data2['kategori']; ?>,
                                            <?php endforeach; ?>
                                        </div>
                                                                                                                    </div>
                                </div>
                            </div>
							
							<?php endforeach; ?>
                        </div>
                        
                        
                       </div>
                   </div> 
									
            </div>
            <!-- /.panel-body -->
        </div>
    </div>

                    
                    
                    
                    
                    
                    
                    
                    
                    
                  
                    
                    
                    
                    
                    
                    
                <!-- /.container-fluid -->
            </div>