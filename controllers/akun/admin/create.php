<?php
	include "../../../class/akun.php";
	$akun = new Akun();
	
	//mengisi atribut dengan hasil dari inputan
	$akun->id_su = $_POST['id_su'];
	$akun->nama_su = $_POST['nama_su'];
	$akun->status_su = $_POST['status_su'];
	$akun->email_su = $_POST['email_su'];
	$akun->password_su = $_POST['password_su'];
	$akun->level = $_POST['level'];
	
	
	
	//menampung hasil dari method create
	$error = $akun->create_admin();
	
	//pengecekan error atau berhasil, !error = berhasil
	if(!$error){
		session_start();
		$success= "<p><div class='alert text-center alert-success' role='alert'>Data Tersimpan</div></p>";
		$_SESSION['message_success'] = $success;
		//memanggil tampilan detail denan mengirimkan page 
		header("location: ../../../admin/index.php?page=tambah_akun#admin");
	}else{
		//membuat session untuk menampilkan pesan error bernama message
		session_start();
		$_SESSION['message'] = "<p><div class='alert alert-danger' role='alert'> Gagal Menyimpan Data : $error </div></p>";
		//memanggil tampilan create kembali
		header("location: ../../../admin/index.php?page=tambah_akun");
	}
	?>