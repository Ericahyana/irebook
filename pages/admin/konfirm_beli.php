
<div class="row">
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-pencil-square-o fa-fw"></i> Transaksi yang baru di tambahkan
                                
                            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                                <div class="list-group">
                                <?php foreach($transaksi->getDataKonfirm() as $data_kon) : ?>
                                
                                        <div class="list-group-item">
                        <div class="media-left">
                                                        
                            <img width="210" height="100" src="../images/konfirm/<?= $data_kon['gambar']; ?>" alt="<?= $data_kon['gambar']; ?>">
                            
                        </div>
                        <div class="media-body">
                            <br>
                            <h5 class="media-heading"><?php $data_user = $akun->getDetailCus($data_kon['id_cus'])?>
                            Kode Beli : <?= $data_kon['kode_beli']; ?><br/>
                            <a href="index.php?page=edit_cus&id_cus=<?= $data_user['id_cus']; ?>"><?= $data_user['nama_cus'] ?></a>
                        </h5>
                            <div class="pull-right">
                                
                                <form method="POST" action="../controllers/transaksi/konfirm.php">
                                        <input name="kode_beli" type="hidden" value="<?= $data_kon['kode_beli']?>">
                                        <input name="status_beli" type="hidden" value="Lunas">
                                        <input name="status_pengiriman" type="hidden" value="Di Kirim">
                                        <button class="btn btn-success btn-xs" onclick="if (!confirm(&quot;Apaka anda yakin ingi mengkonfirmasi pembelian ?&quot;)) {return false;}" type="submit"><i class="fa fa-check-square-o"></i> Konfirmasi Pembelian</button>
                                </form>
                                
                                <form method="POST" action="../controllers/transaksi/delete.php">
                                        <input name="kode_beli" type="hidden" value="<?= $data_kon['kode_beli']?>">
                                        <input class="btn btn-danger btn-xs" onclick="if (!confirm(&quot;Apaka anda yakin ingi menghapusnya ?&quot;)) {return false;}" type="submit" value="Hapus">
                                </form>
                            </div>
                            <div>
                                <i class="fa fa-calendar-o"></i>
                                <small><?= $data_kon['tgl_konfirm']; ?></small>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?> 
                     
                                        
                                    </div>
                               
                                            </div>
            <!-- /.panel-body -->
        </div>
    </div>
</div>

