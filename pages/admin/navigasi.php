 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../bootstrap/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">        </div>
        <div class="pull-left info">
          <p><?= $data['nama_su']; ?></p>
          <a href="#"><i class="fa fa-circle text-primary"></i> Online</a></div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>                </button>
              </span>        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
            
        <li class="<?php if(!$page || $page=='dashboard'){ echo 'active';  }?>"><a href="index.php?page=dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        
            <li class="<?php if(!$page || $page=='daftar_buku' || $page=='katalog' || $page=='kategori' || $page=='diskon'){ echo 'active';  }?> treeview">
              <a href="#">
                <i class="fa fa-wrench"></i>
                <span>Manage Produk</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>            </span>          </a>
              <ul class="treeview-menu">
                <li><a href="index.php?page=daftar_buku"><i class="fa fa-circle-o text-yellow"></i> Buku</a></li>
                <li><a href="index.php?page=stok_buku"><i class="fa fa-circle-o text-"></i> Stok Buku</a></li>
                <li><a href="index.php?page=katalog"><i class="fa fa-circle-o text-aqua"></i> Katalog</a></li>
                <li><a href="index.php?page=kategori"><i class="fa fa-circle-o text-red"></i> Kategori</a></li>
              </ul>
            </li>
        <li class="<?php if(!$page || $page=='user' ){ echo 'active';  }?> treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Manage User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>            </span>          </a>
          <ul class="treeview-menu">
            <li><a href="index.php?page=akun"><i class="fa fa-circle-o text-red"></i>Akun</a></li>
          </ul>
        </li>
        <li class="<?php if(!$page || $page=='konfirm_beli'){ echo 'active';  }?>"><a href="index.php?page=konfirm_beli"><i class="fa  fa-check-square-o"></i> <span>Konfirm Pembelian</span></a></li>

        
        <li class="header">REPORT</li>
        <li class="<?php if(!$page || $page=='cetak_customer' || $page=='cetak_penjualan' ){ echo 'active';  }?> treeview">
          <a href="#">
            <i class="fa fa-bookmark"></i>
            <span>Report</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>            </span>          </a>
          <ul class="treeview-menu">
            <li><a href="#" data-toggle="modal" data-target="#modal-customer"><i class="fa fa-circle-o text-red"></i> Customer</a></li>
            <li>
            <a href="#" data-toggle="modal" data-target="#modal-penjualan">
            <i class="fa fa-circle-o text-blue"></i> Penjualan</a></li>
            
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  
  <div class="modal modal-default fade" id="modal-customer">
          <div class="modal-dialog-print">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Preview Laporan</h4>
              </div>
              <div class="modal-body">
              <h1 style="text-align: center;">Data Customer Ire Book</h1><br>
    <table  width="100%" class="table">
        <theader>
    <tr>
    
        <th width="22px">NO</th>
        <th>Nama </th>
        <th>Email</th>
        <th width="55px">Status</th>
        <th>Alamat</th>
        <th>No. HP</th>
        <th>Kota</th>
        <th>Jenis Kelamin</th>
        <th>Kode Pos</th>
    </tr>
    </theader>
    <?php
    $no=1;
        foreach ($akun->getDataCus() as $data_cus) :?>
        <tr>
                <td><?= $no++;?></td>
                <td><?= $data_cus['nama_cus']?></td>
                <td><?= $data_cus['email_cus']?></td>
                <td><?= $data_cus['status_cus']?></td>
                <td><?= $data_cus['alamat_cus']?></td>
                <td><?= $data_cus['nohp_cus']?></td>
                <td><?= $data_cus['kota_cus']?></td>
                <td><?= $data_cus['jk_cus']?></td>
                <td><?= $data_cus['kode_pos_cus']?></td>
        </tr>
    
        
    <?php 
        endforeach;
    // }else{ // Jika data tidak ada
    //     echo "<tr><td colspan='4'>Data tidak ada</td></tr>";
    // }
    ?>
    </table>
              </div>
              <div class="modal-footer">
                <a href="../pages/admin/cetak_laporan.php?page=cetak_customer">
                  <button type="submit" class="btn btn-primary btn-sm">Print</button>
                </a>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <div class="modal modal-default fade" id="modal-penjualan">
          <div class="modal-dialog-print">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Preview Laporan</h4>
              </div>
              <div class="modal-body">
              <h1 style="text-align: center;">Data Penjualan Ire Book</h1><br>
    <table  width="100%" class="table">
        <theader>
    <tr>
    
        <th width="22px">NO</th>
        <th width="40px">Kode Beli</th>
        <th width="100px">Nama Cus </th>
        <th>Total QTY</th>
        <th width="55px">Bayar</th>
        <th>Total Bayar</th>
        <th>Tanggal order</th>
        <th>Status Beli</th>
        <th>Status Pengiriman</th>
    </tr>
    </theader>
    <?php
    $no=1;
        foreach ($transaksi->getAllDataTransaksi() as $data_tran) :?>
        <tr>
                <?php $data_usr=$akun->getDetailCus($data_tran['id_cus']); ?>
                <td><?= $no++;?></td>
                <td><?= $data_tran['kode_beli']?></td>
                <td><?= $data_usr['nama_cus']?></td>
                <td><?= $data_tran['qty_total']?></td>
                <td><?= $data_tran['bayar']?></td>
                <td><?= $data_tran['total_bayar']?></td>
                <td><?= $data_tran['tgl_order']?></td>
                <td><?= $data_tran['status_beli']?></td>
                <td><?= $data_tran['status_pengiriman']?></td>
                
        </tr>
    
        
    <?php 
        endforeach;?>
    </table>
              </div>
              <div class="modal-footer">
                <a href="../pages/admin/cetak_laporan.php?page=cetak_penjualan">
                <button type="submit" class="btn btn-primary btn-sm">Print</button>
                </a>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->