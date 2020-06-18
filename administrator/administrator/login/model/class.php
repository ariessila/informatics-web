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
	
	$home 		= new home_model($db);
	$halaman 	= new halaman_model($db);
	$manajemen_halaman 	= new manajemen_halaman_model($db);
	$artikel	= new artikel_model($db);
	$event		= new event_model($db);
	$pengumuman	= new pengumuman_model($db);
	$galeri		= new galeri_model($db);
	
	$users	 	= new users_model($db);
	
}
catch(Exception $e){
	echo "Menemukan kesalahan : ".$e->getMessage()."\n";
}

?>