<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
	<?php
	if (isset($_POST['submit'])) {
		session_start();
		require("koneksi.php");
		
		$email = $_POST['form_email'];
		$password = md5($_POST["form_password"], "1k4n");
		
		$link = koneksi_db();
		$sql = "select * from _datapengelola where F_Email='$email' and F_Password='$password'";
		$res = mysqli_query($link, $sql);
		$ketemu = mysqli_num_rows($res);
					
		if($ketemu)
		{
			$_SESSION['email'] = $_POST['form_email'];
			$sqlGet = "select F_Nama, F_No_HP, F_Tanggal, F_Time from _datapengelola where F_Email='$email' and F_Password='$password'";
			$resGetAkses = mysqli_query($link, $sqlGet);
			$data = mysqli_fetch_array($res);

			$_SESSION['nama'] = $data['F_Nama'];
			$_SESSION['No_HP'] = $data['F_No_HP'];
			$_SESSION['tanggal'] = $data['F_Tanggal'];
			$_SESSION['time'] = $data['F_Time'];
			
			echo "<script>(location.href='pengelola.php')</script>";
			
		}
		else
		{
			echo "<script>alert('Email atau Password Salah');</script>";
			echo "<script>(location.href='index.php?page=login')</script>";
			
		}
	
	
	}
	?>
<body>
</body>
</html>