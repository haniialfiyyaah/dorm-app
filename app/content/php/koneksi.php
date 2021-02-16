<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
	<?php
		function koneksi_db(){
			$server = "127.0.0.1";
			$username = "root";
			$password = "";
			$database = "10115562_AplikasiInformasiKosan";
			
			$link = mysqli_connect($server, $username, $password, $database);
			
			if (!$link) {
				$link = "Kode error: ".mysql_error();
			}
			
			return $link;
		}
	?>
	<!-- asas */ -->
<?php
	if (isset($_POST['kontak'])) {
	$link = koneksi_db();
	
			// membaca kode barang terbesar
			$query = "SELECT max(ID_PESAN) as maxKode FROM _messageus";
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
	$char = "MS";
	
	$newID = $char . sprintf("%03s", $noUrut);

	
	// filter data yang diinputkan
		$email = $_POST['email'];
		$nama = $_POST['nama'];
		$msg = $_POST['msg'];
	
	$sql = "INSERT INTO  `_messageus` (`ID_PESAN`, `Name`, `Email`, `Message`, `Tanggal`, `Time`) VALUES ('$newID', '$nama', '$email', '$msg', now(), now()) ;";
	
	$res = mysqli_query($link, $sql);
	
	if($res){
		echo "<script>alert('Pesan Berhasil Dikirim!');</script>";
	 	echo "<script>(location.href='?page=kontak')</script>";
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