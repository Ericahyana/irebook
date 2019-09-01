<?php
	$datadet = null;
	if(isset($_GET['id_su'])) {
		$datadet = $akun->getDetailSu($_GET['id_su']);
	}else if(isset($_GET['id_cus'])) {
		$datadet = $akun->getDetailCus($_GET['id_cus']);
	}
	?>
<div id="page-wrapper" style="min-height: 501px;">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="breadcrumb">
                                    <li class="active">Manage Users</li>
                                                <li><a href="index.php?page=akun">Users</a></li>
                                                <li class="active">Edit User</li>
                        </ul>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->

                    <div>
    <!-- Tab panes -->
    <?php if($datadet) : ?>
    <div class="tab-content">
    <?php if($page=="edit_su"):?>
        <div role="tabpanel" class="tab-pane active" id="admin">
            <div class="row">
                <div class="col-xs-12">

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


                    <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-plus-square-o fa-fw"></i> Edit Akun Admin
                <div class="pull-right">
                    <a href="index.php?page=akun" class="btn btn-default btn-xs" role="button">Back</a>
                </div>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">

                <form method="POST" action="../controllers/akun/admin/update.php" accept-charset="UTF-8">
                <input name="id_su" type="hidden" value="<?= $datadet['id_su']?>">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input class="form-control" name="nama_su" type="text" value="<?= $datadet['nama_su']?>" id="username">

                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input class="form-control" name="password_su" type="password" value="<?= $datadet['password_su']?>" id="password">

                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input class="form-control" name="email_su" type="text" value="<?= $datadet['email_su']?>" id="email">

                        </div>
                        <div class="form-group">
                            <label style="margin-right: 10px;">Account status:</label>
                            <?php if($datadet['status_su']=="enabled"){?>
								<label class="radio-inline">
                                <input type="radio" name="status_su" value="enabled" checked="checked">Enabled
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="status_su" value="disabled">Enabled
                            </label>
							<?php }else if($datadet['status_su']=="disabled") {?>
                            	<label class="radio-inline">
                                <input type="radio" name="status_su" value="enabled">Enabled
                            </label>
								<label class="radio-inline">
                                <input type="radio" name="status_su" value="disabled"  checked="checked">Disabled
                            </label>

							<?php }else {?>
                            		<label class="radio-inline">
                               		 <input type="radio" name="status_su" value="enabled">Enabled
                            		</label>
									<label class="radio-inline">
                                	<input type="radio" name="status_su" value="disabled"  checked="checked">Disabled
                            </label>
                            <?php } ?>
                        </div>
                    </div>
                </div>

                <br>
            	<input name="level" type="hidden" value="admin">

                <div class="row">
                    <div class="col-sm-4">
                        <input class="btn btn-primary center-block save" style="width: 100%" type="submit" value="Save">
                    </div>
                </div>
                </form>
            </div>
            <!-- /.panel-body -->
        		</div>
       		 </div>
            </div>
        </div>
        <?php endif; ?>
<?php if($page=="edit_cus"):?>
        <div role="tabpanel" class="tab-pane active" id="customer">
            <div class="row">
                <div class="col-xs-12">
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
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-plus-square-o fa-fw"></i> Edit Akun Customer
                            <div class="pull-right">
                                <a href="index.php?page=akun" class="btn btn-default btn-xs" role="button">Back</a>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">

                            <form method="POST" action="../controllers/akun/customer/update.php" accept-charset="UTF-8">
                            <input name="id_cus" type="hidden" value="<?= $datadet['id_cus']?>">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="username">Username:</label>
                                        <input class="form-control" name="nama_cus" type="text" value="<?= $datadet['nama_cus']?>" id="username">

                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password:</label>
                                        <input class="form-control" name="password_cus" type="password" value="<?= $datadet['password_cus']?>" id="password">

                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input class="form-control" name="email_cus" type="text" value="<?= $datadet['email_cus']?>" id="email">

                                    </div>

																		<div class="form-group">
                                        <label style="margin-right: 10px;">Jenis kelamin:</label>
                                        <label class="radio-inline">
                                            <input type="radio" name="jk_cus" value="Laki-Laki" checked="checked">Laki-Laki
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="jk_cus" value="Perempuan">Perempuan
                                        </label>
                                    </div>

                                    <div class="form-group">
                                        <label for="email">No HP:</label>
                                        <input class="form-control" name="nohp_cus" type="text" value="<?= $datadet['nohp_cus']?>" id="email">

                                    </div>

                                    <div class="form-group">
                                        <label for="email">Kota:</label>
                                        <input class="form-control" name="kota_cus" type="text"value="<?= $datadet['kota_cus']?>" id="email">

                                    </div>

                                    <div class="form-group">
                                        <label for="email">Kode pos:</label>
                                        <input class="form-control" name="kode_pos_cus" type="text" value="<?= $datadet['kode_pos_cus']?>" id="email">

                                    </div>

                                    <div class="form-group">
                                        <label for="email">Alamat:</label>
                                        	<textarea class="form-control"  name="alamat_cus"  readonly><?= $datadet['alamat_cus']?></textarea>
                                    </div>



                                    <div class="form-group">
                                        <label style="margin-right: 10px;">Account status:</label>
                                       <?php if($datadet['status_cus']=="enabled"){?>
                                    <label class="radio-inline">
                                    <input type="radio" name="status_cus" value="enabled" checked="checked">Enabled
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="status_cus" value="disabled">Disabled
                                </label>
                                <?php }else if($datadet['status_cus']=="disabled") {?>
                                    <label class="radio-inline">
                                    <input type="radio" name="status_cus" value="enabled">Enabled
                                </label>
                                    <label class="radio-inline">
                                    <input type="radio" name="status_cus" value="disabled"  checked="checked">Disabled
                                </label>

                               <?php }else {?>
                            			<label class="radio-inline">
                                         <input type="radio" name="status_cus" value="enabled">Enabled
                                        </label>
                                        <label class="radio-inline">
                                        <input type="radio" name="status_cus" value="disabled"  checked="checked">Disabled
                                </label>
                                <?php } ?>
                                    </div>
                                </div>
                            </div>

                            <br>

                            <div class="row">
                                <div class="col-sm-4">
                                    <input class="btn btn-primary center-block save" style="width: 100%" type="submit" value="Save">
                                </div>
                            </div>

                            </form>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
    <?php endif;?>
</div>



                </div>


<!-- //------------------------------------------------>



                </div>
                <!-- /.container-fluid -->
            </div>
