<?php
	include_once "db.php";


	class Produk {

//--------------------------------------------------------------------------------
			//membuat variabel
//--------------------------------------------------------------------------------
		//--- Buku ---
		public $id_buku;
		public $id_katalog;
		public $id_kategori;
		public $judul;
		public $rating;
		public $pengarang;
		public $penerbit;
		public $stok;
		public $hal;
		public $gambar;
		public $harga;
		public $deskripsi;
		public $tanggal;
		public $tanggal_edit;
		public $kategori;
		public $katalog;


//--------------------------------------------------------------------------------
			//end membuat variabel
//--------------------------------------------------------------------------------

//--------------------------------------------------------------------------------
			//menampilkan data
//--------------------------------------------------------------------------------

//------Buku-------------------------------------------------------------------------------------------||

		//Mendapat kan id_buku
		public function getId_buku(){
		$db = new Database();
		$dbConnect = $db->connect();
		$sql ="SELECT id_buku FROM buku ORDER BY id_buku DESC LIMIT 1";
		$data = $dbConnect->query($sql);
		$dbConnect = $db->close();
		return $data;

		}
		//Method untuk menampikan jumlah data
		public function getJumlahBuku(){
			$db = new Database();
			$dbConnect = $db->connect();
			$sql = "SELECT count(*) as jumlah from buku";
			$data = $dbConnect->query($sql);
			$dbConnect = $db->close();
			return $data->fetch_array();
			}

		//Method untuk menampikan jumlah data
		public function getJumlahOrder(){
			$db = new Database();
			$dbConnect = $db->connect();
			$sql = "SELECT count(*) as jumlah from selesai";
			$data = $dbConnect->query($sql);
			$dbConnect = $db->close();
			return $data->fetch_array();
			}
		//Method untuk menampilkan semua data banner
		public function getDataBanner(){
		$db = new Database();
		$dbConnect = $db->connect();
		$sql = "SELECT * from buku order by tanggal desc limit 6";
		$data = $dbConnect->query($sql);
		$dbConnect = $db->close();
		return $data;
		}


		//Method untuk menampilkan semua data produk terbaru
		public function getDataAll(){
		$db = new Database();
		$dbConnect = $db->connect();
		$sql = "SELECT DISTINCT  * from buku group by judul order by judul asc";
		$data = $dbConnect->query($sql);
		$dbConnect = $db->close();
		return $data;
		}

		//Method untuk menampilkan semua data produk terbaru
		public function getDataNew(){
		$db = new Database();
		$dbConnect = $db->connect();
		$sql = "SELECT * from buku order by tanggal_edit desc";
		$data = $dbConnect->query($sql);
		$dbConnect = $db->close();
		return $data;
		}

		//Method untuk menampilkan semua data dengan pengarang yang sama
		public function getListPengarang($pengarang){
		$db = new Database();
		$dbConnect = $db->connect();
		$sql = "SELECT * from buku where pengarang LIKE '%{$pengarang}'";
		$data = $dbConnect->query($sql);
		$dbConnect = $db->close();
		return $data;
		}


		//Method untuk menampilkan semua data produk terbaik
		public function getDataTop(){
		$db = new Database();
		$dbConnect = $db->connect();
		$sql = "SELECT * from buku order by rating desc LIMIT 7";
		$data = $dbConnect->query($sql);
		$dbConnect = $db->close();
		return $data;
		}

		//Method untuk menampilkan semua data produk terbaik minggu ini
		public function getDataWeekly(){
		$db = new Database();
		$dbConnect = $db->connect();
		$sql = "SELECT * from buku order by rating desc LIMIT 5";
		$data = $dbConnect->query($sql);
		$dbConnect = $db->close();
		return $data;
		}


//------Keranjang---------------------------------------------------------------------------------||


		


		//Method untuk menampilkan semua data keranjang
		public function getDataKategori($id_kategori){
		$db = new Database();
		$dbConnect = $db->connect();
		$sql = "SELECT * from kategori_buku where id_kategori='{$id_kategori}'";
		$data = $dbConnect->query($sql);
		$dbConnect = $db->close();
		return $data;
		}


//------Detail---------------------------------------------------------------------------------||
		//Method untuk menampilkan data buku
		public function getDetail($id_buku){

		$db = new Database();
		$dbConnect = $db->connect();
		$sql = "SELECT * FROM buku where id_buku = '{$id_buku}'";
		$data = $dbConnect->query($sql);
		$dbConnect = $db->close();
		return $data->fetch_array();
		}

//------Buku-------------------------------------------------------------------------------------------||

//------Stok-------------------------------------------------------------------------------------------||

		//Method untuk menampilkan stock
		public function getListStok(){

		$db = new Database();
		$dbConnect = $db->connect();
		$sql = "SELECT DISTINCT  stok.id_stok,stok.id_buku,stok.stok,buku.id_buku,buku.judul  FROM stok inner join buku on stok.id_buku=buku.id_buku group by stok.id_buku order by buku.judul asc";
		$data = $dbConnect->query($sql);
		$dbConnect = $db->close();
		return $data;
		}

		//Method untuk menampilkan stock
		public function getStok($id_buku){

		$db = new Database();
		$dbConnect = $db->connect();
		$sql = "SELECT * FROM stok where id_buku = '{$id_buku}'";
		$data = $dbConnect->query($sql);
		$dbConnect = $db->close();
		return $data->fetch_array();
		}

		//Method untuk menampilkan katalog
		public function getKatalog(){
		$db = new Database();
		$dbConnect = $db->connect();
		$sql = "SELECT * from katalog order by katalog asc";
		$data = $dbConnect->query($sql);
		$dbConnect = $db->close();
		return $data;
		}
		//Method untuk menampilkan detail katalog
		public function getDetailKatalog($id_katalog){

		$db = new Database();
		$dbConnect = $db->connect();
		$sql = "SELECT * FROM katalog where id_katalog = '{$id_katalog}'";
		$data = $dbConnect->query($sql);
		$dbConnect = $db->close();
		return $data->fetch_array();
		}

		//Method untuk menampilkan detail katalog
		public function getListKatalog($id_katalog){

		$db = new Database();
		$dbConnect = $db->connect();
		$sql = "SELECT * FROM buku where id_katalog LIKE '%{$id_katalog}'";
		$data = $dbConnect->query($sql);
		$dbConnect = $db->close();
		return $data;
		}


		//Method untuk menampilkan kategori
		public function getKategori(){
		$db = new Database();
		$dbConnect = $db->connect();
		$sql = "SELECT * from kategori order by kategori asc";
		$data = $dbConnect->query($sql);
		$dbConnect = $db->close();
		return $data;
		}

		public function getDetailKategori($id_kategori){

		$db = new Database();
		$dbConnect = $db->connect();
		$sql = "SELECT * FROM kategori where id_kategori = '{$id_kategori}'";
		$data = $dbConnect->query($sql);
		$dbConnect = $db->close();
		return $data->fetch_array();
		}

		public function getKategori2Buku($id_buku){

		$db = new Database();
		$dbConnect = $db->connect();
		$sql = "SELECT kategori FROM kategori_buku INNER JOIN kategori ON kategori_buku.id_kategori = kategori.id_kategori WHERE kategori_buku.id_buku='{$id_buku}'";
		$data = $dbConnect->query($sql);
		$dbConnect = $db->close();
		return $data;
		}

		//Method untuk menampilkan hasil cari
		public function cariBuku($judul){

		$db = new Database();
		$dbConnect = $db->connect();
		$sql = "SELECT * FROM buku where judul LIKE '%{$judul}%'";
		$data = $dbConnect->query($sql);
		$dbConnect = $db->close();
		return $data;
		}

//--------------------------------------------------------------------------------
			//end menampilkan data
//--------------------------------------------------------------------------------


//--------------------------------------------------------------------------------
			//menambah / membuat / mengupdate / menghapus data
//--------------------------------------------------------------------------------

		public function create_buku() {
		$db = new Database();
		//membuka koneksi
		$dbConnect = $db->connect();
		//query menyimpan data
		$sql = "INSERT INTO buku
		(
			id_buku,
			id_katalog,
			judul,
			rating,
			pengarang,
			penerbit,
			hal,
			gambar,
			harga,
			deskripsi,
			tanggal,
			tanggal_edit
		)
		VALUES
		(
			'{$this->id_buku}',
			'{$this->id_katalog}',
			'{$this->judul}',
			'{$this->rating}',
			'{$this->pengarang}',
			'{$this->penerbit}',
			'{$this->hal}',
			'{$this->gambar}',
			'{$this->harga}',
			'{$this->deskripsi}',
			'{$this->tanggal}',
			'{$this->tanggal_edit}'

		);";




		//eksekusi query diatas
		$data = $dbConnect->query($sql);
		//menampung error query simpan data
		$error = $dbConnect->error;
		//menutup koneksi
		$dbConnect = $db->close();
		//mengembalikan nilai error
		return $error;
		}

		public function update_buku() {
		$db = new Database();
		//membuka koneksi
		$dbConnect = $db->connect();
		//query menyimpan data
		$data = mysqli_query($dbConnect ,"
			UPDATE buku SET
			id_katalog='{$this->id_katalog}',
			judul='{$this->judul}',
			rating='{$this->rating}',
			pengarang='{$this->pengarang}',
			penerbit='{$this->penerbit}',
			hal='{$this->hal}',
			gambar='{$this->gambar}',
			harga='{$this->harga}',
			deskripsi='{$this->deskripsi}',
			tanggal='{$this->tanggal}',
			tanggal_edit='{$this->tanggal_edit}'
		WHERE
			id_buku='{$this->id_buku}'
			");


		//eksekusi query diatas
		//$data = $dbConnect—>query($sql); (Tidak bisa dipakai karena error)
		//menampung error query simpan data
		$error = $dbConnect->error;
		//menutup koneksi
		$dbConnect = $db->close();
		//mengembalikan nilai error
		return $error;
		}


		// bissaaaa
		public function delete_buku() {
		$db = new Database();
		//membuka koneksi
		$dbConnect = $db->connect();
		//query menyimpan data
		$data =mysqli_query($dbConnect,"DELETE FROM buku WHERE id_buku='{$this->id_buku}'");
		//eksekusi query diatas
		//menampung error query simpan data
		$error = $dbConnect->error;
		//menutup koneksi
		$dbConnect = $db->close();
		//mengembalikan nilai error
		return $error;
		}


		public function create_kategori2buku() {
		$db = new Database();
		//membuka koneksi
		$dbConnect = $db->connect();
		//query menyimpan data
		$sql ="INSERT INTO
		kategori_buku
		(id_buku,id_kategori)
		VALUES
		('{$this->id_buku}','{$this->id_kategori}');";

		$data = $dbConnect->query($sql);
		//menampung error query simpan data
		$error = $dbConnect->error;
		//menutup koneksi
		$dbConnect = $db->close();
		//mengembalikan nilai error
		return $error;
		}
		// bissaaaa
		public function delete_kategori2buku() {
		$db = new Database();
		//membuka koneksi
		$dbConnect = $db->connect();
		//query menyimpan data
		$data =mysqli_query($dbConnect,"DELETE FROM kategori_buku WHERE id_buku='{$this->id_buku}'");
		//eksekusi query diatas
		//menampung error query simpan data
		$error = $dbConnect->error;
		//menutup koneksi
		$dbConnect = $db->close();
		//mengembalikan nilai error
		return $error;
		}

//------Katalog----------------------------------------------------------------------------------------||
		// Akhirnya bisa :D
		public function create_katalog() {
		$db = new Database();
		//membuka koneksi
		$dbConnect = $db->connect();
		//query menyimpan data
		$data = mysqli_query($dbConnect ,"INSERT INTO
		katalog(id_katalog,katalog)
		VALUES
		('{$this->id_katalog}','{$this->katalog}');");
		//menampung error query simpan data
		$error = $dbConnect->error;
		//menutup koneksi
		$dbConnect = $db->close();
		//mengembalikan nilai error
		return $error;
		}

		// Masih ga bisa :"(
		public function update_katalog() {
		$db = new Database();
		//membuka koneksi
		$dbConnect = $db->connect();
		//query menyimpan data
		$data = mysqli_query($dbConnect, "
			UPDATE katalog
		SET
			katalog='{$this->katalog}'
		WHERE
			id_katalog='{$this->id_katalog}'
		");


		//eksekusi query diatas
		//menampung error query simpan data
		$error = $dbConnect->error;
		//menutup koneksi
		$dbConnect = $db->close();
		//mengembalikan nilai error
		return $error;
		}

		// Akhirnya bisa :D
		public function delete_katalog() {
		$db = new Database();
		//membuka koneksi
		$dbConnect = $db->connect();
		//query menyimpan data
		$data = mysqli_query($dbConnect, "
		DELETE FROM
			katalog
		WHERE
			id_katalog='{$this->id_katalog}'
		");
		//eksekusi query diatas
		//menampung error query simpan data
		$error = $dbConnect->error;
		//menutup koneksi
		$dbConnect = $db->close();
		//mengembalikan nilai error
		return $error;
		}
//------Katalog----------------------------------------------------------------------------------------||


//------Kategori---------------------------------------------------------------------------------------||
		// Akhirnya bisa :D
		public function create_kategori() {
		$db = new Database();
		//membuka koneksi
		$dbConnect = $db->connect();
		//query menyimpan data
		$data = mysqli_query($dbConnect, "INSERT INTO kategori(id_kategori,kategori)VALUES('{$this->id_kategori}','{$this->kategori}');");
		//eksekusi query diatas
		//menampung error query simpan data
		$error = $dbConnect->error;
		//menutup koneksi
		$dbConnect = $db->close();
		//mengembalikan nilai error
		return $error;
		}

		// Akhirnya bisa :D
		public function update_kategori() {
		$db = new Database();
		//membuka koneksi
		$dbConnect = $db->connect();
		//query menyimpan data
		$data = mysqli_query($dbConnect, "
		UPDATE kategori SET kategori='{$this->kategori}' WHERE id_kategori='{$this->id_kategori}'");


		//eksekusi query diatas
		//menampung error query simpan data
		$error = $dbConnect->error;
		//menutup koneksi
		$dbConnect = $db->close();
		//mengembalikan nilai error
		return $error;
		}

		// Akhirnya bisa :D
		public function delete_kategori() {
		$db = new Database();
		//membuka koneksi
		$dbConnect = $db->connect();
		//query menyimpan data
		$data = mysqli_query($dbConnect, "
		DELETE FROM kategori WHERE id_kategori='{$this->id_kategori}'");
		//eksekusi query diatas
		//menampung error query simpan data
		$error = $dbConnect->error;
		//menutup koneksi
		$dbConnect = $db->close();
		//mengembalikan nilai error
		return $error;
		}

//------Kategori---------------------------------------------------------------------------------------||


//------Stok-------------------------------------------------------------------------------------------||
		// Akhirnya bisa :D
		public function create_stok() {
		$db = new Database();
		//membuka koneksi
		$dbConnect = $db->connect();
		//query menyimpan data

		$data = mysqli_query($dbConnect ,
		"INSERT INTO
		stok
		(
		id_stok,
		id_buku,
		stok
		)
		VALUES
		(
		'{$this->id_stok}',
		'{$this->id_buku}',
		'{$this->stok}'
		);");
		//menampung error query simpan data
		$error = $dbConnect->error;
		//menutup koneksi
		$dbConnect = $db->close();
		//mengembalikan nilai error
		return $error;
		}

		// Akhirnya bisa :D
		public function update_stok() {
		$db = new Database();
		//membuka koneksi
		$dbConnect = $db->connect();
		//query menyimpan data
		$data = mysqli_query($dbConnect, "
		UPDATE stok SET stok='{$this->stok}' WHERE id_stok='{$this->id_stok}'");
		//eksekusi query diatas
		//menampung error query simpan data
		$error = $dbConnect->error;
		//menutup koneksi
		$dbConnect = $db->close();
		//mengembalikan nilai error
		return $error;
		}

		// Akhirnya bisa :D
		public function delete_stok() {
		$db = new Database();
		//membuka koneksi
		$dbConnect = $db->connect();
		//query menyimpan data
		$data = mysqli_query($dbConnect, "DELETE FROM stok WHERE id_stok='{$this->id_stok}'");
		//menampung error query simpan data
		$error = $dbConnect->error;
		//menutup koneksi
		$dbConnect = $db->close();
		//mengembalikan nilai error
		return $error;
		}

//------Kategori---------------------------------------------------------------------------------------||

//--------------------------------------------------------------------------------
			//end menambah / membuat / mengupdate / menghapus data
//--------------------------------------------------------------------------------
	}
?>
