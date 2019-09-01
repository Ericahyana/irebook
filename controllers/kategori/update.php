<?php
	include"../../class/produk.php";
	$produk = new Produk();
	
	//mengisi atribut dengan hasil dari inputan
	$produk->id_kategori = $_POST['id_kategori'];
	$produk->kategori = $_POST['kategori'];
	
	
	//menampung hasil dari method create
	$error = $produk->update_kategori();
	
	//pengecekan error atau berhasil, !error = berhasil
	if(!$error){
		//memanggil tampilan detail denan mengirimkan page 
		header("location: ../../admin/index.php?page=kategori");
	}else{
		//membuat session untuk menampilkan pesan error bernama message
		session_start();
		$_SESSION['message'] = $error;
		//memanggil tampilan create kembali
		header("location: ../../admin/index.php?page=kategori");
	}
	?>