
<div id="page-wrapper" style="min-height: 501px;">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="breadcrumb">
                                    <li class="active">Manage Users</li>
                                                <li><a href="index.php?page=akun">Users</a></li>
                                                <li class="active">Create User</li>
                        </ul>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->

                    <div>
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active">
            <a href="#admin" aria-controls="admin" role="tab" data-toggle="tab">Admin User</a>
        </li>
        <li role="presentation">
            <a href="#customer" aria-controls="customer" role="tab" data-toggle="tab">Customer User</a>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
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
                <i class="fa fa-plus-square-o fa-fw"></i> Buat Akun Admin
                <div class="pull-right">
                    <a href="index.php?page=akun" class="btn btn-default btn-xs" role="button">Back</a>
                </div>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">

                <form method="POST" action="../controllers/akun/admin/create.php" accept-charset="UTF-8">
                <input name="id_su" type="hidden" >
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input class="form-control" name="nama_su" type="text" value="" id="username">

                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input class="form-control" name="password_su" type="password" value="" id="password">

                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input class="form-control" name="email_su" type="text" value="" id="email">

                        </div>
                        <div class="form-group">
                            <label style="margin-right: 10px;">Account status:</label>
                            <label class="radio-inline">
                                <input type="radio" name="status_su" value="enabled" checked="checked">Enabled
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="status_su" value="disabled">Disabled
                            </label>
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
        <div role="tabpanel" class="tab-pane" id="customer">
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
                            <i class="fa fa-plus-square-o fa-fw"></i> Buat Akun Customer
                            <div class="pull-right">
                                <a href="index.php?page=akun" class="btn btn-default btn-xs" role="button">Back</a>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">

                            <form method="POST" action="../controllers/akun/customer/create.php" accept-charset="UTF-8">
                            <input name="id_cus" type="hidden" >
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="username">Username:</label>
                                        <input class="form-control" name="nama_cus" type="text" value="" id="username">

                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password:</label>
                                        <input class="form-control" name="password_cus" type="password" value="" id="password">

                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input class="form-control" name="email_cus" type="text" value="" id="email">

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
                                        <input class="form-control" name="nohp_cus" type="text" value="" id="email">

                                    </div>

                                    <div class="form-group">
                                        <label for="email">Kota:</label>
                                        <input class="form-control" name="kota_cus" type="text" value="" id="email">

                                    </div>

                                    <div class="form-group">
                                        <label for="email">Kode pos:</label>
                                        <input class="form-control" name="kode_pos_cus" type="text" value="" id="email">

                                    </div>

                                    <div class="form-group">
                                        <label for="email">Alamat:</label>
                                        	<textarea class="form-control" id="inputExperience" name="alamat_cus"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label style="margin-right: 10px;">Account status:</label>
                                        <label class="radio-inline">
                                            <input type="radio" name="status_cus" value="enabled" checked="checked">Enabled
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="status_cus" value="disabled">Disabled
                                        </label>
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
    </div>
</div>

<script>
    $(document).ready(function () {
        smtpChecked();
    });

    $('#mailing input[type="radio"]').change(function () {
        smtpChecked();
    });

    function smtpChecked() {
        if ($('#mailing input[value="smtp"]').is(':checked')) {
            $('#smtp-conf').show();
        } else {
            $('#smtp-conf').hide();
        }
    }
</script>


                </div>


<!-- //------------------------------------------------>



                </div>
                <!-- /.container-fluid -->
            </div>
