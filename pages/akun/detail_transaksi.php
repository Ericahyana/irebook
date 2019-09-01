<?php 
include "class/Transaksi.php";
	$transaksi = new Transaksi();
	?>

<div class="row">
	<div class="col-md-3">
	</div>

	<!-- /.col -->
	<div class="col-md-7">
		<h2 >Detail Transaksi || Kode Beli : <?= $_GET['kode_beli'] ?>
             <div class="pull-right">
             <?php $cek_konfirm = $transaksi->check_konfirm($_GET['kode_beli']);
                if($cek_konfirm['status_beli']=="Order"){?>
                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-success">
               <span class="fa fa-check-square-o"> Konfirmasi</span>
              </button>
                <?php }else{?>
                        <a href="index.php?page=retur&kode_beli=<?= $_GET['kode_beli'] ?>" class="btn btn-danger btn-sm pull-right" role="button">Retur Barang</a>
                <?php } ?>
                
                </div></h2>
		<br>
		<br>
		<?php if(isset($_SESSION['message'])) : ?>
		<?= $_SESSION['message'] ?>    
			<?php unset($_SESSION['message']); ?>
		<?php endif; ?>
		<?php if(isset($_SESSION['message_success'])) : ?>
		<?= $_SESSION['message_success'] ?>  
			<?php unset($_SESSION['message_success']); ?>
		<?php endif; 
		?>
		<h2>Daftar Beli</h2>
        <table width="70%" class="table">
                <tr>
                        <th>#</th>
                        <th>Id Pembelian</th>
                        <th>Judul Buku</th>
                        <th>Harga</th>
                        <th>QTY</th>
                        <th>Harga Total</th>
                </tr>
                <?php 
                    $no=1;
                foreach($transaksi->getDataPembelian($_GET['kode_beli']) as $data_beli) :?>
                
                <tr>
                        <td><?= $no++;?></td>
                        <td><?= $data_beli['id_beli']?></td>
                        <?php $data_buku=$produk->getDetail($data_beli['id_buku']);?>
                        <td><?= $data_buku['judul']?></td>
                        <td><?= $data_beli['harga']?></td>
                        <td><?= $data_beli['qty']?></td>
                        <td><?= $data_beli['total_harga']?></td>
                        
                </tr>
                    <?php endforeach; ?>			
            </table>
        
            <h2>Tujuan Pengiriman</h2>
        <table width="70%" class="table">
            <?php $data_tujuan=$transaksi->getDataTujuan($_GET['kode_beli']) ?>
                <tr >
                        <td width="200px">Nama Penerima</td>
                        <td><?= $data_tujuan['nama_penerima']?></td>
                </tr>
                <tr>
                        <td>Kota</td>
                        <td><?= $data_tujuan['kota']?></td>
                </tr>
                <tr>
                        <td>Kode Pos</td>
                        <td><?= $data_tujuan['kode_pos']?></td>
                </tr>
                <tr>
                        <td>No HP</td>
                        <td><?= $data_tujuan['no_hp']?></td>
                </tr>
                <tr>
                        <td>Alamat</td>
                        <td><?= $data_tujuan['alamat']?></td>
                </tr>
                
                    
            </table>
		
	</div>

        <div class="modal modal-success fade" id="modal-success">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Silahkan Kirim bukti pembayaran</h4>
              </div>
              <div class="modal-body">
                      <form action="controllers/transaksi/konfirm_beli.php" method="post"  enctype="multipart/form-data">
                      <div class="col-sm-12">
                        <input type="hidden" name="id_cus" value="<?= $_SESSION['id_cus'];?>">
                        <input type="hidden" name="kode_beli" value="<?= $_GET['kode_beli'];?>">
                <p><input type="file" name="bukti_bayar" class="form-control"  accept="image/*" onchange="preview_image(event)"></p>
                </div>
                <p>
                <img class='img-responsive img-rounded' width='450' height='300' src='images/no-image.png' id="output_image" />
                </p>
                
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-sm">Konfirmasi</button>
                </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

	<!-- /.col -->
</div>