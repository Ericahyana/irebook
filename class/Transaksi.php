<?php
	include_once "db.php";


	class Transaksi {
	
		//data user
		public $id_cus;
		
		//data buku
		public $id_buku;

		//--- selesai ---
		public $kode_beli;
		public $qty_total;
		public $bayar;
		public $total_bayar;
		public $tgl_order;
		public $bank;
		public $nama_rek;
		public $no_rek;

		//--- pembelian ---
		public $id_beli;
		public $qty;
		public $harga;
		public $total_harga;

		//--- Tujuan ---
		public $id_tujuan;
		public $nama_penerima;
		public $kota;
		public $kode_pos;
		public $no_hp;
		public $alamat;


		//--- konfirm --
		public $gambar;
		public $tgl_konfirm;


//------Memampilkan data-----------------------------------------------------------------------------------||

		//Method untuk menampilkan semua data traksaksi sesuai user
		public function getAllDataTransaksi(){
			$db = new Database();
			$dbConnect = $db->connect();
			$sql = "SELECT * from selesai order by tgl_order DESC";
			$data = $dbConnect->query($sql);
			$dbConnect = $db->close();
			return $data;
			}
		//Method untuk menampilkan semua data traksaksi sesuai user
		public function getDataTransaksi($id_cus){
			$db = new Database();
			$dbConnect = $db->connect();
			$sql = "SELECT * from selesai where id_cus='{$id_cus}' order by tgl_order DESC";
			$data = $dbConnect->query($sql);
			$dbConnect = $db->close();
			return $data;
			}
		//Method untuk menampilkan semua data beli sesuai user
		public function getDataPembelian($kode_beli){
			$db = new Database();
			$dbConnect = $db->connect();
			$sql = "SELECT * from pembelian where kode_beli='{$kode_beli}'";
			$data = $dbConnect->query($sql);
			$dbConnect = $db->close();
			return $data;
			}	
		//Method untuk menampilkan tujuan pengirman sesuai user
		public function getDataTujuan($kode_beli){
			$db = new Database();
			$dbConnect = $db->connect();
			$sql = "SELECT * from tujuan where kode_beli='{$kode_beli}'";
			$data = $dbConnect->query($sql);
			$dbConnect = $db->close();
			return $data->fetch_array();
			}	

		public function check_konfirm($kode_beli){
			$db = new Database();
			$dbConnect = $db->connect();
			$sql = "SELECT * from selesai where kode_beli='{$kode_beli}'";
			$data = $dbConnect->query($sql);
			$dbConnect = $db->close();
			return $data->fetch_array();
			}	

		public function getDataKonfirm(){
			$db = new Database();
			$dbConnect = $db->connect();
			$sql = "SELECT * from konfirm_beli order by tgl_konfirm desc";
			$data = $dbConnect->query($sql);
			$dbConnect = $db->close();
			return $data;
			}		



//------Pembelian-------------------------------------------------------------------------------------------||
		


		// Akhirnya bisa :D
		public function create_pembelian() {
		$db = new Database();
		//membuka koneksi
		$dbConnect = $db->connect();
		//query menyimpan data

		$data = mysqli_query($dbConnect ,
		"INSERT INTO
		pembelian
		(
		id_beli,
		kode_beli,
		id_cus,
		id_buku,
		qty,
		harga,
		total_harga
		)
		VALUES
		(

		'{$this->id_beli}',
		'{$this->kode_beli}',
		'{$this->id_cus}',
		'{$this->id_buku}',
		'{$this->qty}',
		'{$this->harga}',
		'{$this->total_harga}'

		);");
		//menampung error query simpan data
		$error = $dbConnect->error;
		//menutup koneksi
		$dbConnect = $db->close();
		//mengembalikan nilai error
		return $error;
		}
		
//------pembelian---------------------------------------------------------------------------------------||

//------transaksi-------------------------------------------------------------------------------------------||
		// Akhirnya bisa :D
		public function create_transaksi() {
		$db = new Database();
		//membuka koneksi
		$dbConnect = $db->connect();
		//query menyimpan data

		$data = mysqli_query($dbConnect ,
		"INSERT INTO
		selesai
		(
		kode_beli,
		id_cus,
		qty_total,
		bayar,
		total_bayar,
		tgl_order,
		bank,
		nama_rek,
		no_rek
		)
		VALUES
		(
		'{$this->kode_beli}',
		'{$this->id_cus}',
		'{$this->qty_total}',
		'{$this->bayar}',
		'{$this->total_bayar}',
		'{$this->tgl_order}',
		'{$this->bank}',
		'{$this->nama_rek}',
		'{$this->no_rek}'

		);");
		//menampung error query simpan data
		$error = $dbConnect->error;
		//menutup koneksi
		$dbConnect = $db->close();
		//mengembalikan nilai error
		return $error;
		}

		public function create_tujuan() {
		$db = new Database();
		//membuka koneksi
		$dbConnect = $db->connect();
		//query menyimpan data

		$data = mysqli_query($dbConnect ,
		"INSERT INTO
		tujuan
		(
		id_tujuan,
		kode_beli,
		nama_penerima,
		kota,
		kode_pos,
		no_hp,
		alamat
		)
		VALUES
		(
		'{$this->id_tujuan}',
		'{$this->kode_beli}',
		'{$this->nama_penerima}',
		'{$this->kota}',
	    '{$this->kode_pos}',
		'{$this->no_hp}',
		'{$this->alamat}'
		);");
		//menampung error query simpan data
		$error = $dbConnect->error;
		//menutup koneksi
		$dbConnect = $db->close();
		//mengembalikan nilai error
		return $error;
		}

		public function create_konfirm() {
			$db = new Database();
			//membuka koneksi
			$dbConnect = $db->connect();
			//query menyimpan data
			$data = mysqli_query($dbConnect ,
			"INSERT INTO
			konfirm_beli
			(
			id_cus,
			kode_beli,
			gambar,
			tgl_konfirm
			)
			VALUES
			(
			'{$this->id_cus}',
			'{$this->kode_beli}',
			'{$this->gambar}',
			'{$this->tgl_konfirm}'
			);");
			//menampung error query simpan data
			$error = $dbConnect->error;
			//menutup koneksi
			$dbConnect = $db->close();
			//mengembalikan nilai error
			return $error;
			}


		public function konfirm() {
			$db = new Database();
			//membuka koneksi
			$dbConnect = $db->connect();
			//query menyimpan data
	
			$data = mysqli_query($dbConnect ,
			"UPDATE selesai SET

			status_beli='{$this->status_beli}',
			status_pengiriman='{$this->status_pengiriman}'
			 WHERE
			kode_beli='{$this->kode_beli}'
			
			;");
			//menampung error query simpan data
			$error = $dbConnect->error;
			//menutup koneksi
			$dbConnect = $db->close();
			//mengembalikan nilai error
			return $error;
			}

			public function delete_konfirm() {
				$db = new Database();
				//membuka koneksi
				$dbConnect = $db->connect();
				//query menyimpan data
		
				$data = mysqli_query($dbConnect ,
				"DELETE FROM konfirm_beli 
				WHERE
				kode_beli='{$this->kode_beli}'
				
				;");
				//menampung error query simpan data
				$error = $dbConnect->error;
				//menutup koneksi
				$dbConnect = $db->close();
				//mengembalikan nilai error
				return $error;
				}


	}
?>