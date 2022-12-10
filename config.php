<?php

$conn = mysqli_connect('localhost','root','','db_sitap');

//-----------------------------------------------------------------------//--------------------------------------------------------------
// function pengambilan data dari database kita
	function query($query) {
		global $conn;
		$result = mysqli_query($conn, $query);
		$rows = [];
		while ( $row = mysqli_fetch_assoc($result) ) {
			$rows[] = $row;
		}
		return $rows;
	}


//mengubah data profile admin/pengelola halaman admin
	function ubah($data){
		global $conn;
		
		$id = $data['id'];
		$nama = htmlspecialchars($data['nama']);
		$no_telp = htmlspecialchars($data['no_telp']);
		$alamat = htmlspecialchars($data['alamat']);
		

		// query insert data
		$query = "UPDATE tb_users SET 

				  nm_lengkap = '$nama',
				  no_telp = '$no_telp',
				  alamat = '$alamat'
				  WHERE id = $id
		";

		mysqli_query($conn, $query);

		return mysqli_affected_rows($conn);
	}


//mengubah password dashboard admin.
	

//---------------------||--------------------------------------------------------------------||------------------------------------------

// function pengambilan data dari database kita
	function query1($query) {
		global $conn;
		$result = mysqli_query($conn, $query);
		$rows = [];
		while ( $row = mysqli_fetch_assoc($result) ) {
			$rows[] = $row;
		}
		return $rows;
	}

//mengubah data profile user/pengunjung halaman user
	function ganti($data){
		global $conn;
		
		$id = $data['id'];
		$nama = htmlspecialchars($data['nama']);
		$no_telp = htmlspecialchars($data['no_telp']);
		$alamat = htmlspecialchars($data['alamat']);
		

		// query insert data
		$query = "UPDATE tb_users SET 

				  nm_lengkap = '$nama',
				  no_telp = '$no_telp',
				  alamat = '$alamat'
				  WHERE id = $id
		";

		mysqli_query($conn, $query);

		return mysqli_affected_rows($conn);
	}

//menampilkan data pelanggan di dasboard admin -------------------------------------------------------------------------

	// function pengambilan data dari database kita
	function query2 ($query) {
		global $conn;
		$result = mysqli_query($conn, $query);
		$rows = [];
		while ( $row = mysqli_fetch_assoc($result) ) {
			$rows[] = $row;
		}
		return $rows;
	}

	//function memasukan data baru pada menu pelanggan
	//menambahkan data pelanggan baru
	function tambah($data){
		global $conn;
		
		$id_pelanggan = htmlspecialchars($data['id_pelanggan']);
		$nama = htmlspecialchars($data['nama']);
		$alamat = htmlspecialchars($data['alamat']);
		$no_tlp = htmlspecialchars($data['no_tlp']);
		

		// query insert data
		$query = "INSERT INTO pelanggan
					VALUES
					('', '$id_pelanggan', '$nama', '$alamat', '$no_tlp')

		";

		mysqli_query($conn, $query);

		return mysqli_affected_rows($conn);
	}


	//mengubah data pelanggan
	function rubah ($data) {

		global $conn;
		
		$id = $data['id'];
		$id_pelanggan = htmlspecialchars($data['id_pelanggan']);
		$nama = htmlspecialchars($data['nama']);
		$alamat = htmlspecialchars($data['alamat']);
		$no_tlp = htmlspecialchars($data['no_tlp']);

		

		// query insert data
		$query = "UPDATE pelanggan SET 

				  id_pelanggan = '$id_pelanggan',
				  nama = '$nama',
				  alamat = '$alamat',
				  no_tlp = '$no_tlp'
				  WHERE id = $id
		";

		mysqli_query($conn, $query);

		return mysqli_affected_rows($conn);

		function cari($keyword) {
			cari();
			$this->cari();
			$query = "SELECT * FROM pelanggan
			WHERE
			nama LIKE '%$keyword%'
			";
		}
	}


	//menghapus data pelanggan
	function hapus($id){
		global $conn;
		mysqli_query($conn, "DELETE FROM pelanggan WHERE id = $id");

		return mysqli_affected_rows($conn);
	}


//menampilkan jenis transaksi --------------------------------------------------------------------------------------

	// function pengambilan data dari database kita
	function query3 ($query) {
		global $conn;
		$result = mysqli_query($conn, $query);
		$rows = [];
		while ( $row = mysqli_fetch_assoc($result) ) {
			$rows[] = $row;
		}
		return $rows;
	}


//function memasukan data baru pada menu pelanggan
	//menambahkan data pelanggan baru
	function tambah2 ($data){
		global $conn;
		
		$id_transaksi = htmlspecialchars($data['id_transaksi']);
		$tgl_langganan = htmlspecialchars($data['tgl_langganan']);
		$tgl_byr = htmlspecialchars($data['tgl_byr']);
		$mode_byr = htmlspecialchars($data['mode_byr']);
		$jml_biaya = htmlspecialchars($data['jml_biaya']);
		$pembayaran = htmlspecialchars($data['pembayaran']);
		$status = htmlspecialchars($data['status']);
	
		
		// query insert data
		$query = "INSERT INTO transaksi
					VALUES
					('', '$id_transaksi', '$tgl_langganan', '$tgl_byr', '$mode_byr', '$jml_biaya', '$pembayaran', '$status')

		";

		mysqli_query($conn, $query);

		return mysqli_affected_rows($conn);
	}


	//mengubah data transaksi
	function rubah2 ($data) {

		global $conn;
		
		$id = $data['id'];
		$id_transaksi = htmlspecialchars($data['id_transaksi']);
		$tgl_langganan = htmlspecialchars($data['tgl_langganan']);
		$tgl_byr = htmlspecialchars($data['tgl_byr']);
		$mode_byr = htmlspecialchars($data['mode_byr']);
		$jml_biaya = htmlspecialchars($data['jml_biaya']);
		$pembayaran = htmlspecialchars($data['pembayaran']);
		$status = htmlspecialchars($data['status']);

		

		// query insert data
		$query = "UPDATE transaksi SET 

				  id_transaksi = '$id_transaksi',
				  tgl_langganan = '$tgl_langganan',
				  tgl_byr = '$tgl_byr',
				  mode_byr = '$mode_byr',
				  jml_biaya = '$jml_biaya',
				  pembayaran = '$pembayaran',
				  status = '$status'
				  WHERE id = $id
		";

		mysqli_query($conn, $query);

		return mysqli_affected_rows($conn);

		function cari($keyword) {
			cari();
			$this->cari();
			$query = "SELECT * FROM transaksi
			WHERE
			nama LIKE '%$keyword%'
			";
		}
	}


	//menghapus data transaksi
	function hapus2($id){
		global $conn;
		mysqli_query($conn, "DELETE FROM transaksi WHERE id = $id");

		return mysqli_affected_rows($conn);
	}

// menampilkan hasil produk jasa --------------------------------------------------------------------------------------

	// function pengambilan data dari database kita
	function query4 ($query) {
		global $conn;
		$result = mysqli_query($conn, $query);
		$rows = [];
		while ( $row = mysqli_fetch_assoc($result) ) {
			$rows[] = $row;
		}
		return $rows;
	}


	//function memasukan data baru pada menu pelayanan dan jasa
	//menambahkan data produk dan jasa baru
	function tambah3 ($data){
		global $conn;

		
		//cara upload gambar
		$gbr_produk = $_FILES['gbr_produk']['name'];
		$file_tmp = $_FILES['gbr_produk']['tmp_name'];
		// setelah lolos pengecekan gambar akan diupload
		move_uploaded_file($file_tmp, "asset/img/" . $gbr_produk);
 
		$id_jasa = htmlspecialchars($data['id_jasa']);
		$produk = htmlspecialchars($data['produk']);
		$harga = htmlspecialchars($data['harga']);
		
	
		
		// query insert data
		$query = "INSERT INTO jasa
					VALUES
					('', '$gbr_produk', '$id_jasa', '$produk', '$harga')

		";

		mysqli_query($conn, $query);

		return mysqli_affected_rows($conn);
	}


	//mengubah data produk
	function rubah3 ($data) {

		global $conn;
		
		$id = $data['id'];
		//cara upload gambar
		$gbr_produk = $_FILES['gbr_produk']['name'];
		$file_tmp = $_FILES['gbr_produk']['tmp_name'];
		// setelah lolos pengecekan gambar akan diupload
		move_uploaded_file($file_tmp, "asset/img/" . $gbr_produk);

		$id_jasa = htmlspecialchars($data['id_jasa']);
		$produk = htmlspecialchars($data['produk']);
		$harga = htmlspecialchars($data['harga']);

		

		// query insert data
		$query = "UPDATE jasa SET 

				  gbr_produk = '$gbr_produk',
				  id_jasa = '$id_jasa',
				  produk = '$produk',
				  harga = '$harga'
				  WHERE id = $id
		";

		mysqli_query($conn, $query);

		return mysqli_affected_rows($conn);

		function cari($keyword) {
			cari();
			$this->cari();
			$query = "SELECT * FROM jasa
			WHERE
			nama LIKE '%$keyword%'
			";
		}
	}


	//menghapus data produk
	function hapus3($id){
		global $conn;
		mysqli_query($conn, "DELETE FROM jasa WHERE id = $id");

		return mysqli_affected_rows($conn);
	}
	
// menampilkan invoice ---------------------------------------------------------------------------------//	

	// function pengambilan data dari database kita
	function query5 ($query) {
		global $conn;
		$result = mysqli_query($conn, $query);
		$rows = [];
		while ( $row = mysqli_fetch_assoc($result) ) {
			$rows[] = $row;
		}
		return $rows;
	}


?>