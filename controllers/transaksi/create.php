<?php
session_start();
include "../../class/Produk.php";
$produk = new Produk();
include "../../class/Transaksi.php";
$transaksi = new Transaksi();
				   
		   $no = 1;
           $qty_total=0;
           $total = 0;
		   $rand= rand();
           if (isset($_SESSION['item'])) {
               foreach ($_SESSION['item'] as $key => $val) {
                   $data= $produk->getDetail($key);
                   $data_stok= $produk->getStok($key);
                   $jumlah_harga = $data['harga'] * $val;
                   $total += $jumlah_harga;
                   $qty_total +=$val;


				
			   //Pembelian
			   $transaksi->id_cus= $_SESSION['id_cus'];
			   $transaksi->kode_beli= $rand;
			   $transaksi->id_buku= $key;
			   $transaksi->qty= $val;
			   $transaksi->harga= $data['harga'];
			   $transaksi->total_harga= $total;
			   $error = $transaksi->create_pembelian();

            } } 
		
		
	   // tujuan
	   $transaksi->nama_penerima= $_POST['nama_penerima'];
	   $transaksi->kode_beli= $rand;
	// $transaksi->email= $_POST['email_cus'];
	   $transaksi->no_hp= $_POST['no_hp'];
	   $transaksi->kode_pos= $_POST['kode_pos_cus'];
	   $transaksi->kota= $_POST['kota_cus'];
	   $transaksi->alamat= $_POST['alamat_cus'];
	   $error2 = $transaksi->create_tujuan();
					
	   //selesai
	   $transaksi->kode_beli= $rand;
	   $transaksi->id_cus= $_SESSION['id_cus'];
	   $transaksi->qty_total = $qty_total;
	   $transaksi->bayar= $jumlah_harga;
	   $transaksi->total_bayar= $total;
	   $transaksi->tgl_order= date('d-m-y');
	   $transaksi->cara_bayar= $_POST['carabayar'];
	   $transaksi->bank= $_POST['bank'];
	   $transaksi->nama_rek= $_POST['nama_rek'];
	   $transaksi->no_rek= $_POST['no_rek'];
	   
		
		
	$error3 = $transaksi->create_transaksi();

	
	//pengecekan error atau berhasil, !error = berhasil
	if(!$error||!$error2||!$error3){
		//memanggil tampilan detail denan mengirimkan page
		header("location: ../../index.php?page=selesai&kode_beli=$transaksi->kode_beli");
	}else{
		//memanggil tampilan create kembali
		header("location: ../../index.php?page=checkout");
	}
		
		?>