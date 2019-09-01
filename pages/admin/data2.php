<?php $data_buku= $produk->getJumlahBuku();?>
<?php $data_order= $produk->getJumlahOrder();?>
<?php $data_pel= $akun->getJumlahCus();?>

<!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
                
              <h3><?= $data_order['jumlah']?></h3>

              <p>Order Baru</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?= $data_buku['jumlah']?></h3>

              <p>Total Buku</p>
            </div>
            <div class="icon">
              <i class="ion  ion-ios-book"></i>            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?= $data_pel['jumlah']?></h3>

              <p>User Registrasi</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>54</h3>

              <p>Total pengunjung</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>          </div>
        </div>
        <!-- ./col -->
      </div>

    <div class="row">
    <div class="col-lg-12">
        <div class="panel panel-danger">
            <div class="panel-heading">
                <i class="fa fa-star fa-fw"></i> Buku Populer
                                
                            </div>
            <!-- /.panel-heading -->
           			 <div class="panel-body">
                                <ul class="dash_hot">
                                <?php foreach($produk->getDataTop() as $data1) : ?>
                                        <li>
                       						 <a href="index.php?page=daftar_buku_detail&id_buku=<?= $data1['id_buku']; ?>">
                                             
                                                        <img width="100" height="100" src="../images/novel_img/<?= $data1['gambar']; ?>" alt="<?= $data1['judul']; ?>">
                                                        <div class="caption">
                                                <h6 align="center"><?= $data1['judul']; ?></h6>
                                            </div>
                                        </a>
                    				</li>
                                   <?php endforeach; ?>  
                                   
                                </ul>
                            </div>
            <!-- /.panel-body -->
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-pencil-square-o fa-fw"></i> Buku yang baru di tambahkan
                                <div class="pull-right">
                    <a href="index.php?page=tambah_buku" class="btn btn-primary btn-xs" role="button">Buat Buku Baru</a>
                </div>
                            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                                <div class="list-group">
                                <?php foreach($produk->getDataNew() as $datab) : ?>
                                
                                        <div class="list-group-item">
                        <div class="media-left">
                            <a href="index.php?page=daftar_buku_detail&id_buku=<?= $datab['id_buku']; ?>">                            
                            <img width="50" height="50" src="../images/novel_img/<?= $datab['gambar']; ?>" alt="<?= $datab['judul']; ?>">
                                                            </a>
                        </div>
                        <div class="media-body">
                            <h5 class="media-heading">
                                                                <a href="index.php?page=daftar_buku_detail&id_buku=<?= $datab['id_buku']; ?>"><?= $datab['judul']; ?></a>
                                                            </h5>
                            <div class="pull-right">
                                <i class="fa fa-user"></i>
                                <small>admin</small>
                            </div>
                            <div>
                                <i class="fa fa-calendar-o"></i>
                                <small><?= $datab['tanggal_edit']; ?></small>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?> 
                     
                                        
                                    </div>
                                <a href="index.php?page=daftar_buku" class="btn btn-primary btn-block" align="center">Lihat semua buku</a>
                                            </div>
            <!-- /.panel-body -->
        </div>
    </div>
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-book fa-fw"></i> Belum tersedia
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                                <div class="center-block">
                    <p>There is nothing !</p>
                </div>
                            </div>
            <!-- /.panel-body -->
        </div>
    </div>
</div>

                <!-- /.container-fluid -->
            </div>
