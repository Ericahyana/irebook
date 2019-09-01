<?php
include"../../class/produk.php";
	$produk = new Produk();
    if (!isset($_SESSION)) {
        session_start();
    }
     
    if (isset($_GET['act']) && isset($_GET['ref'])) {
        $act = $_GET['act'];//dapatkan action session
        $ref = $_GET['ref'];//dapatkan action ref/halaman web nya   
		 
		$data_stok=$produk->getStok($_GET['id_buku']);
		$id_buku=$_GET['id_buku'];
		$produk->id_buku=$id_buku;
		$stok=$data_stok['stok'];
		$produk->id_stok = $data_stok['id_stok'];
		
        if ($act == "masukan") {
            if (isset($_GET['id_buku'])) {
                $id_buku = $_GET['id_buku'];
                if (isset($_SESSION['item'][$id_buku])) {
                    $_SESSION['item'][$id_buku] += 1;
					$produk->stok=$stok-=1;
					$error=$produk->update_stok();
                } else {
                    $_SESSION['item'][$id_buku] = 1;
					$produk->stok=$stok-=1;
					$error=$produk->update_stok(); 
                }
				
            }
        } elseif ($act == "tambah") {
            if (isset($_GET['id_buku'])) {
                $id_buku = $_GET['id_buku'];
                if (isset($_SESSION['item'][$id_buku])) {
                    $_SESSION['item'][$id_buku] += 1;
					$produk->stok=$stok-=1;
					$error=$produk->update_stok();
                }
            }
        } elseif ($act == "kurang") {
            if (isset($_GET['id_buku'])) {
                $id_buku = $_GET['id_buku'];
                if (isset($_SESSION['item'][$id_buku])) {
                    $_SESSION['item'][$id_buku] -= 1;
					$produk->stok=$stok+=1;
					$error=$produk->update_stok();
                }
            }
        } elseif ($act == "hapus") {
            if (isset($_GET['id_buku'])) {
                $id_buku = $_GET['id_buku'];
				$qty=$_GET['qty'];
                if (isset($_SESSION['item'][$id_buku])) 
				{	
						$produk->stok=$stok+= $qty;
						$error=$produk->update_stok();
						unset($_SESSION['item'][$id_buku]);
						
                }
            }
        } elseif ($act == "hilangkan") {
            if (isset($_SESSION['item'])) {
                foreach ($_SESSION['item'] as $key => $val) {
                    unset($_SESSION['item'][$key]);
                }
                unset($_SESSION['item']);
            }
        }
		if($act=="masukan"){ 
        header ("location:../../" . $ref ."&opsi=masukan&id_buku=".$id_buku); 
		}
        if($act=="tambah") {
		header ("location:../../" . $ref);
		}
		if($act=="kurang") {
		header ("location:../../" . $ref);
		}
		if($act=="hapus") {
		header ("location:../../" . $ref);
		}
    }
?>