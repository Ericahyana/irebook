<?php
	include "../../class/produk.php";
	$produk = new Produk();
	
	//mengisi atribut dengan hasil dari inputan
	$produk->judul =  $_POST['judul'];
	
	//menampung hasil dari method create
	$error = $produk->cariBuku();
	
	//pengecekan error atau berhasil, !error = berhasil
	if(!$error){
		
		//memanggil tampilan detail denan mengirimkan page 
		header("location: ../../index.php?page=cari&judul=$produk->judul");
	}else{
		
		header("location: ../../index.php?page=cari&judul=$produk->judul");
	}
	?>