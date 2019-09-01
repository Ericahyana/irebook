<?php 
include "class/Transaksi.php";
	$transaksi = new Transaksi();

	
	?>

<div class="row">
	<div class="col-md-3">
	</div>

	<!-- /.col -->
	<div class="col-md-7">
		<h2 >Profile User</h2>
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
		<div class="nav-tabs-custom">
			<ul class="nav nav-tabs">
				<li class="active"><a href="#activity" data-toggle="tab">Akun</a></li>
				<li><a href="#settings" data-toggle="tab">Edit Akun</a></li>
			</ul>
			<div class="tab-content">

				<!-- /.tab-pane -->

								<div class="active tab-pane" id="activity">
									<form class="form-horizontal">
										<br>
										<div class="form-group">
											<label for="inputName" class="col-sm-2 control-label">Name</label>

											<div class="col-sm-10">
												<input type="email" class="form-control" id="inputName" placeholder="Name" value="<?= $data_cus['nama_cus']?>" readonly>
											</div>
										</div>
										<div class="form-group">
											<label for="inputEmail" class="col-sm-2 control-label">Email</label>

											<div class="col-sm-10">
												<input type="email" class="form-control" id="inputEmail" placeholder="Email"  value="<?= $data_cus['email_cus']?>"readonly>
											</div>
										</div>
										<div class="form-group">
											<label for="inputName" class="col-sm-2 control-label">Password</label>

											<div class="col-sm-10">
												<input type="password" class="form-control" id="inputName" placeholder="Password" value="<?= $data_cus['password_cus']?>" readonly>
											</div>
										</div>
										<div class="form-group">
											<label for="inputName" class="col-sm-2 control-label">Status User</label>

											<div class="col-sm-10">
											<?php if($data_cus['status_cus']=="enabled"){?>
												<a class="btn btn-info btn-sm">Active</a>
											<?php }else {?>	
												<a class="btn btn-danger btn-sm">Off</a>
											<?php } ?>
											</div>
										</div>
										<div class="form-group">
											<label for="inputName" class="col-sm-2 control-label">No Hp</label>

											<div class="col-sm-10">
												<input type="text" class="form-control" id="inputName" placeholder="Name"  value="<?= $data_cus['nohp_cus']?>"readonly>
											</div>
										</div>
										<div class="form-group">
											<label for="inputName" class="col-sm-2 control-label">Jenis Kelamin</label>

											<div class="col-sm-10">
											<?php if($data_cus['jk_cus']=="lakilaki"){?>
												<input type="radio" name="jk_su" value="lakilaki" checked="checked">Laki-Laki &nbsp; &nbsp;
												<input type="radio" name="jk_su" value="perempuan">Perempuan
											<?php }else if($data_cus['jk_cus']=="perempuan") {?>
												<input type="radio" name="jk_su" value="lakilaki">Laki-Laki &nbsp; &nbsp;
												<input type="radio" name="jk_su" value="perempuan" checked="checked">Perempuan
											<?php }else {?>
												<input type="radio" name="jk_su" value="lakilaki">Laki-Laki &nbsp; &nbsp;
												<input type="radio" name="jk_su" value="perempuan">Perempuan
											<?php } ?>
											</div>
										</div>
										<div class="form-group">
											<label for="inputExperience" class="col-sm-2 control-label">Kode Pos</label>

											<div class="col-sm-10">
											<input type="email" class="form-control" id="inputName" placeholder="Name"  value="<?= $data_cus['kode_pos_cus']?>"readonly>
											</div>
										</div>
										<div class="form-group">
											<label for="inputExperience" class="col-sm-2 control-label">Kota</label>

											<div class="col-sm-10">
												<input type="email" class="form-control" id="inputName" placeholder="Name"  value="<?= $data_cus['kota_cus']?>"readonly>
											</div>
										</div>
										<div class="form-group">
											<label for="inputExperience" class="col-sm-2 control-label">Alamat</label>

											<div class="col-sm-10">
												<textarea class="form-control" id="inputExperience" placeholder="Experience"  readonly><?= $data_cus['alamat_cus']?></textarea>
											</div>
										</div>

									</form>
									<div class="form-group">
										<br>
										<h2>Riwayat Transaksi</h2>
										<div class="col-sm-12">
											<table width="70%" class="table">
												<tr>
														<th>#</th>
														<th>Kode Pembelian</th>
														<th>QTY total</th>
														<th>Harga Total</th>
														<th>Tanggal Order</th>
														<th>Status Beli</th>
														<th>Status Pengiriman</th>
														<th>Action</th>
												</tr>
												<?php 
													$no=1;
												foreach($transaksi->getDataTransaksi($data_cus['id_cus']) as $data_transaksi) :?>
												
												<tr>
														<td><?= $no++;?></td>
														<td><?= $data_transaksi['kode_beli']?></td>
														<td><?= $data_transaksi['qty_total']?></td>
														<td><?= $data_transaksi['total_bayar']?></td>
														<td><?= $data_transaksi['tgl_order']?></td>
														<td><?= $data_transaksi['status_beli']?></td>
														<td><?= $data_transaksi['status_pengiriman']?></td>
														<td><a href="index.php?page=detail_transaksi&kode_beli=<?= $data_transaksi['kode_beli']?>" class="btn btn-info btn-sm">Detail</a></td>
												</tr>
													<?php endforeach; ?>			
											</table>
											<br><br><br><br>
									</div>
								</div>	
							</div>
				<!-- /.tab-pane -->

				
				
				<div class="tab-pane" id="settings">
					<form class="form-horizontal" action="controllers/akun/user/update.php" method="post">
						<br>
						<input type="hidden" name="id_cus" value="<?= $data_cus['id_cus']?>" >
						<div class="form-group">
							<label for="inputName" class="col-sm-2 control-label">Name</label>

							<div class="col-sm-10">
								<input type="text" class="form-control" name="nama_cus" placeholder="Name" value="<?= $data_cus['nama_cus']?>" >
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail" class="col-sm-2 control-label">Email</label>

							<div class="col-sm-10">
								<input type="text" class="form-control" name="email_cus" placeholder="Email"  value="<?= $data_cus['email_cus']?>">
							</div>
						</div>
						<div class="form-group">
							<label for="inputName" class="col-sm-2 control-label">Password</label>

							<div class="col-sm-10">
								<input type="password" class="form-control" name="password_cus" placeholder="Password" value="<?= $data_cus['password_cus']?>" readonly>
							</div>
						</div>
						<div class="form-group">
							<label for="inputName" class="col-sm-2 control-label">Status User</label>

							<div class="col-sm-10">
							<?php if($data_cus['status_cus']=="enabled"){?>
								<a class="btn btn-info btn-sm">Active</a>
							<?php }else {?>	
								<a class="btn btn-danger btn-sm">Off</a>
							<?php } ?>
							</div>
						</div>
						<div class="form-group">
							<label for="inputName" class="col-sm-2 control-label">No Hp</label>

							<div class="col-sm-10">
								<input type="text" class="form-control" name="nohp_cus" placeholder="No Hp"  value="<?= $data_cus['nohp_cus']?>">
							</div>
						</div>
						<div class="form-group">
							<label for="inputName" class="col-sm-2 control-label">Jenis Kelamin</label>

							<div class="col-sm-10">
							<?php if($data_cus['jk_cus']=="lakilaki"){?>
								<input type="radio" name="jk_cus" value="lakilaki" checked="checked">Laki-Laki &nbsp; &nbsp;
								<input type="radio" name="jk_cus" value="perempuan">Perempuan
							<?php }else if($data_cus['jk_cus']=="perempuan") {?>
								<input type="radio" name="jk_cus" value="lakilaki">Laki-Laki &nbsp; &nbsp;
								<input type="radio" name="jk_cus" value="perempuan" checked="checked">Perempuan
							<?php }else {?>
								<input type="radio" name="jk_cus" value="lakilaki">Laki-Laki &nbsp; &nbsp;
								<input type="radio" name="jk_cus" value="perempuan">Perempuan
                            <?php } ?>






							</div>
						</div>
						<div class="form-group">
							<label for="inputExperience" class="col-sm-2 control-label">Kode Pos</label>

							<div class="col-sm-10">
							<input type="text" class="form-control" name="kode_pos_cus" placeholder="Kode pos"  value="<?= $data_cus['kode_pos_cus']?>">
							</div>
						</div>
						<div class="form-group">
							<label for="inputExperience" class="col-sm-2 control-label">Kota</label>

							<div class="col-sm-10">
								<input type="text" class="form-control" name="kota_cus" placeholder="Kota"  value="<?= $data_cus['kota_cus']?>">
							</div>
						</div>
						<div class="form-group">
							<label for="inputExperience" class="col-sm-2 control-label">Alamat</label>

							<div class="col-sm-10">
								<textarea class="form-control" name="alamat_cus" id="inputExperience" placeholder="Alamat"  ><?= $data_cus['alamat_cus']?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="inputName" class="col-sm-2 control-label"></label>

							<div class="col-sm-10">
								<button class="btn btn-info btn-sm" type="submit">Update Akun</button>
							</div>
						</div>
					</form>
					<br>
					<br>
					<br>
					<br>
				</div>
				<!-- /.tab-pane -->
			</div>
			<!-- /.tab-content -->
		</div>
		<!-- /.nav-tabs-custom -->
	</div>
	<!-- /.col -->
</div>
