<?php
	class Database {
		
		private $conn;
		 
		
		//Method menghubungkan ke data base
		public function connect(){
				$host = "localhost";	//nama host
				$user = "root";	//username phpMyAdmin
				$pass = "";	//password phpMyAdmin
				$db   = "db_buku";	//nama database
			$this->conn = new mysqli($host,$user,$pass,$db);
			return $this->conn;
		}
		
		//Method untuk memutuskan koneksi ke database
		public function close(){
			return $this->conn->close();
		}
		
	}
	
	
?>