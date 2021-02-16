<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
		
	<?php 
	
	session_start();
	require("koneksi.php");
	$link = koneksi_db();
	
	// filter data yang diinputkan
    $fname = filter_input(INPUT_POST, 'form-first-name', FILTER_SANITIZE_STRING);
    $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
    // enkripsi password
    $password = md5($_POST["form-password"], "1k4n");
    $email = filter_input(INPUT_POST, 'form_email', FILTER_VALIDATE_EMAIL);
	
	$sql_email = "SELECT F_Email FROM _datapengelola WHERE F_Email='$email'";
	$res_email=mysqli_query($link, $sql_email);
	$data_email = mysqli_fetch_array($res_email);
	
	if($data_email["F_Email"]==$email){
		include "content/register.html";
		echo "<script>alert('Email Sudah Terdaftar! Silahkan Isi Ulang!');</script>";
		echo "<script>(location.href='index.php?page=register')</script>";
	}else{
		$sql = "INSERT INTO _datapengelola(F_Email, F_Password, F_Nama, F_No_HP, F_Tanggal, F_Time) VALUES ('$email', '$password','$fname','$phone',now(),now())";
	
	$res = mysqli_query($link, $sql);
	
	 if($res){
		 $_SESSION['regis'] = "berhasil";
	 	echo "<script>(location.href='index.php?page=berhasil_register')</script>";
	 }else {
		  $link = "Kode error: ".mysqli_error();
		 echo "<br />";echo "<br />";echo "<br />";echo "<br />";
		echo "$link";
		 echo "$sql";
	 }	
	}
			
	 ?>
</body>
</html>