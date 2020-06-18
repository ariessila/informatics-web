<?php 
// session_start();
if(isset($_REQUEST['model'])): // for secure single file
ob_start();
date_default_timezone_set('Asia/Jakarta');

require '../../libs/path.php';
require '../../models/class.php';

$model=$_GET['model'];

$method=$_GET['method'];

 
if($model=='komentar' AND $method=='hapus'){

	$id = $_GET['id'];
	
	$komentar->deleteKomentar($id);
	
	header("location:".URL."komentar?act=del");
}
else{
	
header("location:".URL."komentar");
	
}
 
 endif;
?>