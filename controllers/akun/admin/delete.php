<?php
	include "../../../class/akun.php";
	$akun = new Akun();
	
	//mengisi atribut dengan hasil dari inputan
	$akun->id_su = $_POST['id_su'];
	
	//menampung hasil dari method create
	$error = $akun->delete_admin();
	
	//pengecekan error atau berhasil, !error = berhasil
	if(!$error){
		session_start();
		$success= "<p><div class='alert text-center alert-success' role='alert'>Data Terhapus</div></p>";
		$_SESSION['message_success'] = $success;
		//memanggil tampilan detail denan mengirimkan page 
		header("location: ../../../admin/index.php?page=akun");
	}else{
		//membuat session untuk menampilkan pesan error bernama message
		session_start();
		$_SESSION['message'] = "<p><div class='alert alert-danger' role='alert'> Gagal Menghapus Data : $error </div></p>";
		//memanggil tampilan create kembali
		header("location: ../../../admin/index.php?page=akun");
	}
	?>