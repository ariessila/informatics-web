<?php 
ob_start();
require_once("connect/database.php");
function autoload($class){

	$namafile = $class.'.php';

	include_once $namafile;

}

spl_autoload_register('autoload');

try{
	$libs 		= new libs_model();
	
	$komentar 	= new komentar_model($select);
	$home 		= new home_model($select);
	$halaman 	= new halaman_model($select);
	$manajemen_halaman 	= new manajemen_halaman_model($select);
	$artikel	= new artikel_model($select);
	$event		= new event_model($select);
	$pengumuman	= new pengumuman_model($select);
	$galeri		= new galeri_model($select);
	$struktur_organisasi = new struktur_organisasi_model($select);
	$users	 	= new users_model($select);
	$pengunjung	= new pengunjung_model($select);
	$staf		= new staf_model($select);
	$penelitian	= new penelitian_model($select);
	$pengabdian	= new pengabdian_model($select);
	$kerjasama	= new kerjasama_model($select);
	$dosen		= new dosen_model($select);
	$publikasi	= new publikasi_model($select);
	$dokumen_akreditasi	= new dokumen_akreditasi_model($select);
	
	
	$subdomain 	= new subdomain_model($master);
	$kalender 	= new kalender_model($master);
	
}
catch(Exception $e){
	echo "Menemukan kesalahan : ".$e->getMessage()."\n";
}

?>