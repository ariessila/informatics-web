<?php 
//echo "pasca";
error_reporting(E_ALL);
ini_set('display_errors', 1);
@session_start();
include("model/class.php");
include("administrator/libs/path.php");
$url = isset($_GET['p']) ? $_GET['p'] : null;
$url = rtrim($url, '/');
$url = filter_var($url, FILTER_SANITIZE_URL);
$url = explode('/', $url);      // memecah URL menjadi variabel GET P menjadi :
#config dasar
$model 		= ($url[0] != 'en')?$url[0]='id':$url[0]='en';	// untuk bahasa
$method 	= !empty($url[1])?$url[1]:'';					// untuk model yang digunakan
$parameter 	= !empty($url[2])?$url[2]:null;					// parameter untuk eksekusi
$metode = $method;

#nama folder aktif
$a = $_SERVER['SCRIPT_FILENAME'];
$root3 	= explode("www/html/",$a);
$rootpasca 	= explode("pasca/",$root3[1]);
$root2 	= explode("/",end($rootpasca));
$root	= $root2[0]; // halaman aktif
// var_dump($rootpasca);

 
$subdomain_aktif= $root; 
// var_dump($subdomain_aktif);
#ip
$ip = $_SERVER['SERVER_ADDR']; 
$tanggal_pengunjung = date("Y-m-d");
$hitung = $pengunjung->countPengunjungByIp($ip);

if($hitung == 0){
	
$pengunjung->insertPengunjung($ip,$tanggal_pengunjung); // menambahkan jumlah pengunjung
	
}

?>

<html>

    <head>
        <title>
            <?php  echo $home->getNamaWebsite();?>
        </title>
		<link rel="shortcut icon" href="<?=ROOT?>images/header/icon.png">

        <!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

		<!-- Stylesheets -->
		<link rel="stylesheet" href="<?=ROOT?>css/style.css" />

		<link rel="stylesheet" href="<?=ROOT?>fonts/font-awesome-4.2.0/css/font-awesome.min.css">

		<script src="<?=ROOT?>scripts/min/jquery-min.js" type="text/javascript"></script>
		<script src="<?=ROOT?>scripts/min/retina-min.js" type="text/javascript"/></script>
		<script src="<?=ROOT?>scripts/min/slider-min.js" type="text/javascript"/></script>
		<script src="<?=ROOT?>scripts/min/readmore-min.js" type="text/javascript"/></script>
		<script src="<?=ROOT?>scripts/min/custom-min.js" type="text/javascript"/></script>
		<script src="<?=URL?>js/signin.js"></script>
		<script src="<?=URL?>js/md5.js"></script>
		<script type="text/javascript">
		$(function() {

			function sub(){
			var password = $('#password').val();
			var md5 = CryptoJS.MD5(CryptoJS.MD5(password)+CryptoJS.MD5(password));

			// var aaa = $('#hiddenpassword').val(md5);

			var ssss = document.getElementById("password").value = md5;
			// alert(ssss);
			return true;

			};

			$("#login").on("submit", function()
			{
				sub();
				
			});
		});

		</script>

		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

    </head>


    <body>
        <div class="wrapper">

        	<div class="container--top">

        	    <div class="container--top__main">

        	    	<div class="logo">

        	    	    <div class="logo__image">

        	    	        <img src="<?=ROOT?>images/header/toplogo.png" title="Universitas Hasanuddin"/>

        	    		</div>


        	    		<div class="logo__text">

        	    		    <h2><span class="logo__text__city">	
							<?php 
							$header1 = $home->getPengaturan();
							
							if($model == 'id'){
								
								echo $header1['nama_website'];
							}else{
								echo $header1['nama_website_en'];
								
							}
							
							
							?>
							
							</span></h2>

        	    		</div>

        	    	</div>


        	    </div>

				<?php 
				
				include('component/navigasi.php');
				
				?>

        	   
        	</div>

			<?php
				switch($method){ // pilih model
					default:
						include "views/home/home.php";
					break;
					
					case "news":
						include "views/article/artikel.php";
					break;
					case "cari":
						include "views/article/cari.php";
					break;
					case "pengumuman":
						include "views/pengumuman/pengumuman.php"; 
					break;
					case "semua_pengumuman":
						include "views/pengumuman/pengumuman_semua.php"; 
					break;
					case "page":
						include "views/page/page.php";
					break;
					case "dosen":
						include "views/dosen/dosen.php";
					break;
					case "penilitian":
						include "views/penilitian/penilitian.php";
					break;
					// case "download":
						// include "component/download.php"; 
					// break;
					case "agenda":
						include "views/agenda/agenda.php"; 
					break;
					case "gallery":
						include "views/galeri/galeri.php"; 
					break;
				}
				
				include "component/footer.php";		
				
			?>

        </div>

    </body>

</html>

