<?php
	include "../../../class/akun.php";
	$akun = new Akun();

	//mengisi atribut dengan hasil dari inputan
	$akun->id_cus = $_POST['id_cus'];
	$akun->nama_cus = $_POST['nama_cus'];
	$akun->email_cus = $_POST['email_cus'];
	$akun->password_cus = $_POST['password_cus'];
	$akun->status_cus = $_POST['status_cus'];
	$akun->alamat_cus =$_POST['alamat_cus'];
	$akun->nohp_cus =$_POST['nohp_cus'];
	$akun->kota_cus =$_POST['kota_cus'];
	$akun->jk_cus =$_POST['jk_cus'];
	$akun->kode_pos_cus =$_POST['kode_pos_cus'];



	//menampung hasil dari method create
	$error = $akun->update_customer();


	//pengecekan error atau berhasil, !error = berhasil
	if(!$error){
		session_start();
		$success= "<p><div class='alert text-center alert-success' role='alert'>Data Terupdate</div></p>";
		$_SESSION['message_success'] = $success;
		//memanggil tampilan detail denan mengirimkan page
		header("location: ../../../admin/index.php?page=user");
	}else{
		//membuat session untuk menampilkan pesan error bernama message
		session_start();
		$_SESSION['message'] = "<p><div class='alert alert-danger' role='alert'> Gagal Mengupdate Data : $error </div></p>";
		//memanggil tampilan create kembali
		header("location: ../../../admin/index.php?page=edit_cus&id_cus=$akun->id_cus");
	}
	?>