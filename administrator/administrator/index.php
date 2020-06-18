<?php
ob_start();
session_start();

//echo "berhasil";
 error_reporting(E_ALL);
 ini_set('display_errors', 1);



include('libs/path.php');

// include "models/connect/config.php";
require 'models/class.php';

$url = isset($_GET['url'])?$_GET['url']:null;
$url = rtrim($url, '/');
$url = explode('/', $url);


#nama folder aktif
#nama folder aktif
$a = $_SERVER['SCRIPT_FILENAME'];
$root3 	= explode("www/html/",$a);
$rootpasca 	= explode("pasca/",$root3[1]);
$root2 	= explode("/",end($rootpasca));
$root	= $root2[0]; // halaman aktif
// var_dump($root3 );
// die();


$subdomain	= $root; // identitas halaman
$subdomain_aktif= $root; // identitas halaman

#########aturan login#####


if($_SESSION['login']==1){
	if(!$libs->cek_login()){
		$_SESSION['login'] = 0;
	}
	
	$sub = $users->authSubdomain($_SESSION['username'],$subdomain); //jika session tidak sesuai maka login kembali
	//   var_dump($subdomain, $sub);
	if($sub==0){
		$_SESSION['login'] = 0;
	}
}
if($_SESSION['login']==0 or empty($_SESSION['login'])){ // kalo tidak ada kesiniki
	
 header("location:".URL."login");
 }

######


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
		<title>Administrator Dashboard</title>
		<link rel="shortcut icon" href="<?php echo URL;?>img/favicon.png">
		<link rel="stylesheet" type="text/css" href="<?php echo URL;?>css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="<?php echo URL;?>css/template.css">
		<script src="<?php echo URL;?>js/jquery.js" type="text/javascript"></script>
		<script src="<?php echo URL;?>js/bootstrap.js" type="text/javascript"></script>
		<script src="<?php echo URL;?>js/template.js" type="text/javascript"></script>
		<script src='<?php echo URL;?>js/jquery.nestable.js'></script>
		<script src="<?php echo URL;?>js/ckeditor/ckeditor.js" type="text/javascript"></script>
		<script src='<?php echo URL;?>js/autosize.js'></script>
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
							<?php echo $_SESSION['nama_lengkap'] ?>  <!--<span class="badge " style='background-color:red;'>7</span>-->
							<span class="caret"></span></a>
							<ul id="g-account-menu" class="dropdown-menu" role="menu">
								<li>
									<a href="<?=ROOT?>"  target="_blank" ><i class="glyphicon glyphicon-th-large"></i> Front End</a>
								</li>
								<li>
									<a href="<?=URL?>profil" ><i class="glyphicon glyphicon-user"></i> Profil</a>
								</li>
								<li>
									<a href="<?=URL?>bantuan" ><i class="glyphicon  glyphicon-envelope"></i> Bantuan <!--<span class="badge badge-warning" style='background-color:red;'>7</span>--></a>
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
						$pengaturan1 = ($model=='pengaturan' )?"class='active'":"";
						$pengumuman1 = ($model=='pengumuman' )?"class='active'":"";
						$menu_manager = ($model=='menu_manager' )?"class='active'":"";
						$admin = ($model=='akun_dosen' )?"class='active'":"";
						$komentar1 = ($model=='komentar' )?"class='active'":"";
						$galeri1 = ($model=='galeri' )?"class='active'":"";
						$web_grabbing = ($model=='web_grabbing' )?"class='active'":"";
						$tema = ($model=='tema' )?"class='active'":"";
						$staf = ($model=='staf' )?"class='active'":"";
						$dosen1 = ($model=='dosen' )?"class='active'":"";
						$penelitian1 = ($model=='penelitian' )?"class='active'":"";
						$pengabdian1 = ($model=='pengabdian' )?"class='active'":"";
						$publikasi1 = ($model=='publikasi' )?"class='active'":"";
						$kerjasama1 = ($model=='kerjasama' )?"class='active'":"";
						$agenda1 = ($model=='agenda' )?"class='active'":"";
						$link = ($model=='link' )?"class='active'":"";
						$akreditasi = ($model=='akreditasi' )?"class='active'":"";
					
					 
				    echo"
						<ul class='nav nav-sidebar' style='overflow-y: scroll; overflow-x: hidden;'>
							<li ".$aktif_beranda."><a href='".URL."'><i class='glyphicon glyphicon-home' style='margin-right: 5px;'></i> Beranda</a></li>
							<li class='nav-sidebar-header'>POST</li>
							<li ".$aktif_artikel." ><a href='".URL."artikel'><i class='glyphicon glyphicon-book icon'></i> Artikel</a></li>
							<li ".$aktif_halaman."><a href='".URL."halaman'><i class='glyphicon glyphicon-file icon'></i>Halaman</i></a>
							<li ".$menu_manager."><a href='".URL."menu_manager'><i class='glyphicon glyphicon-list-alt icon'></i> Menu Manager</a></li>
							<li ".$pengumuman1."><a href='".URL."pengumuman'><i class='glyphicon glyphicon-bullhorn icon'></i>Pengumuman</i></a></li>
							
							<li ".$agenda1."><a href='".URL."agenda'><i class='glyphicon glyphicon-list icon'></i>Agenda</i></a> </li>

							<li ".$akreditasi."><a href='".URL."akreditasi'><i class='glyphicon glyphicon-list icon'></i>Akreditasi</i></a> </li>
							
							<li ".$komentar1."><a href='".URL."komentar'><i class='glyphicon glyphicon-comment icon'></i> Komentar</a></li>
							<li ".$galeri1."><a href='".URL."galeri'><i class='glyphicon glyphicon-picture icon'></i> <font size='2pt'>Gambar Utama</font></a></li>
							<li ".$link."><a href='".URL."link'><i class='glyphicon glyphicon-link icon'></i> External Link</a></li>
							
							<li ".$penelitian1."><a href='".URL."penelitian'><i class='glyphicon glyphicon-search icon'></i> Penelitian</a></li>
							<li ".$pengabdian1."><a href='".URL."pengabdian'><i class='glyphicon glyphicon-saved icon'></i> Pengabdian</a></li>
							
							<li ".$publikasi1."><a href='".URL."publikasi'><i class='glyphicon glyphicon-folder-open icon'></i> Publikasi</a></li>
							
							<li ".$kerjasama1."><a href='".URL."kerjasama'><i class='glyphicon glyphicon-resize-horizontal icon'></i> Kerjasama</a></li>
							
							<li class='nav-sidebar-header'>PENGATURAN</li>
							<li ".$pengaturan1."><a href='".URL."pengaturan'><i class='glyphicon glyphicon-wrench icon'></i> Pengaturan</a></li>
							<!--<li ".$tema."><a href='".URL."tema'><i class='glyphicon glyphicon-leaf icon'></i> Tema</a></li>
							<li ".$web_grabbing."><a href='".URL."web_grabbing'><i class='glyphicon glyphicon-flag icon'></i> Web Grabbing</a></li>-->
							<li class='nav-sidebar-header'>PENGGUNA</li>
							<li ".$staf."><a href='".URL."staf'><i class='glyphicon glyphicon-user icon'></i> Staf/ Pengelola</a></li>
							<li ".$dosen1."><a href='".URL."dosen'><i class='glyphicon glyphicon-user icon'></i> Dosen</a></li>
							<li class='nav-sidebar-header'>ADMINISTRATOR</li>
							<li ".$admin."><a href='".URL."akun_dosen'><i class='glyphicon glyphicon-user icon'></i> Akun Dosen</a></li>
						</ul>";
				 
					 
					 
					 ?>  
				</div><!--/span-->
				<div class="col-sm-9 col-md-10 main">
				<!--toggle sidebar button-->
				<p class="visible-xs">
					<button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
				</p>      
				<h1 class="page-header">
					Dashboard 
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
							case 'penelitian':
								include "views/penelitian/penelitian_view.php";	
								break;
							case 'pengabdian':
								include "views/pengabdian/pengabdian_view.php";	
								break;
							case 'kerjasama':
								include "views/kerjasama/kerjasama_view.php";
								break;
							case 'komentar':
								include "views/komentar/komentar_view.php";
								break;
							case 'pengaturan':
								include "views/pengaturan/pengaturan_view.php";
								break;
							case 'admin':
								include "admin.php";
								break;
							case 'pengumuman':
								include "views/pengumuman/pengumuman_view.php";
								break;
							case 'publikasi':
								include "views/publikasi/publikasi_view.php";
								break;
							case 'galeri':
								include "views/galeri/galeri_view.php";
								break;
							case 'agenda':
								include "views/agenda/agenda_view.php";
								break;
							case 'web_grabbing':
								include "web_grabbing.php";
								break;
							case 'staf':
								include "views/staf/staf_view.php";
								break;
							case 'profil':
								include "views/profil/profil_view.php";
								break;
							case 'dosen':
								include  "views/dosen/dosen_view.php";
								break;
							case 'akun_dosen':
								include  "views/akun_dosen/akun_dosen_view.php";
								break;
							case 'link':
								include "views/external_link/external_link_view.php";
								break;
							case 'bantuan':
								include "views/bantuan/bantuan_view.php";
								break;
							case 'akreditasi':
								include "views/akreditasi/akreditasi_view.php";
								break;
							case 'logout':
								include "controllers/logout/logout.php";
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
	// onkeypress="return nomor1(event);" 
  	function nomor1(evt)
	{
	var charCode = (evt.which) ? evt.which : event.keyCode
	if (charCode > 31 && (charCode < 48 || charCode > 57))

	return false;
	return true;
	}
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
		"advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker jbimages",
		"searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
		"save table contextmenu directionality emoticons template paste textcolor "
		],
		
		
		selector: "textarea:not(.errot)",
		//image_advtab: true,


		toolbar: "insertfile undo redo | fontselect | fontsizeselect | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages | print preview  fullpage | forecolor backcolor emoticons " ,

		relative_urls: false
		
		
		});


});
autosize(document.querySelectorAll('.errot'));
	</script>
	
</html>     
