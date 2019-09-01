<div id="page-wrapper" style="min-height: 501px;">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="breadcrumb">
                                    <li class="active">Manage Users</li>
                                                <li class="active">Users</li>
                        </ul>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->

                    <div>

    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="users">
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
                            <i class="fa fa-users fa-fw"></i> Users
                            <div class="pull-right">
                                <a href="index.php?page=tambah_akun" class="btn btn-primary btn-xs pull-right" role="button">Tambah User Baru</a>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Username</th>
                                                    <th>E-mail</th>
                                                    <th>Roles</th>
                                                    <th>Status</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                             <tbody>
                                             <?php foreach($akun->getDataAdmin() as $data) : ?>
                                            <tr>
                                                <td><?= $data['nama_su']; ?></td>
                                                <td><?= $data['email_su']; ?></td>
                                                <td>Admin</td>
                                                <td> 
												<?php if($data['status_su']=='enabled'){
													echo "<span class='label label-success'>Enabled</span>  </td>";
												}else{
                                                	echo "<span class='label label-danger'>Disabled</span>  </td>";
                                                }
												?>
                                                  </td>
                                                
                                                <td style="text-align: right;">                                                     <a href="index.php?page=edit_su&id_su=<?= $data['id_su']?>" class="btn btn-primary btn-xs">edit</a>
                                                    <div style="display: inline-block">
                                                        <form method="POST" action="../controllers/akun/admin/delete.php">
                                                        
                                                        <input name="id_su" type="hidden" value="<?= $data['id_su']?>">
                                                        <input class="btn btn-danger btn-xs" onclick="if (!confirm(&quot;Kamu yakun ingin menghapus user ?&quot;)) {return false;}" type="submit" value="delete">
                                                        </form>
                                                    </div> </td>
                                            </tr>
                                             <?php endforeach; ?>
                                             <?php foreach($akun->getDataCus() as $data) : ?>
                                            <tr>
                                                <td><?= $data['nama_cus']; ?></td>
                                                <td><?= $data['email_cus']; ?></td>
                                                <td>Customer</td>
                                                <td> 
                                                <?php if($data['status_cus']=='enabled'){
													echo "<span class='label label-success'>Enabled</span>  </td>";
												}else{
                                                	echo "<span class='label label-danger'>Disabled</span>  </td>";
                                                }
												?>
                                                
                                                
                                                <td style="text-align: right;">                                                     <a href="index.php?page=edit_cus&id_cus=<?= $data['id_cus']?>" class="btn btn-primary btn-xs">edit</a>
                                                    <div style="display: inline-block">
                                                        <form method="POST" action="../controllers/akun/customer/delete.php" accept-charset="UTF-8"><input name="id_cus" type="hidden" value="<?= $data['id_cus']?>">
                                                        <input class="btn btn-danger btn-xs" onclick="if (!confirm(&quot;Kamu yakun ingin menghapus user ?&quot;)) {return false;}" type="submit" value="delete">
                                                        </form>
                                                    </div> </td>
                                            </tr>
                                             <?php endforeach; ?>                                                                                    
                                        	</tbody></table>
                                    </div>
                                </div>
                            </div>
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
                <!-- /.container-fluid -->
            </div>