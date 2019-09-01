
<div id="page-wrapper" style="min-height: 501px;">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="breadcrumb">
                                    <li><a href="#">Produk</a></li>
                                    	<li><a href="#">Daftar Buku</a></li>
                                                <li class="active">Tambah Buku</li>
                                        	
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
    <div class="col-lg-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-pencil-square-o fa-fw"></i> Tambah Buku baru
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <form method="POST" action="../controllers/produk/create.php" enctype="multipart/form-data">
                <input name="id_buku" type="text" value="
                <?php //untuk mengambil id_buku terakhir di tabel buku
					foreach($produk->getId_buku()as $data){
					$value=$data['id_buku']+1;
					echo $value;
					}
				?>
                " readonly="readonly">
               
                 <input name="tanggal_edit" type="hidden" value="<?= date('Y-m-d');?>">
                <input name="id_stok" type="hidden" value="">
                <input name="rating" type="hidden" value="">
                <div class="form-group">
                    <label for="name">Judul Buku</label>
                    <input class="form-control" name="judul" type="text" value="" id="judul">
                    
                </div>

                <div class="form-group">
                    <label for="slug">Pengarang</label>
                    <input class="form-control"  name="pengarang" type="text" value="" id="pengarang">
                    
                </div>

                <div class="form-group">
                    <label for="otherNames">Penerbit</label>
                    <input class="form-control" name="penerbit" type="text" value="">
                </div>

                <div class="form-group">
                    <label for="author">Jumlah Halaman</label>
                    <input class="form-control" name="hal" type="text" value="">
                </div>
                
                <div class="form-group">
                    <label for="author">Harga</label>
                    <input class="form-control" placeholder="Rp. " name="harga" type="text" value="">
                </div>

				<div class="form-group">
                    <label for="author">Stok Buku</label>
                    <input class="form-control" name="stok" type="text" value="">
                </div>
                
                <div class="form-group">
                    <label for="releaseDate">Tanggal terbit</label>
                    
                     <div class="input-group date">
                  		<div class="input-group-addon">
                   		 <i class="fa fa-calendar"></i>
                  	</div>
                  	<input name="tanggal" type="text" class="form-control pull-right" id="datepicker">
                </div>
                    
                    
                </div>

                <div class="form-group">
                    <label for="status">Katalog</label>
                    <br />
                    
                    <select class="selectpicker" data-width="100%" name="id_katalog" style="display: none;">
                    <option value="" selected="selected">Pilih katalog</option>
                    <?php foreach($produk->getKatalog() as $data3) : ?>
                    <option value="<?= $data3['id_katalog']; ?>"><?= $data3['katalog']; ?></option>
                    <?php endforeach; ?>
                    </select>
                
                </div>

                <div class="form-group">
                    <label for="categories">Kategori</label>
                    <br>
                    <select class="selectpicker" multiple="multiple" title="Pilih satu atau lebih kategori" data-selected-text-format="count>6" data-width="100%" name="kategori[]" style="display: none;">
                    <?php foreach($produk->getKategori() as $data2) : ?>
                    <option value="<?= $data2['id_kategori']; ?>"><?= $data2['kategori']; ?></option>
                    <?php endforeach; ?>
                    
                    </select>
                </div>

                <div class="form-group">
                    <label for="summary">Deskripsi</label>
                    <textarea class="form-control" rows="5" name="deskripsi" cols="50" id="summary"></textarea>
                </div>
                
                <div class="actionBtn">
                    <a href="index.php?page=daftar_buku" class="btn btn-default btn-xs">Kembali</a>
	
					                    <input class="btn btn-primary btn-xs" type="submit" value="Buat Buku">
                                        
               
                </div>
                
            </div>
            <!-- /.panel-body -->
        </div>
    </div>
    <div class="col-lg-4">
        <div id="coverContainer">
            <div class="coverWrapper">
                <div class="previewWrapper">
                    
                    <img class='img-responsive img-rounded' width='250' height='350' src='../images/no-image.png' id="output_image" />
                    <div id="previews">
                        
                    </div>
                </div>

				                <div class="uploadBtn">
                    <span class="btn btn-primary btn-xs">
                       
                        <span>
                        Max file : 1 MB
                <input type="file" name="gambar" accept="image/*" onchange="preview_image(event)">
                </span>
                    </span>
                    
                </div> 
                </form>
            </div>
        </div>
    </div>

                <!-- /.container-fluid -->
            </div>