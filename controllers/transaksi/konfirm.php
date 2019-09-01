<?php
session_start();
include "../../class/Transaksi.php";
$transaksi = new Transaksi();
				   
		  
	   //selesai
	    $transaksi->kode_beli		 = $_POST['kode_beli'];
	    $transaksi->status_beli		 = $_POST['status_beli'];
	    $transaksi->status_pengiriman= $_POST['status_pengiriman'];
		
	$error = $transaksi->konfirm();
	$transaksi->delete_konfirm();
	
	//pengecekan error atau berhasil, !error = berhasil
	if(!$error||!$error2||!$error3){
		//memanggil tampilan detail denan mengirimkan page
		header("location: ../../admin/index.php?page=konfirm_beli");
	}else{
		//memanggil tampilan create kembali
		header("location: ../../admin/index.php?page=konfirm_beli");
	}
		
		?>