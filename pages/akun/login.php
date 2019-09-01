
<html>
<head>
  <link rel="stylesheet" href="../../bootstrap/custom/custom.css">
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.css">
  <title></title>
</head>
<body>
  <div class="wrapper">
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
  <form class="form-signin" action="../../controllers/akun/check-login.php" method="post">
    <h2 class="form-signin-heading" align="center">SILAHKAN LOGIN</h2><br />
    <input type="text" class="form-control" name="email" placeholder="Masukan Username" required/><br />
    <input type="password" class="form-control" name="password" placeholder="Masukan Password" required/><br />
    <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Login</button>
  </form>
</div>

<script src="../../bootstrap/js/bootstrap.min.js"></script>
<script src="../../bootstrap/js/jquery-1.10.2.min.js"></script>
</body>
</html>