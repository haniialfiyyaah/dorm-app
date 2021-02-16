<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<?php 
	
	require("koneksi.php");
	$link = koneksi_db();
	if (isset($_POST['pesan'])) {
	
			// membaca kode barang terbesar
			$query = "SELECT max(ID_PESAN_P) as maxKode FROM _msgpengelola";
			$hasil = mysqli_query($link,$query);
			$data  = mysqli_fetch_array($hasil);
			$kodeBarang = $data['maxKode'];
			// mengambil angka atau bilangan dalam kode anggota terbesar,
			// dengan cara mengambil substring mulai dari karakter ke-1 diambil 6 karakter
			// misal 'BRG001', akan diambil '001'
			// setelah substring bilangan diambil lantas dicasting menjadi integer
			$noUrut = (int) substr($kodeBarang, 3, 3);

			// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
			$noUrut++;

			// membentuk kode anggota baru
			// perintah sprintf("%03s", $noUrut); digunakan untuk memformat string sebanyak 3 karakter
			// misal sprintf("%03s", 12); maka akan dihasilkan '012'
			// atau misal sprintf("%03s", 1); maka akan dihasilkan string '001'
	$char = "PS";
	
	$newID = $char . sprintf("%03s", $noUrut);

	
	// filter data yang diinputkan
		$email_tujuan = $_POST['email_tujuan'];
		$id_kos = $_POST['kode'];
		$email = $_POST['email'];
		$nama = $_POST['nama'];
		$msg = $_POST['msg'];
		$hp = $_POST['hp'];
	
	$sql = "INSERT INTO `_msgpengelola` (`ID_PESAN_P`, `Nama`, `Email`, `No_Tlp`,`Kepada`, `Pesan`, `Tanggal_`, `Time`) VALUES ('$newID', '$nama', '$email', '$hp','$email_tujuan', '$msg', now(), now()); ";
	
	$res = mysqli_query($link, $sql);
	
	if($res){
		echo "<script>alert('Pesan Berhasil Dikirim!');</script>";
	 	echo "<script>(location.href='?page=detail-kost&id=$id_kos')</script>";
	 }else {
		  $link = "Kode error: ".mysqli_error();
		 echo "<br />";echo "<br />";echo "<br />";echo "<br />";
		echo "$link";
		 echo "$sql";
	 }	
		
		
	}
	if (isset($_GET['delete'])!=null) {
		$id_kosan = $_GET['id'];
			$sql = " DELETE FROM  `_msgpengelola` WHERE `ID_PESAN_P` = '$id_kosan'; ";
			$res = mysqli_query($link, $sql);
		 if($res){
			 echo "<script>alert('Berhasil Dihapus!');</script>";
			 echo "<script>(location.href='pengelola.php?page=pesan')</script>";
			 
		 }else {
			  $link = "Kode error: ".mysqli_error();
			 echo "<br />";echo "<br />";echo "<br />";echo "<br />";
			echo "$link";
			 echo "$sql";
		 }
	}
	 ?>
<body>
</body>
</html>