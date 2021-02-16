<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
	<?php
	require("koneksi.php");
	$link = koneksi_db();

	
	if (isset($_POST['input'])) {
	
	
			// membaca kode barang terbesar
	$query = "SELECT max(ID_KOSAN) as maxKode FROM _datakosan";
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
	$char = "KS";
	
	$newID = $char . sprintf("%03s", $noUrut);

	
	// filter data yang diinputkan
	$email = $_SESSION['email'];
    $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
	$provinsi = $_POST['provinsi'];
	$kota =  $_POST['kota'];
	$judul =  $_POST['judul'];
	$harga = $_POST['harga'];
	$deskripsi =  $_POST['deskripsi'];
	$jenis_kost =  $_POST['jenis_kost'];
	$alamat =  $_POST['alamat'];
	
	
	$sql = "INSERT INTO  `_datakosan` (`ID_KOSAN`, `F_Email`, `Provinsi`, `Kota`, `Judul`, `Harga`,`Deskripsi`, `Jenis_Kost`, `Alamat_Lengkap`) VALUES ('$newID', '$email', '$provinsi', '$kota', '$judul', $harga, '$deskripsi', '$jenis_kost', '$alamat');";
	
	$res = mysqli_query($link, $sql);
	
	if($res){
		echo "<script>alert('Data Berhasil Ditambahkan!');</script>";
	 	echo "<script>(location.href='?page=iklan')</script>";
	 }else {
		  $link = "Kode error: ".mysqli_error();
		 echo "<br />";echo "<br />";echo "<br />";echo "<br />";
		echo "$link";
		 echo "$sql";
	 }	
		
		
	}

	if (isset($_GET['delete'])!=null) {
		$id_kosan = $_GET['id'];
			$sql = " DELETE FROM  `_datakosan` WHERE `ID_KOSAN` = '$id_kosan'; ";
			$res = mysqli_query($link, $sql);
		 if($res){
			 echo "<script>alert('Berhasil Dihapus!');</script>";
			 echo "<script>(location.href='pengelola.php?page=kelola')</script>";
			 
		 }else {
			  $link = "Kode error: ".mysqli_error();
			 echo "<br />";echo "<br />";echo "<br />";echo "<br />";
			echo "$link";
			 echo "$sql";
		 }
	}
	
	if (isset($_GET['value'])!=null){
		$id_kosan = $_GET['id'];
		
		$sql = "SELECT * FROM _datakosan WHERE ID_KOSAN='$id_kosan'";
		$res = mysqli_query($link, $sql);
		$ketemu = mysqli_num_rows($res);
		$data = mysqli_fetch_array($res);
				$id_kosan 	= $data['ID_KOSAN'];
				$email		= $data['F_Email'];
				$provinsi	= $data['Provinsi'];
				$kota		= $data['Kota'];
				$judul		= $data['Judul'];
				$harga		= $data['Harga'];
				$deskripsi	= $data['Deskripsi'];
				$jenis_kost	= $data['Jenis_Kost'];
				$alamat		= $data['Alamat_Lengkap'];
				echo "<script>(location.href='?page=edit-kost')</script>";
		$session_start();
		$_SESSION['id']= $id_kosan;
		
	}
	
	if (isset($_POST['edit'])) {
		$id_kosan = $_POST['ID'];
		$sql =  "SELECT * FROM _datakosan WHERE ID_KOSAN='$id_kosan'";
		$res = mysqli_query($link, $sql);
		$ketemu = mysqli_num_rows($res);
		$data = mysqli_fetch_array($res);

		if($res){
			
			$email		= $data['F_Email'];
			$provinsi	= $_POST['provinsi'];
			$kota		= $_POST['kota'];
			$judul		= $_POST['judul'];
			$harga		= $_POST['harga'];
			$deskripsi	= $_POST['deskripsi'];
			$jenis_kost	= $_POST['jenis_kost'];
			$alamat		= $_POST['alamat'];
		}else{

		}
		
		$sql = " UPDATE _datakosan SET Provinsi = '$provinsi', Kota = '$kota',  Judul = '$judul', Harga = '$harga', Deskripsi = '$deskripsi', Jenis_Kost = '$jenis_kost', Alamat_Lengkap = '$alamat' WHERE ID_KOSAN = '$id_kosan' ";
		
		$res = mysqli_query($link, $sql);
		 if($res){echo "<br />";echo "<br />";echo "<br />";echo "<br />";echo "<br />";echo "<br />";echo "<br />";echo "<br />";
			 echo "<script>alert('Berhasil Di Edit!');</script>";
			 echo "<script>(location.href='?page=kelola')</script>";;
			 
		 }else {
			  
			 echo "<br />";echo "<br />";echo "<br />";echo "<br />";
			echo '$link';
			 echo "$sql";
			 echo "<script>alert('$sql');</script>";
		 }
	}
	
	
	if (isset($_POST['cari'])) {
		$id_kosan = $_POST['ID'];
		$alamat = $_POST[f[address]];
		$jenis_kost = $_POST[f[jenis].value];
		$harga1 = $_POST[f[price][from]];
		$harga2 = $_POST[f[price][to]];
		
		$sql =  "SELECT * FROM _datakosan WHERE Alamat_Lengkap='$alamat' or Provinsi ='$alamat' or Kota = '$alamat' or Jenis_Kost='$jenis_kost' or Harga beetwen $harga1 and $harga2 or Deskripsi = '$alamat'";
		$res = mysqli_query($link, $sql);
		$ketemu = mysqli_num_rows($res);
		$data = mysqli_fetch_array($res);

		if($res){
			
			$email		= $data['F_Email'];
			$provinsi	= $_POST['provinsi'];
			$kota		= $_POST['kota'];
			$judul		= $_POST['judul'];
			$harga		= $_POST['harga'];
			$deskripsi	= $_POST['deskripsi'];
			$jenis_kost	= $_POST['jenis_kost'];
			$alamat		= $_POST['alamat'];
		}else{

		}
		
		$sql = " UPDATE _datakosan SET Provinsi = '$provinsi', Kota = '$kota',  Judul = '$judul', Harga = '$harga', Deskripsi = '$deskripsi', Jenis_Kost = '$jenis_kost', Alamat_Lengkap = '$alamat' WHERE ID_KOSAN = '$id_kosan' ";
		
		$res = mysqli_query($link, $sql);
		 if($res){echo "<br />";echo "<br />";echo "<br />";echo "<br />";echo "<br />";echo "<br />";echo "<br />";echo "<br />";
			 echo "<script>alert('Berhasil Di Edit!');</script>";
			 echo "<script>(location.href='?page=kelola')</script>";;
			 
		 }else {
			  
			 echo "<br />";echo "<br />";echo "<br />";echo "<br />";
			echo '$link';
			 echo "$sql";
			 echo "<script>alert('$sql');</script>";
		 }
	}
	
	
	 ?>
	

	
<body>
</body>
</html>