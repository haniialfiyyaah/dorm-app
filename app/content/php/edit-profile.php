<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<?php
	require("koneksi.php");
		$link = koneksi_db();
	if (isset($_POST['ganti-email'])) {
		$email_lama = $_SESSION['email'];
	
		// filter data yang diinputkan
		$email = $_POST['email'];

		$sql_email = "SELECT F_Email FROM _datapengelola WHERE F_Email='$email'";
		$res_email=mysqli_query($link, $sql_email);
		$data_email = mysqli_fetch_array($res_email);
		if($email==""){
			echo "<script>alert('Tidak Boleh Kosong');</script>";
		}else{

		if($data_email["F_Email"]==$email){
			echo "<script>alert('Email Sudah Terdaftar! Silahkan Isi Ulang!');</script>";
					echo "<script>(location.href='?page=profile')</script>";
		}else{
			
			$sql = "UPDATE  `_datapengelola` SET `F_Email` = '$email' WHERE `F_Email` = '$email_lama'; ";

			$res = mysqli_query($link, $sql);
			echo  "<script>(location.href='?page=profile')</script>";
		 if($res){
			 $_SESSION['email'] = "$email";
			 session_write_close();
			 echo "<script>alert('Email Berhasil Diganti');</script>";
			 echo "<script>(location.href='?page=profile')</script>";
		 }else {
			  $link = "Kode error: ".mysqli_error();
			 echo "<br />";echo "<br />";echo "<br />";echo "<br />";
			echo "$link";
			 echo "$sql";
		 }	
		}
		}
	}
	
	if (isset($_POST['ganti-password'])) {
		
	
		$email_lama = $_SESSION['email'];
		$cek_password_lama = md5($_POST['password_lama'], "1k4n");
		$password_baru = md5($_POST['password_baru'], "1k4n"); 
		
		
		$sql = "SELECT * FROM _datapengelola WHERE F_Email='$email_lama'";
		$res=mysqli_query($link, $sql);
		$data = mysqli_fetch_array($res);
		
		$password_lama = $data['F_Password']; 
		
		if($_POST['password_lama'] && $_POST['password_lama']==""){
			echo "<script>alert('Tidak Boleh Kosong');</script>";
		}else{
		if($password_lama != $cek_password_lama){
			echo "<script>alert('Password Salah! Silahkan Ulangi');</script>";
					echo "<script>(location.href='?page=profile')</script>";
		}else{
			
			$sql_a = "UPDATE  `_datapengelola` SET `F_Password` = '$password_baru' WHERE `F_Email` = '$email_lama' ";

			$res_a = mysqli_query($link, $sql_a);
		 if($res_a){
			 $_SESSION['email'] = "$email_lama";
			 session_write_close();
			 echo "<script>alert('Password Berhasil Diganti!');</script>";
			 echo "<script>(location.href='?page=profile')</script>";
		 }else {
			  $link = "Kode error: ".mysqli_error();
			 echo "<br />";echo "<br />";echo "<br />";echo "<br />";
			echo "$link";
			 echo "$sql";
		 }	
		}
		}
	}
	
	if (isset($_POST['profile'])) {
		$email_lama = $_SESSION['email'];
		$nama = $_POST['form_name'];
		$phone = $_POST['phone']; 
		
				
		if($_POST['form_name'] && $_POST['phone']==""){
			echo "<script>alert('Tidak Boleh Kosong');</script>";
		}else{
			$sql_a = "UPDATE  `_datapengelola` SET F_Nama= '$nama' AND F_No_HP = '$phone' WHERE `F_Email` = '$email_lama' ";
			$res_a = mysqli_query($link, $sql_a);
		 if($res_a){
			 $_SESSION['email'] = "$email_lama";
			 $_SESSION['nama'] = "$nama";
			 $_SESSION['No_HP'] = "$phone";
			 session_write_close();
			 
			 echo "<script>alert('Berhasil Diganti!');</script>";
			 echo "<script>(location.href='pengelola.php?page=profile')</script>";
		 }else {
			  $link = "Kode error: ".mysqli_error();
			 echo "<br />";echo "<br />";echo "<br />";echo "<br />";
			echo "$link";
			 echo "$sql";
		 }
		}
		
	}
	
	if (isset($_POST['delete'])) {
		$email_lama = $_SESSION['email'];

	$link = koneksi_db();
	$sql = " DELETE FROM  `_datapengelola` WHERE `F_Email` = '$email_lama'; ";
	$res = mysqli_query($link, $sql);
		
		
	
		 if($res){
			 echo "<script>alert('Berhasil Dihapus!');</script>";
			 echo "<script>(location.href='pengelola.php?page=logout')</script>";
			 
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