<?php 
// session_start();
if(isset($_REQUEST['model'])): // for secure single file
ob_start();
date_default_timezone_set('Asia/Jakarta');

require '../../libs/path.php';
require '../../models/class.php';

$model=$_GET['model'];

$method=$_GET['method'];

if($model=='kerjasama' AND $method=='tambah' ){
	

 	if(isset($_POST['simpan'])){
		
		$institusi = $_POST['institusi'];
		
		$masa_berlaku = $_POST['masa_berlaku'];
		
		$tahun = $_POST['tahun'];
		
		$jenis_kerjasama = $_POST['jenis_kerjasama'];
		
		$kerjasama->insertKerjasama($institusi,$jenis_kerjasama,$tahun,$masa_berlaku);
		
		 header("location:".URL."kerjasama?act=add");
	}
 
 }
 
else if($model=='kerjasama' AND $method=='edit' ){

	
 	if(isset($_POST['simpan'])){
	
		$masa_berlaku = $_POST['masa_berlaku'];
		
		$tahun = $_POST['tahun'];
		
		$institusi = $_POST['institusi'];
		
		$jenis_kerjasama = $_POST['jenis_kerjasama'];
		
		$id_kerjasama = $_POST['id_kerjasama'];
		
		$kerjasama->updateKerjasama($id_kerjasama,$institusi,$jenis_kerjasama,$tahun,$masa_berlaku);
		

		 header("location:".URL."kerjasama?act=edit");
	}

 }
 
 
else if($model=='kerjasama' AND $method=='hapus'){

	$id = $_GET['id'];
	$file = $_GET['file'];
	
	$kerjasama->deletekerjasama($id);
	
	header("location:".URL."kerjasama?act=del");
}

else{
	
 // header("location:".URL."kerjasama");
	
}
 
 endif;
?>