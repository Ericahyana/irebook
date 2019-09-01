<?php 
        include "class/Transaksi.php";
        $transaksi = new Transaksi();
        unset($_SESSION['item']);
?>

<div class="row">
	<div class="col-md-3">
	</div>

	<!-- /.col -->
	<div class="col-md-7">
		<h2 > Transaksi Selesai 
    </h2>
		<br>
		<br>

        
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
                    $total_bayar=0;
                foreach($transaksi->getDataPembelian($_GET['kode_beli']) as $data_beli) :?>
                
                <tr>
                        <td><?= $no++;?></td>
                        <td><?= $data_beli['id_beli']?></td>
                        <?php $data_buku=$produk->getDetail($data_beli['id_buku']);?>
                        <td><?= $data_buku['judul']?></td>
                        <td><?= number_format($data_beli['harga'])?></td>
                        <td><?= $data_beli['qty']?></td>
                        <td><?= number_format($data_beli['total_harga'])?></td>
                        <?php 
                             $total_bayar+= $data_beli['total_harga'];  
                        ?>
                </tr>
                
                    <?php endforeach; ?>
                
                <tr>
                        <td colspan="5" align="right">Total Pembayaran</td>
                        <td>Rp.<?= number_format($total_bayar);?></td>
                </tr>			
            </table>
            Silahkan transfer uang sejumlah Rp.<?= number_format($total_bayar);?>,- ke no-rek 65345521 atas nama Eri Cahyana<br>

        Anda dapat mengonfirmasi pembayaran ke:<br>

        no telp (089) 868 979 62<br>

        LINE ericahyana<br>

        WA 08986897962<br>

        *Jika 2 hari tidak dilakukan konfirmasi(belum membayar) maka transaksi anda akan kami batalkan<br>

        *Perlu kami ingatkan,bahwa anda tidak akan dapat melakukan pembelian dalam jangka waktu 2 hari(proses tunggu pembayaran dan konfirmasi)<br>

        *Anda dapat melakukan pembelian kembali setelah melakukan pembayaran dan konfirmasi,atau setelah waktu tunggu 2 hari<br>

        *Jika barang sudah anda terima, silahkan lakukan  Konfirmasi <a href="index.php?page=detail_transaksi&kode_beli=<?= $_GET['kode_beli']; ?>" class="btn btn-primary btn-sm"><span class="fa fa-check-square-o"></span> Konfirmasi Pembelian</a><br>


	</div>
	<!-- /.col -->
</div>