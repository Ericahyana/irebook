<?php
	include "../../class/akun.php";
	$akun = new Akun();
	
	//mengisi atribut dengan hasil dari inputan
	$akun->email    = $_POST['email'];
	$akun->password = $_POST['password'];
	
	
	
	//menampung hasil dari method create
	$error = $akun->cek_Login();
	
	
	?>