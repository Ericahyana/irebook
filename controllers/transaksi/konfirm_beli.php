<?php
session_start();
include "../../class/Transaksi.php";
$transaksi = new Transaksi();
				   
		  
	   //selesai
	    $transaksi->id_cus		= $_POST['id_cus'];
		$transaksi->kode_beli	= $_POST['kode_beli'];
		$filename = $_FILES['bukti_bayar']['name'];
		$transaksi->gambar	    = $filename;
		$transaksi->tgl_konfirm = date('d-m-y');	
	
	// upload images
	$target_dir = "../../images/konfirm/";
	$target_file = $target_dir . basename($transaksi->gambar);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
		$check = getimagesize($_FILES["bukti_bayar"]["tmp_name"]);
		if($check !== false) {
			echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			echo "File is not an image.";
			$uploadOk = 0;
		}
	}
	// Check if file already exists
	if (file_exists($target_file)) {
		echo "Sorry, file already exists.";
		$uploadOk = 0;
	}

	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
		echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["bukti_bayar"]["tmp_name"], $target_file)) {
			echo "The file ". basename( $_FILES["gambar"]["name"]). " has been uploaded.";
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	}




	$error = $transaksi->create_konfirm();

	
	//pengecekan error atau berhasil, !error = berhasil
	if(!$error){
		//memanggil tampilan detail denan mengirimkan page
		header("location: ../../index.php?page=user");
	}else{
		//memanggil tampilan create kembali
		session_start();
		$_SESSION['message']=$error;
		header("location: ../../index.php?page=detail_transaksi&kode_beli=$transaksi->kode_beli");
	}
		
		?>