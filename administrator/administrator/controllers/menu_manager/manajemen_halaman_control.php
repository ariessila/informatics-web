<?php 
// session_start();
if(isset($_REQUEST['model'])): // for secure single file
ob_start();
date_default_timezone_set('Asia/Jakarta');

require '../../libs/path.php';
require '../../models/class.php';

$model=$_GET['model'];

$method=$_GET['method'];
if($model=='manajemen_halaman' AND $method=='tambah' ){
	
	
 	if(isset($_POST['save'])){
	echo 1;
		// print_r($_POST['save']);
	
		$halaman = $_POST['save']; 
		
	 	$halaman = json_encode($halaman); // encoding json objek

		$manajemen_halaman->updateManajemenHalaman($halaman); // method penyimpanan
		
		$manajemen_halaman->serializeManajemenHalaman($halaman);
		
		$manajemen_halaman->serializeManajemenHalamanWithHalaman($halaman);
	
	}
}
 
if($model=='manajemen_halaman' AND $method=='restore' ){

 	$halaman = '[{"id":"2","children":[{"id":"10"},{"id":"11"},{"id":"12"}]},{"id":"3","children":[{"id":"13"},{"id":"4"},{"id":"19"},{"id":"19059167"}]},{"id":"14","children":[{"id":"18"},{"id":"17"},{"id":"15"}]},{"id":"6","children":[{"id":"25048153"}]},{"id":"5"},{"id":"8"}]';
	
	$manajemen_halaman->updateManajemenHalaman($halaman); // method penyimpanan
	
	$manajemen_halaman->serializeManajemenHalaman($halaman);

	$manajemen_halaman->serializeManajemenHalamanWithHalaman($halaman);
	
	header("location:".URL."menu_manager?act=edit");
 
 }
 
 
 // header("location:".URL."halaman");
 
 endif;
?>