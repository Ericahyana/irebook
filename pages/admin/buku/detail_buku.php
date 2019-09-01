<?php
	$data = null;
	if(isset($_GET['id_buku'])) {
		$data = $produk->getDetail($_GET['id_buku']);
	}
	?>
<div class="row" style="margin: 0">
    <div class="col-lg-8">
        <div class="row">
       		 <?php if($data) : ?>  
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-square fa-fw"></i> <?= $data['judul']; ?>
                    <div class="pull-right">
                            <div class="btn-group">
                            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                Actions
                                <span class="caret"></span>
                            </button>

                            <ul class="dropdown-menu pull-right" role="menu">
                                <li>                                        
                                    <a href="index.php?page=update_buku&id_buku=<?= $data['id_buku']?>">Edit Buku</a>
                                </li>
                                <li>                                        
                                    <a href="index.php?page=update_stok&id_buku=<?= $data['id_buku']?>">Edit Stok</a>
                                </li>
                                <li>
                                    <form method="post" action="../controllers/produk/delete.php">
                                    <input name="id_buku" type="hidden" value="<?= $data['id_buku']?>" >
                                    <input class="delete-btn" onclick="if (!confirm(&quot;Apa kamu yakin ingin menghapus buku ?&quot;)) {return false;}" type="submit" value="Hapus Buku">
                                    </form>
                                </li>
                            </ul>
                        </div>
                                                <a href="index.php?page=daftar_buku" class="btn btn-default btn-xs">Back</a>
                    </div>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <dl class="dl-horizontal">
                    
                        <dt>Pengarang :</dt>
                        <dd><?= $data['pengarang']; ?></dd>
                        
                        <dt>Penerbit :</dt>
                        <dd><?= $data['penerbit']; ?></dd>
                        
                        <dt>Jumlah Halaman :</dt>
                        <dd><?= $data['hal']; ?></dd>
                        
                        <?php $data_stok = $produk->getStok($data['id_buku']);?>
						<dt>Jumlah Stok :</dt>
                        <dd><?= $data_stok['stok']; ?></dd>
                        
                        <dt>Tanggal terbit :</dt>
                        <dd><?= $data['tanggal']; ?></dd>
                        
                        <dt>Tanggal edit :</dt>
                        <dd><?= $data['tanggal_edit']; ?></dd>
                        
                        <dt>Kategori :</dt>
                        <dd><?php  foreach($produk->getKategori2Buku($data['id_buku']) as $data2) :?>
						<?= $data2['kategori']; ?>,
                        <?php endforeach; ?>
                        </dd>
                        
                        <?php $data_katalog = $produk->getDetailKatalog($data['id_katalog']);?>
                        <dt>Katalog :</dt>
                        <dd><?= $data_katalog['katalog']; ?></dd>
                        
                        <dt>Deskripsi :</dt>
                        <dd><?= $data['deskripsi'];?></dd>
                                            </dl>
                </div>
                <!-- /.panel-body -->
            </div>
        </div>
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-list-alt fa-fw"></i> Pengarang yang sama
                                        <div class="pull-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                Judul
                                <span class="caret"></span>
                            </button>

                            <ul class="dropdown-menu pull-right" role="menu">
                                <li>                                        
                                    <a href="#">Null</a>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                                    </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Id buku</th>
                                    <th>Gambar</th>
                                    <th>Judul</th>
                                    <th>Pengarang</th>
                                    <th>Tanggal Terbit</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($produk->getListPengarang($data['pengarang']) as $data_pe) : ?>
                            <tr>
                            
                            	<td><?= $data_pe['id_buku']; ?></td>
<td> <a href="index.php?page=daftar_buku_detail&id_buku=<?= $data_pe['id_buku']; ?>"><img width="50" height="50" src="../images/novel_img/<?= $data_pe['gambar']; ?>" alt="<?= $data_pe['gambar']; ?>"></a></td>
                                <td><?= $data_pe['judul']; ?></td>
                                <td><?= $data_pe['pengarang']; ?></td>
                                <td><?= $data_pe['tanggal']; ?></td>
                                
                            </tr>
                            <?php endforeach; ?> 
                            </tbody></table>
                                                    
                                                    
                     
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div id="coverContainer">
            <div class="coverWrapper">
                <div class="previewWrapper">
                                        <img class="img-responsive img-rounded" width='250' height='350'  src="../images/novel_img/<?= $data['gambar']; ?>" alt="sdf" id="output_image" >
                                    </div>
            </div>
            
                <?php endif; ?>
        </div>
    </div>
</div>