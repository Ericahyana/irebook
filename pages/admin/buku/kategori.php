<?php

		 $data_ka = null;
		 if(isset($_GET['id_kategori'])){
			 //mengambil semua data berdasarkan id kategori
			 $data = $produk->getDetailKategori($_GET['id_kategori']);
		 }
		?>
<div id="page-wrapper" style="min-height: 501px;">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="breadcrumb">
                                    <li><a href="#">Produk</a></li>
                                                <li class="active">Kategori</li>
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
                <i class="fa fa-folder-open fa-fw"></i> Kategori
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-5">
                    <?php if($page == "kategori" || $page == "kategori-delete") : ?>
                        <form method="POST" action="../controllers/kategori/create.php" >
                        <div class="form-group">
                            <label for="name">Nama Kategori</label>
                            <input class="form-control" name="id_kategori" type="hidden" value="">
                            <input class="form-control" name="kategori" type="text" value="">

                        </div>


                        <div class="actionBtn">
                            <a href="#" class="btn btn-default btn-md-9">Kembali</a>

                            <input class="btn btn-primary btn-md" type="submit" value="Buat Kategori">
                        </div>
                        </form>
                        <?php endif; ?>
                        <?php if($page == "kategori-update") : ?>
                        <form method="POST" action="../controllers/kategori/update.php">
                        <div class="form-group">
                            <label for="name">Nama Kategori</label>
                            <input class="form-control" name="id_kategori" type="hidden" value="<?= $_GET['id_kategori']?>" >
                            <input class="form-control" name="kategori" type="text" value="<?= $data['kategori']?>">

                        </div>


                        <div class="actionBtn">
                            <a href="#" class="btn btn-default btn-md-9">Kembali</a>

                            <input class="btn btn-primary btn-md" type="submit" value="Ubah Kategori">
                        </div>
                        </form>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-7">
                                                <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Nama Kategori</th>

                                    <th>Aksi</th>
                                </tr>
                            </thead>


                               <tbody>

                               <?php foreach($produk->getKategori() as $data1) : ?>
                               <tr>
                                <td>
                                    <?=$data1['kategori'] ?>
                                </td>

                                <td>
                                    <a href="index.php?page=kategori-update&id_kategori=<?= $data1['id_kategori'] ?>" class="btn btn-primary btn-xs">edit</a>

                                    <div style="display: inline-block">
                                        <form method="POST" action="../controllers/kategori/delete.php">
                                        <input name="id_kategori" type="hidden" value="<?= $data1['id_kategori'] ?>">
                                        <input class="btn btn-danger btn-xs" onclick="if (!confirm(&quot;Are you sure to delete this category?&quot;)) {return false;}" type="submit" value="Hapus">
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
