<?php
ob_start();
session_start();



 error_reporting(E_ALL);
 ini_set('display_errors', 1);
 
include('libs/path.php');

// include"models/connect/config.php";
require 'models/class.php';

$url = isset($_GET['url'])?$_GET['url']:null;
$url = rtrim($url, '/');
$url = explode('/', $url);

if($_SESSION['login_dosen']==1){
	if(!$libs->cek_login()){
		$_SESSION['login_dosen'] = 0;
	}
	
}

if($_SESSION['login_dosen']==0 or empty($_SESSION['login_dosen'])){ // kalo tidak ada kesiniki
  header("location:".ROOT."");
}

//aturan dasar
$model 		= $url[0];
$method 	= !empty($url[1])?$url[1]:null;
$parameter 	= !empty($url[2])?$url[2]:null;
// $parameter	= filter_var($parameter,FILTER_VALIDATE_INT);


?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Halaman Dosen</title>
		<link rel="shortcut icon" href="<?php echo URL;?>img/favicon.png">
		<link rel="stylesheet" type="text/css" href="<?php echo URL;?>css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="<?php echo URL;?>css/template.css">
		<script src="<?php echo URL;?>js/jquery.js" type="text/javascript"></script>
		<script src="<?php echo URL;?>js/bootstrap.js" type="text/javascript"></script>
		<script src="<?php echo URL;?>js/template.js" type="text/javascript"></script>
		<script src='<?php echo URL;?>js/jquery.nestable.js'></script>
		<script src="<?php echo URL;?>js/ckeditor/ckeditor.js" type="text/javascript"></script>
		<script type="text/javascript" src="<?php echo URL; ?>js/tinymce22/tinymce.min.js"></script>
	</head>

	<body>
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="<?php echo URL;?>">Dashboard</a>
				</div>
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#">
							<i class="glyphicon glyphicon-user"></i> 
							<?php echo $_SESSION['nama_dosen'] ?> <!--  <span class="badge " style='background-color:red;'>7</span>-->
							<span class="caret"></span></a>
							<ul id="g-account-menu" class="dropdown-menu" role="menu">
								<li>
									<a href="<?=ROOT?>" target="blank"><i class="glyphicon glyphicon-th-large"></i> Front End</a>
								</li>
								<li>
									<a href="<?=URL?>profil" ><i class="glyphicon glyphicon-user"></i> Profil</a>
								</li>
								<li class="divider"></li>
								<li>
									<a href="<?=URL?>logout"><i class="glyphicon glyphicon-off"></i> Logout</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<div class="container-fluid">      
			<div class="row row-offcanvas row-offcanvas-left">
				<div class="col-sm-3 col-md-2 sidebar-offcanvas" id="sidebar" role="navigation">
				<style>
			
				
				</style>
					 <?php  
						
						//navigasi //------------
						
						$aktif_beranda = ($model=='beranda' or $model=='')?"class='active'":"";
						$aktif_artikel = ($model=='artikel' )?"class='active'":"";
						$aktif_halaman = ($model=='halaman' )?"class='active'":"";
						$menu_manager = ($model=='menu_manager' )?"class='active'":"";
						$galeri1 = ($model=='galeri' )?"class='active'":"";
						$publikasi1 = ($model=='publikasi' )?"class='active'":"";
						$penelitian1 = ($model=='penelitian' )?"class='active'":"";
						$pengabdian1 = ($model=='pengabdian' )?"class='active'":"";
					 
				    echo"
						<ul class='nav nav-sidebar' style='overflow: auto;'>
							<li ".$aktif_beranda."><a href='".URL."'><i class='glyphicon glyphicon-home' style='margin-right: 5px;'></i> Beranda</a></li>
							<li class='nav-sidebar-header'>POST</li>
							<li ".$aktif_artikel." ><a href='".URL."artikel'><i class='glyphicon glyphicon-book icon'></i> Artikel</a></li>
							<li ".$aktif_halaman."><a href='".URL."halaman'><i class='glyphicon glyphicon-file icon'></i>Halaman</i></a>
							<li ".$menu_manager."><a href='".URL."menu_manager'><i class='glyphicon glyphicon-list-alt icon'></i> Menu Manager</a></li>
							
							<li ".$galeri1."><a href='".URL."galeri'><i class='glyphicon glyphicon-picture icon'></i> Galeri</a></li>
							
							<li ".$publikasi1."><a href='".URL."publikasi'><i class='glyphicon glyphicon glyphicon-tags icon'></i> Publikasi</a></li>
							<li ".$penelitian1."><a href='".URL."penelitian'><i class='glyphicon glyphicon-search icon'></i> Penelitian</a></li>
							<li ".$pengabdian1."><a href='".URL."pengabdian'><i class='glyphicon glyphicon-saved icon'></i> Pengabdian</a></li>
						</ul>";
				 
					 
					 
					 ?>  
				</div><!--/span-->
				<div class="col-sm-9 col-md-10 main">
				<!--toggle sidebar button-->
				<p class="visible-xs">
					<button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
				</p>      
				<h1 class="page-header">
					Halaman Dosen 
					<p class="lead">(Content Management System Program Studi)</p>
				</h1>
				
				<?php
				$libs->notif();
				
				if (isset($model)){
						switch ($model){
							case 'artikel':
								include "views/artikel/artikel_view.php";
								break;
							case 'halaman':
								include "views/halaman/halaman_view.php";
								break;
							case 'menu_manager':
								include "views/menu_manager/menu_manager.php";
								break;
							case 'publikasi':
								include "views/publikasi/publikasi_view.php";
								break;
							case 'galeri':
								include "views/galeri/galeri_view.php";
								break;
							case 'profil':
								include "views/profil/profil_view.php";
								break;
							case 'logout':
								include "controllers/logout/logout.php";
								break;
							case 'penelitian':
								include "views/penelitian/penelitian_view.php";	
								break;
							case 'pengabdian':
								include "views/pengabdian/pengabdian_view.php";	
								break;
							default:
								include "views/beranda/beranda_view.php";
								break;
						}
					} else {
						include "views/beranda/beranda_view.php";
					}
				
				?>
				
				</div><!--/row-->
			</div>
		</div><!--/.container-->

		<footer>
 			<p></p>
		</footer>
		
	</body>
	<script>
  	
		$("#uploadFile").on("change", function()
		{
			var files = !!this.files ? this.files : [];
			if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
	 
			if (/^image/.test( files[0].type)){ // only image file
				var reader = new FileReader(); // instance of the FileReader
				reader.readAsDataURL(files[0]); // read the local file
	 
				reader.onloadend = function(){ // set image data as background of div
					// $("#imagePreview").css("background-image", "url("+this.result+")");
					$("#imagePreview").html("<img src='"+this.result+"' style='width:200px; height:150px;'/>");
					
				}
			}
			
			//validasi
			if(files[0].type != 'image/png'){
				if(files[0].type != 'image/jpeg'){
				alert('format gambar tidak sesuai');
				}
			}
			if((files[0].size/1024) >= 1029){
				alert('file melebihi 1 MB');
				return false;
			}
			
		});
		

$(document).ready(function(){


		tinymce.init({
		selector: "textarea",
		plugins: [
		"advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
		"searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
		"save table contextmenu directionality emoticons template paste textcolor "
		],
		//image_advtab: true,


		toolbar: "insertfile undo redo |  fontselect | fontsizeselect | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image  | print preview  fullpage | forecolor backcolor emoticons" ,

		relative_urls: false
		});

});

	</script>
	
</html>     