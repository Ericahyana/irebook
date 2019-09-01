<?php
	include "../../class/produk.php";
	$produk = new Produk();

	//mengisi atribut dengan hasil dari inputan
	$produk->id_buku = $_POST['id_buku'];
	
	//menampung hasil dari method create
	$error = $produk->delete_buku();
	
	//pengecekan error atau berhasil, !error = berhasil
	if(!$error){
		session_start();
		$success= "<p><div class='alert text-center alert-success' role='alert'>Data Terhapus</div></p>";
		$_SESSION['message_success'] = $success;
		//memanggil tampilan detail denan mengirimkan page 
		header("location: ../../admin/index.php?page=daftar_buku");
	}else{
		//membuat session untuk menampilkan pesan error bernama message
		session_start();
		$_SESSION['message'] = "<p><div class='alert alert-danger' role='alert'> Gagal Mengahapus Data : $error </div></p>";
		//memanggil tampilan create kembali
		header("location: ../../admin/index.php?page=daftar_buku");
	}
	
	?>