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

if($model=='akreditasi' AND $method=='tambah' ){
	
 	if(isset($_POST['submit'])){
		$nama_dokumen 	= $_POST['nama_dokumen'];
		$keterangan_dokumen = $_POST['keterangan_dokumen'];
		// var_dump($nama_dokumen);
		$event->insertAkreditasi($nama_dokumen,$keterangan_dokumen); // method penyimpanan
		// header("location:".URL."akreditasi");
		echo "<script> alert('berhasil ditambah'); </script>";


	}else{
		echo "<script> alert('gagal menambah data'); </script>";
	}
		// die($_POST['tambah']);
		// header("location:".URL."akreditasi");
 
 // return false;
 }

if ($model=='akreditasi' AND $method=='edit' ){
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
if($model=='akreditasi' AND $method=='hapus' ){

	// $id = filter_var($_GET['id'],FILTER_VALIDATE_INT);
	$id = $_GET['id'];
	
	$event->deleteEvent($id);

}

 header("location:".URL."akreditasi");
 
 endif;
?>