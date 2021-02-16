<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">  
	
<!----------------------------------------- Title ---------------------------------------------------->
	<title>KosanDimana.co.id - Aplikasi Informasi Kosan</title>


<!----------------------------------- BOOTSTRAP ---------------------------------------------------->
	<!-- header -->
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/sign-design/js/jquery.backstretch.min.js"></script>
		<script src="assets/js/jssor.slider-27.4.0.min.js" type="text/javascript"></script>
		<script src="assets/sign-design/js/retina-1.1.0.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
		
	
	<link rel="stylesheet" href="assets/sign-design/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/form-elements.css">
		<script src="assets/js/script_fungsi.js"></script>
	

<!------------------------------------ CSS (FONT) ---------------------------------------------------->
   	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
	<!-- header -->
	<link rel="stylesheet" href="assets/css/Pretty-Header.css">	

<!------------------------------------- END CSS ------------------------------------------------------>
	
	
	
</head>

<body>
	<!-- isi header -->
	<nav class="navbar navbar-default custom-header navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand navbar-link" href="?page=home">
					Kosan<span>Dimana</span><small>.co.id</small>
				</a>
					<button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
						
					</button>
			</div>
			<div class="collapse navbar-collapse" id="navbar-collapse">
				<ul class="nav navbar-nav links">
					<li role="presentation"><a href="?page=home">Home</a></li>
					<li role="presentation"><a href="?page=kost">Kost</a></li>
					<li role="presentation"><a href="?page=kontak">Hubungi Kami</a></li>
					<li role="presentation"><a href="?page=iklan" class="custom-navbar">Tawarkan Kosan<span class="badge">new</span></a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#"> 
							<span class="caret"></span>
							<img src="assets/img/avatar.jpg" class="dropdown-image">
						</a>		
						<ul class="dropdown-menu dropdown-menu-right" role="menu">		
							<li role="presentation"><a href="?page=login">Masuk Akun</a></li>
							<li role="presentation"><a href="?page=register">Daftarkan</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	
		<div class="content">
			<?php 
				if(isset($_GET['page'])){
					$page = $_GET['page'];

					switch ($page) {
						case 'home':
							include "content/guest/home-guest.html";
							break;
						case 'kost':
							include "content/both/tampil-kost.html";
							break;
						case 'kontak':
							include "content/both/kontak.html";
							break;
						case 'iklan':
							include "content/both/iklan.html";
							break;
						case 'login':
							include "content/guest/login.html";
							break;
						case 'register':
							include "content/guest/register.html";
							break;
						case 'proses_login':
							include "content/php/proses_login.php";
							break;
						case 'proses_register':
							include "content/php/proses_register.php";
							break;
						case 'berhasil_register':
							include "content/guest/berhasil_register.html";
							break;
						case 'detail-kost':
							include "content/both/detail-kost.html";
							break;
						case 'koneksi':
							include "content/php/koneksi.php";
							break;
						case 'pesan_masukphp':
							include "content/php/pesan-masuk.php";
							break;
							case 'cari-kosan':
							include "content/both/cari-kost.html";
							break;
						default:
							echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
							break;
					}
				}else{
					include ('content/guest/home-guest.html');
				}
			?>
		</div>

</body>
</html>