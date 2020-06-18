<?php 
session_start();
if(isset($_GET['model'])): // for secure
ob_start();
date_default_timezone_set('Asia/Jakarta');
require '../../libs/path.php';
require '../../models/class.php';

$model=$_GET['model'];

$method=$_GET['method'];

// echo $method;
// echo $parameter;

if($model=='agenda' AND $method=='tambah' ){
	

//`id`=[value-1],`judul_id`=[value-2],`konten_id`=[value-3],`tanggal_mulai`=[value-4],`tanggal_selesai`=[value-5],`tempat`=[value-6],`konten_en`=[value-7],`judul_en`=[value-8],`gambar`=[value-9],`penulis`=[value-10],`link`=[value-11]
 	if(isset($_POST['tambah'])){
		$judul_id = $_POST['judul_id'];
		$judul_en = $_POST['judul_en'];
		$konten_id = trim($_POST['konten_id']);
		$konten_en = trim($_POST['konten_en']);
		$tanggal_mulai = (date('Y-m-d' ,strtotime($_POST['tanggal_mulai'])));
		$tanggal_selesai = (date('Y-m-d',strtotime($_POST['tanggal_selesai'])));
		$tempat = $_POST['tempat'];
		$link = $libs->changeLink($judul_id);
		$penulis = $_SESSION['username'];
		$gambar = '';
		 $event->insertEvent($judul_id,$link,$konten_id,$gambar,$tanggal_mulai,$tanggal_selesai,$tempat,$konten_en,$judul_en,$penulis); // method penyimpanan

		
	}
 
 // return false;
 }

if ($model=='agenda' AND $method=='edit' ){
	var_dump($_POST);
	if(isset($_POST['tambah'])){

		$id = $_POST['id'];

		$gambar = $_POST['gambar'];
		$judul_id = $_POST['judul_id'];
		$judul_en = $_POST['judul_en'];
		$konten_id = trim($_POST['konten_id']);
		$konten_en = trim($_POST['konten_en']);
		$tanggal_mulai = (date('Y-m-d' ,strtotime($_POST['tanggal_mulai'])));
		$tanggal_selesai = (date('Y-m-d',strtotime($_POST['tanggal_selesai'])));
		$tempat = $_POST['tempat'];
		$link = $libs->changeLink($judul_id);
		$penulis = $_SESSION['username'];
		
		$event->updateEvent($judul_id,$link,$konten_id,$gambar,$tanggal_mulai,$tanggal_selesai,$tempat,$konten_en,$judul_en,$penulis,$id); // method penyimpanan
			echo"<script> alert('Mengubah data'); </script>";
	}
}	
if($model=='agenda' AND $method=='hapus' ){

	// $id = filter_var($_GET['id'],FILTER_VALIDATE_INT);
	$id = $_GET['id'];
	
	$event->deleteEvent($id);

}

 header("location:".URL."agenda");
 
 endif;
?>