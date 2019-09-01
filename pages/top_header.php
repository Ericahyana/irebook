<div class="header">	
   	 	    <div class="header-top">
   	 	      <div class="wrap"> 
   	 	    	 <div class="header-top-left">
   	 	    	 	<p>Support: +62-8986897962</p>
   	 	    	 </div>
   				  <div class="header-top-right">
				        <ul>
				            
							<?php if(isset($_SESSION['id_cus'])){?>
							<li><a href="index.php?page=user"><i class="fa  fa-check-square-o"></i>Konfirmasi</a></li> 
                            <li><a href="index.php?page=user"><i class="fa fa-user"></i><?= $_SESSION['nama_cus']?></a></li>
				            <li><a href="pages/akun/logout.php"" ><i class="fa fa-sign-out"></i>keluar</a></li>
                             <?php } ?>
                             <?php if(!isset($_SESSION['id_cus'])){ ?> 
                            <li><a href="pages/akun/login.php"><i class="fa fa-lock"></i>Login</a></li>
				            <li><a href="pages/akun/register.php" ><i class="fa fa-sign-in"></i>Sign Up</a></li>
                             <?php } ?>
				         </ul>
				    </div>
			      <div class="clear"></div>
			     </div> 
		      </div>
</div>