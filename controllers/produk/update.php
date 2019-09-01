<?php
	include "../../class/produk.php";
	$produk = new Produk();
	$db = new Database();
	$dbConnect = $db->connect();
	
	//mengisi atribut dengan hasil dari inputan
	$produk->id_buku = $_POST['id_buku'];
	$produk->id_katalog = $_POST['id_katalog'];
	$produk->id_stok = $_POST['id_stok'];
	$id_kategori = $_POST['kategori'];
	$produk->judul = $_POST['judul'];
	$produk->stok = $_POST['stok'];
	$produk->rating = $_POST['rating'];
	$produk->pengarang = $_POST['pengarang'];
	$produk->penerbit = $_POST['penerbit'];
	$produk->hal = $_POST['hal'];
	$namafile = $_FILES['gambar']['name'];  
	$produk->gambar = $namafile;
	$produk->harga = $_POST['harga'];
	$produk->deskripsi = $_POST['deskripsi'];
	$produk->tanggal = $_POST['tanggal'];
	$produk->tanggal_edit = $_POST['tanggal_edit'];
	//insert multi combobox kategori
	if(isset($id_kategori)){
		$error = $produk->delete_kategori2buku();//menghapus ketegori sebelum nya
		foreach($id_kategori as $kateg){
			$produk->id_kategori=$kateg;
			
			$error = $produk->create_kategori2buku();
		}
	}
	//insert stok
	if(isset($produk->stok)){
			
			$error = $produk->update_stok();
		
	}
	
	
	// upload images
	$target_dir = "../../images/novel_img/";
	$target_file = $target_dir . basename($namafile);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
		$check = getimagesize($_FILES["gambar"]["tmp_name"]);
		if($check !== false) {
			echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			echo "File is not an image.";
			$uploadOk = 0;
		}
	}

	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
		$uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		$produk->gambar = $_POST['gambar_old'];
	// if everything is ok, try to upload file
	} 
	if ($uploadOk==1) {
		if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
		echo $produk->gambar;
			
		} else {
			echo "Gagal Upload";
		}
	}
	   
	
	//menampung hasil dari method update
	$error = $produk->update_buku();
	//pengecekan error atau berhasil, !error = berhasil
	if(!$error){
		session_start();
		$success= "<p><div class='alert text-center alert-success' role='alert'>Data Terupdate</div></p>";
		$_SESSION['message_success'] = $success;
		//memanggil tampilan detail denan mengirimkan page 
		header("location:  ../../admin/index.php?page=daftar_buku");
	}else{
		//membuat session untuk menampilkan pesan error bernama message
		session_start();
		$_SESSION['message'] = "<p><div class='alert alert-danger' role='alert'> Gagal Menyimpan Data : $error </div></p>";
		//memanggil tampilan update kembali
		header("location: ../../admin/index.php?page=update_buku&id_buku=$produk->id_buku");
	}
	?>