<?php 
session_start();
if(isset($_REQUEST['model'])): // for secure single file
ob_start();
date_default_timezone_set('Asia/Jakarta');

require '../../libs/path.php';
require '../../models/class.php';

$model=$_GET['model'];

$method=$_GET['method'];

$email = 'cmsunhas@gmail.com';

if($model=='bantuan' AND $method=='tambah_post' ){
	

 	if(isset($_POST['submit'])){
		
		$tipe = 'new';
		$konten = $_POST['post'];
		
		$penulis = $_SESSION['username'].'@'.$_SESSION['nama_lengkap'];
		
		if ($bantuan->insertBantuan($konten,$penulis)) {
			$no_ticket = '';
			$libs->notifBantuan($email,$konten,$penulis, $no_ticket, $tipe);
		}

		header("location:".URL."bantuan?act=add");
	}
 
 }
 
if($model=='bantuan' AND $method=='tambah_reply' ){	

 	if(isset($_POST['submit'])){
		
		$tipe = 'reply';

		$konten = $_POST['konten'];
		
		$no_ticket = $_POST['no_ticket'];

		$penulis = $_SESSION['username'].'@'.$_SESSION['nama_lengkap'];
			
		if ($bantuan->insertBantuanReply($konten,$penulis,$no_ticket)) {
			$libs->notifBantuan($email,$konten,$penulis,$no_ticket,$tipe);
		}
		
		 header("location:".URL."bantuan?act=add");
	}
 
 }
 
else if($model=='bantuan' AND $method=='edit' ){

	
 	if(isset($_POST['simpan'])){
	
		
		$institusi = $_POST['institusi'];
		
		$jenis_bantuan = $_POST['jenis_bantuan'];
		
		$id_bantuan = $_POST['id_bantuan'];
		
		$bantuan->updatebantuan($id_bantuan,$institusi,$jenis_bantuan);
		

		 header("location:".URL."bantuan?act=edit");
	}

 }
 
 
else if($model=='bantuan' AND $method=='hapus'){

	$id = $_GET['id'];
	$file = $_GET['file'];
	
	$bantuan->deletebantuan($id);
	
	header("location:".URL."bantuan?act=del");
}

else{
	
 // header("location:".URL."bantuan");
	
}
 
 endif;
?>
