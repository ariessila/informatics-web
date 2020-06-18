<?php 
ob_start();
require_once("connect/database.php");
function autoload($class){

	$namafile = $class.'.php';

	include_once $namafile;

}

spl_autoload_register('autoload');

try{
	$artikel			= new artikel_model($db);
	$libs 				= new libs_model();
	$manajemen_halaman 	= new manajemen_halaman_model($db);
	$halaman 			= new halaman_model($db);
	$galeri				= new galeri_model($db);
	$pengaturan			= new pengaturan_model($db);
	$profil				= new profil_model($db);
	$publikasi			= new publikasi_model($db);
	$penelitian			= new penelitian_model($db);
	$pengabdian			= new pengabdian_model($db);
	$dosen				= new dosen_model($db);
	
	
	$jurusan	 		= new jurusan_model($master);
}
catch(Exception $e){
	echo "Menemukan kesalahan : ".$e->getMessage()."\n";
}

?>