<?php
	include "../../class/produk.php";
	$produk = new Produk();
	
	//mengisi atribut dengan hasil dari inputan
	$produk->id_katalog =  $_POST['id_katalog'];
	$produk->katalog =  $_POST['katalog'];
	
	
	//menampung hasil dari method create
	$error = $produk->update_katalog();
	
	//pengecekan error atau berhasil, !error = berhasil
	if(!$error){
		//memanggil tampilan detail denan mengirimkan page 
		header("location: ../../admin/index.php?page=katalog");
	}else{
		//membuat session untuk menampilkan pesan error bernama message
		session_start();
		$_SESSION['message'] = $error;
		//memanggil tampilan create kembali
		header("location: ../../admin/index.php?page=katalog");
	}
	?>