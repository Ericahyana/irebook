<?php 
		 $data = null;
		 if(isset($_GET['id_buku'])){
			 //mengambil semua data berdasarkan id katalog
			 $data = $produk->getStok($_GET['id_buku']);
		 }
		?>
<div id="page-wrapper" style="min-height: 501px;">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="breadcrumb">
                                    <li><a href="#">Produk</a></li>
                                                <li class="active">Stok</li>
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
                <p>
                    <div class="row">
    <div class="col-sm-12">
        
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-folder-open fa-fw"></i> Stok Buku
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-5">
                    <?php if($page == "stok_buku" || $page == "delete_stok") : ?>
                        <form method="POST" action="../controllers/stok/create.php">
                        <div class="form-group">
                            <label for="name">Nama Buku</label>
                            <input class="form-control" name="id_stok" type="hidden">
                            <input class="form-control" name="id_buku" type="hidden" value="<?= $data['id_buku'] ?>">
                            <?php $data_buku= $produk->getDetail($data['id_buku']);?>
                            <input class="form-control" name="judul" type="text"value="<?= $data_buku['judul'] ?>" readonly="readonly">
                            <label for="name">Stok Buku</label>
                            <input class="form-control" name="stok" type="text" readonly="readonly">
                        </div>
                        
                        <div class="actionBtn">
                            <a href="#" class="btn btn-default btn-md-9">Kembali</a>

                            <input class="btn btn-primary btn-md" type="submit" value="Ubah Stok">
                        </div>
                        </form>
                        <?php endif; ?>
                        <?php if($page == "update_stok") : ?>
                        <form method="POST" action="../controllers/stok/update.php">
                        <div class="form-group">
                            <label for="name">Nama Buku</label>
                            <input class="form-control" name="id_stok" type="hidden" value="<?= $data['id_stok'] ?>">
                            <input class="form-control" name="id_buku" type="hidden" value="<?= $data['id_buku'] ?>">
                            <?php $data_buku= $produk->getDetail($data['id_buku']);?>
                            <input class="form-control" name="judul" type="text"value="<?= $data_buku['judul'] ?>" readonly="readonly">
                            <label for="name">Stok Buku</label>
                            <input class="form-control" name="stok" type="text" value="<?= $data['stok'] ?>">
                        </div>
                        <div class="actionBtn">
                            <a href="#" class="btn btn-default btn-md-9">Kembali</a>

                            <input class="btn btn-primary btn-md" type="submit" value="Ubah Stok">
                        </div>
                        </form>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-7">
                                                <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Nama Buku</th>
                                    <th>Stok</th>
                                     <th>Aksi</th>
                                </tr>
                            </thead>
                            
                            
                               <tbody>
                               
                               <?php foreach($produk->getListStok() as $data1) : ?>
                               <tr>
                                <td>
								<?=$data1['judul'] ?>
                                    
                                </td>
                                <td>
                                	
                                    <?=$data1['stok'] ?>
                                </td>
                                
                                <td>
                                    <a href="index.php?page=update_stok&id_buku=<?= $data1['id_buku'] ?>" class="btn btn-primary btn-xs">edit</a>

                                    <div style="display: inline-block">
                                        <form method="POST" action="../controllers/stok/delete.php">
                                        <input name="id_stok" type="hidden" value="<?= $data1['id_stok']?>">
                                        <input class="btn btn-danger btn-xs" onclick="if (!confirm(&quot;Are you sure to delete this category?&quot;)) {return false;}" type="submit" value="delete">
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                                                       
                              
                                                    </tbody></table>
                                            </div>
                </div>
            </div>
            <!-- /.panel-body -->
        </div>
    </div>
</div>

                    
                <!-- /.container-fluid -->
            </div>