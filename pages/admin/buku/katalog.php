<?php 
		 $data = null;
		 if(isset($_GET['id_katalog'])){
			 //mengambil semua data berdasarkan id katalog
			 $data = $produk->getDetailKatalog($_GET['id_katalog']);
		 }
		?>
<div id="page-wrapper" style="min-height: 501px;">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="breadcrumb">
                                    <li><a href="#">Produk</a></li>
                                                <li class="active">Katalog</li>
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
                <i class="fa fa-folder-open fa-fw"></i> Katalog
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-5">
                    <?php if($page == "katalog" || $page == "katalog-delete") : ?>
                        <form method="POST" action="../controllers/katalog/create.php">
                        <div class="form-group">
                            <label for="name">Nama Katalog</label>
                            <input class="form-control" name="id_katalog" type="hidden">
                            <input class="form-control" name="katalog" type="text">
                        </div>

                        
                        <div class="actionBtn">
                            <a href="#" class="btn btn-default btn-md-9">Kembali</a>

                            <input class="btn btn-primary btn-md" type="submit" value="Buat Katalog">
                        </div>
                        </form>
                        <?php endif; ?>
                        <?php if($page == "katalog-update") : ?>
                        <form method="POST" action="../controllers/katalog/update.php">
                        <div class="form-group">
                            <label for="name">Nama Katalog</label>
                            <input class="form-control" name="id_katalog" type="hidden" value="<?= $_GET['id_katalog'] ?>" >
                            <input class="form-control" name="katalog" type="text" value="" placeholder="<?= $data['katalog'];?>">
                            
                        </div>

                        
                        <div class="actionBtn">
                            <a href="#" class="btn btn-default btn-md-9">Kembali</a>

                            <input class="btn btn-primary btn-md" type="submit" value="Ubah Katalog">
                        </div>
                        </form>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-7">
                                                <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Nama Katalog</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            
                            
                               <tbody>
                               
                               <?php foreach($produk->getKatalog() as $data1) : ?>
                               <tr>
                                <td>
                                    <?=$data1['katalog'] ?>
                                </td>
                                
                                </td>
                                <td>
                                    <a href="index.php?page=katalog-update&id_katalog=<?= $data1['id_katalog'] ?>" class="btn btn-primary btn-xs">edit</a>

                                    <div style="display: inline-block">
                                        <form method="POST" action="../controllers/katalog/delete.php"><input name="id_katalog" type="hidden" value="<?= $data1['id_katalog']?>">
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