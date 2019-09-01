<?php
	include_once "db.php";


	class Akun {
//--------------------------------------------------------------------------------
			//membuat variabel
//--------------------------------------------------------------------------------

		//Cek login
		public $email;
		public $password;

		//akun untuk superuser / admin
		public $id_su;
		public $nama_su;
		public $email_su;
		public $password_su;
		public $level_su;
		public $status_su;


		//akun untuk customer / pelanggan
		public $id_cus;
		public $nama_cus;
		public $email_cus;
		public $password_cus;
		public $status_cus;
		public $alamat_cus;
		public $nohp_cus;
		public $kota_cus;
		public $jk_cus;
		public $kode_pos_cus;


//--------------------------------------------------------------------------------
			//end membuat variabel
//--------------------------------------------------------------------------------


//--------------------------------------------------------------------------------
			//Menampilkan Data
//--------------------------------------------------------------------------------
		//Method Login
		public function cek_Login(){

		$db = new Database();
		$dbConnect = $db->connect();
		$sql1 = "SELECT * from customer where email_cus = '{$this->email}' && password_cus='{$this->password}'";
		$sql2 = "SELECT * from superuser where email_su = '{$this->email}' && password_su = '{$this->password}'";
		$sql1 = $dbConnect->query($sql1);
		$sql2 = $dbConnect->query($sql2);

	//	$dbConnect = $db->close();
		$data1 = $sql1->fetch_assoc();
		$data2 = $sql2->fetch_assoc();

		$email_su = $data2['email_su'];
		$nama_su = $data2['nama_su'];
		$id_su = $data2['id_su'];
		$level = $data2['level'];

		$email_cus = $data1['email_cus'];
		$nama_cus = $data1['nama_cus'];
		$id_cus = $data1['id_cus'];

		if($email_su==$this->email)
		{
			if($level=="owner")
			{
				session_start();
				$_SESSION['email_su'] = $email;
				$_SESSION['nama_su'] = $nama_su;
				$_SESSION['id_su'] = $id_su;
				$_SESSION['level'] = $level;

				header("location:../../admin/index.php?page=dashboard&id_su=$id_su");
			}
			else if($level=="admin")
			{
				session_start();
				$_SESSION['email_su'] = $email;
				$_SESSION['nama_su'] = $nama_su;
				$_SESSION['id_su'] = $id_su;

				header("location:../../admin/index.php?page=dashboard&id_su=$id_su");
			}
		}
		else if($email_cus==$this->email)
		{
			session_start();
			$_SESSION['email_cus'] = $email;
			$_SESSION['nama_cus'] = $nama_cus;
			$_SESSION['id_cus'] = $id_cus;
			header("location:../../index.php");
		}else{
				session_start();
				$_SESSION['ps'] = "<p><div class='alert alert-danger' role='alert'> Email / password salah !!</div></p>";
				//memanggil tampilan create kembali
				header("location: ../../pages/akun/login.php");
			 }
		}

		//Method untuk menampikan jumlah data
		public function getJumlahCus(){
			$db = new Database();
			$dbConnect = $db->connect();
			$sql = "SELECT count(*) as jumlah from customer";
			$data = $dbConnect->query($sql);
			$dbConnect = $db->close();
			return $data->fetch_array();
			}



		//Method untuk menampilkan semua data admin
		public function getDataAdmin(){
		$db = new Database();
		$dbConnect = $db->connect();
		$sql = "SELECT * from superuser order by nama_su asc";
		$data = $dbConnect->query($sql);
		$dbConnect = $db->close();
		return $data;
		}

		//Method untuk menampilkan semua data customer
		public function getDataCus(){
		$db = new Database();
		$dbConnect = $db->connect();
		$sql = "SELECT * from customer order by nama_cus";
		$data = $dbConnect->query($sql);
		$dbConnect = $db->close();
		return $data;
		}

		//Method untuk menampilkan data admin berdasarkan id supeuser
		public function getDetailSu($id_su){

		$db = new Database();
		$dbConnect = $db->connect();
		$sql = "SELECT * FROM superuser where id_su = '{$id_su}'";
		$data = $dbConnect->query($sql);
		$dbConnect = $db->close();
		return $data->fetch_array();
		}

		//Method untuk menampilkan data customer berdasarkan id customer
		public function getDetailCus($id_cus){

		$db = new Database();
		$dbConnect = $db->connect();
		$sql = "SELECT * FROM customer where id_cus = '{$id_cus}'";
		$data = $dbConnect->query($sql);
		$dbConnect = $db->close();
		return $data->fetch_array();
		}
//--------------------------------------------------------------------------------
			//end menamlpilkan data
//--------------------------------------------------------------------------------



//--------------------------------------------------------------------------------
			//menambah / mengupdate / menghapus data
//--------------------------------------------------------------------------------

//--------------------------------------------------------------------------------
			//Menambah

		//Method untuk membuat data admin
		public function create_admin() {
		$db = new Database();
		//membuka koneksi
		$dbConnect = $db->connect();
		//query menyimpan data
		$data = mysqli_query($dbConnect ,"INSERT INTO superuser
		(
			id_su,
			nama_su,
			email_su,
			password_su,
			status_su,
			level
		)
		VALUES
		(
			'{$this->id_su}',
			'{$this->nama_su}',
			'{$this->email_su}',
			'{$this->password_su}',
			'{$this->status_su}',
			'{$this->level}'
		);");
		//eksekusi query diatas
		//menampung error query simpan data
		$error = $dbConnect->error;
		//menutup koneksi
		$dbConnect = $db->close();
		//mengembalikan nilai error
		return $error;
		}




//--------------------------------------------------------------------------------
			//Menupdate

			//Bisaaaaa
		public function update_admin() {
		$db = new Database();
		//membuka koneksi
		$dbConnect = $db->connect();
		//query menyimpan data
		$data = mysqli_query($dbConnect, "
			UPDATE superuser
		SET
			nama_su='{$this->nama_su}',
			email_su='{$this->email_su}',
			password_su='{$this->password_su}',
			status_su='{$this->status_su}',
			level='{$this->level}'

		WHERE

			id_su='{$this->id_su}'
		");


		//eksekusi query diatas
		//menampung error query simpan data
		$error = $dbConnect->error;
		//menutup koneksi
		$dbConnect = $db->close();
		//mengembalikan nilai error
		return $error;
		}

//--------------------------------------------------------------------------------
			//Menghapus
		// Akhirnya bisa :D
		public function delete_admin() {
		$db = new Database();
		//membuka koneksi
		$dbConnect = $db->connect();
		//query menyimpan data
		$data = mysqli_query($dbConnect, "
		DELETE FROM
			superuser
		WHERE
			id_su='{$this->id_su}'
		");
		//eksekusi query diatas
		//menampung error query simpan data
		$error = $dbConnect->error;
		//menutup koneksi
		$dbConnect = $db->close();
		//mengembalikan nilai error
		return $error;
		}

//--------------------------------------------------------------------------------
			//Menambah

		//Method untuk membuat data admin
		public function create_customer() {
		$db = new Database();
		//membuka koneksi
		$dbConnect = $db->connect();
		//query menyimpan data
		$data = mysqli_query($dbConnect ,"INSERT INTO customer
		(
			id_cus,
			nama_cus,
			email_cus,
			password_cus,
			status_cus,
			alamat_cus,
			nohp_cus,
			kota_cus,
			jk_cus,
			kode_pos_cus
		)
		VALUES
		(
			'{$this->id_cus}',
			'{$this->nama_cus}',
			'{$this->email_cus}',
			'{$this->password_cus}',
			'{$this->status_cus}',
			'{$this->alamat_cus}',
			'{$this->nohp_cus}',
			'{$this->kota_cus}',
			'{$this->jk_cus}',
			'{$this->kode_pos_cu}'
		);");
		//eksekusi query diatas
		//menampung error query simpan data
		$error = $dbConnect->error;
		//menutup koneksi
		$dbConnect = $db->close();
		//mengembalikan nilai error
		return $error;
		}




//--------------------------------------------------------------------------------
			//Menupdate

			// Masih ga bisa :"(
		public function update_customer() {
		$db = new Database();
		//membuka koneksi
		$dbConnect = $db->connect();
		//query menyimpan data
		$data = mysqli_query($dbConnect, "UPDATE customer
		SET
			nama_cus='{$this->nama_cus}',
			email_cus='{$this->email_cus}',
			password_cus='{$this->password_cus}',
			alamat_cus='{$this->alamat_cus}',
			nohp_cus='{$this->nohp_cus}',
			kota_cus='{$this->kota_cus}',
			jk_cus='{$this->jk_cus}',
			kode_pos_cus='{$this->kode_pos_cus}'

		WHERE

			id_cus='{$this->id_cus}'
		");


		//eksekusi query diatas
		//menampung error query simpan data
		$error = $dbConnect->error;
		//menutup koneksi
		$dbConnect = $db->close();
		//mengembalikan nilai error
		return $error;
		}

//--------------------------------------------------------------------------------
			//Menghapus
		// Akhirnya bisa :D
		public function delete_customer() {
		$db = new Database();
		//membuka koneksi
		$dbConnect = $db->connect();
		//query menyimpan data
		$data = mysqli_query($dbConnect, "
		DELETE FROM
			customer
		WHERE
			id_cus='{$this->id_cus}'
		");
		//eksekusi query diatas
		//menampung error query simpan data
		$error = $dbConnect->error;
		//menutup koneksi
		$dbConnect = $db->close();
		//mengembalikan nilai error
		return $error;
		}


//--------------------------------------------------------------------------------
			//end menambah / mengupdate / menghapus data
//--------------------------------------------------------------------------------

	}
?>
