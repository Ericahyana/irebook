<div class="row">
  <div class="col-md-5" style="margin-left:100px;margin-right:0px">

    <!-- Profile Image -->
      <div class="box box-primary">
        <div class="box-body box-profile">
      <br>
      <h2>Daftar Barang yang anda beli</h2>
      <div class="col-sm-10">
        <table width="100%" class="table">
          <tr>
              <th>#</th>
              <th>Gambar</th>
              <th>Judul</th>
              <th>Harga</th>
              <th>QTY</th>
              <th>Total Harga</th>
          </tr>
          <?php
           $no = 1;
           $qty_total=0;
           $total = 0;

           if (isset($_SESSION['item'])) {
               foreach ($_SESSION['item'] as $key => $val) {
                   $data= $produk->getDetail($key);
                   $data_stok= $produk->getStok($key);
                   $jumlah_harga = $data['harga'] * $val;
                   $total += $jumlah_harga;
                   $qty_total +=$val;

           ?>
          <tr>
              <td><?= $no++; ?></td>
              <td><img src="images/novel_img/<?= $data['gambar']; ?>" width="50px" height="50px"></td>
              <td><?= $data['judul']; ?></td>
              <td><?= $data['harga']; ?></td>
			    <td><?= $val; ?></td>
              <td><?= $jumlah_harga; ?></td>
          </tr>
        <?php } } ?>
			<tr>
				<td align="right" colspan="6">Harga Total : <?= $total; ?></td>
			</tr>
        </table>
      </div>
    </div>
  </div>
    <!-- /.box -->

    <!-- About Me Box -->

    <!-- /.box -->
  </div>
<?php if(isset($_GET['data'])){
    $nama= $data_cus['nama_cus'];
    $email_cus= $data_cus['email_cus'];
    $nohp= $data_cus['nohp_cus'];
    $kode_pos= $data_cus['kode_pos_cus'];
    $kota= $data_cus['kota_cus'];
    $alamat= $data_cus['alamat_cus'];

}else{
  $nama=null;
  $email_cus=null;
  $nohp=null;
  $kode_pos=null;
  $kota=null;
  $alamat=null;
}
?>
<div class="col-md-6">
    <br>
  <h2 >Checkout</h2><h3 style="font-size:20px;">silahkan isi data tujuan pengiriman</h3>

  <form class="form-horizontal" action="controllers/transaksi/create.php" method="post" id="formTrans">
    <br>
    <div class="form-group">
      <label for="inputName" class="col-sm-2 control-label"></label>

      <div class="col-sm-10">
        <a href="index.php?page=checkout&data=<?= $data_cus['id_cus']?>" class="btn btn-success btn-sm">Pakai data user ??</a>
      </div>
    </div>
    <div class="form-group">
      <label for="inputName" class="col-lg-2  control-label">Name</label>

      <div class="col-sm-10">
        <input type="text" name="nama_penerima" class="form-control" placeholder="Name" value="<?= $nama; ?>">
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail" class="col-sm-2 control-label">Email</label>

      <div class="col-sm-10">
        <input type="text" name="email_cus" class="form-control" id="inputEmail" placeholder="Email"  value="<?= $email_cus; ?>">
      </div>
    </div>
    <div class="form-group">
      <label for="inputName" class="col-sm-2 control-label">No Hp</label>

      <div class="col-sm-10">
        <input type="text" name="no_hp" class="form-control" id="inputName" placeholder="No HP" value="<?= $nohp; ?>">
      </div>
    </div>
    <div class="form-group">
      <label for="inputExperience" class="col-sm-2 control-label">Kode Pos</label>

      <div class="col-sm-10">
        <input type="text" name="kode_pos_cus" class="form-control"  placeholder="Kode Pos"  value="<?= $kode_pos; ?>">
      </div>
    </div>
    <div class="form-group">
      <label for="inputExperience" class="col-sm-2 control-label">Kota</label>

      <div class="col-sm-10">
        <input type="text" name="kota_cus" class="form-control"  placeholder="Kota"  value="<?= $kota; ?>">
      </div>
    </div>
    <div class="form-group">
      <label for="inputExperience" class="col-sm-2 control-label">Alamat</label>

      <div class="col-sm-10">
        <textarea class="form-control" name="alamat_cus" placeholder="Alamat"> <?= $alamat; ?></textarea>
      </div>
    </div>
    <hr >

    <div class="form-group">
      <label for="inputExperience" class="col-sm-2 control-label">Cara Bayar</label>

      <div class="col-sm-10">
        <select name="carabayar" class="form-control" required>
          <option value="">Select an option</option>
          <option value="1">Transfer</option>
          <option value="2">Bayar Di tempat</option>
        </select>
      </div>
    </div>

    <div class="1 via">
        <div class="form-group">
          <label for="inputExperience" class="col-sm-2 control-label">Bank</label>

          <div class="col-sm-10">
            <input type="text" name="bank" class="form-control">
          </div>
        </div>

        <div class="form-group">
          <label for="inputExperience" class="col-sm-2 control-label">No Rekening</label>

          <div class="col-sm-10">
            <input type="text" name="no_rek"class="form-control" >
          </div>
        </div>

        <div class="form-group">
          <label for="inputExperience" class="col-sm-2 control-label">Nama Rekening</label>

          <div class="col-sm-10">
            <input type="text" name="nama_rek" class="form-control" >
          </div>
        </div>
    </div>

    <div class="2 via">
        <div class="form-group">
              <label for="inputExperience" class="col-sm-2 control-label"></label>
              <div class="col-sm-10">
            Via bayar di tempat
          </div>
        </div>
    </div>
    <div class="form-group">
      <br>
      <label for="inputName" class="col-sm-2 control-label"></label>

      <div class="col-sm-10">
        <button type="submit" class="btn btn-info btn-lg">Lanjutkan Pembelian &raquo;</button>
        <a class="btn btn-danger btn-lg">Kembali</a>
      </div>
    </div>
    <br><br><br>
  </form>

</div>
<!-- /.col -->
<!-- script untuk show hide cara bayar -->
<script type="text/javascript">
$(document).ready(function(){
    $("select").change(function(){
        $(this).find("option:selected").each(function(){
            var optionValue = $(this).attr("value");
            if(optionValue){
                $(".via").not("." + optionValue).hide();
                $("." + optionValue).show();
            } else{
                $(".via").hide();
            }
        });
    }).change();
});
</script>