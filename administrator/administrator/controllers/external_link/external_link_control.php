<?php 
// session_start();
if(isset($_REQUEST['model'])): // for secure single file
date_default_timezone_set('Asia/Jakarta');

require '../../libs/path.php';
require '../../models/class.php';

$model=$_GET['model'];

$method=$_GET['method'];
	
if ($model=='external_link' AND $method=='tambah' ){
	if(isset($_POST['link'])){

		$link = $_POST['link'];
		 $external_link->insertExternalLink($link); // method penyimpanan
			
		header("location:".URL."link?act=add");
	}
}

else if ($model=='external_link' AND $method=='edit'){
	if(isset($_POST['link'])){
		var_dump($_POST);
		$link = $_POST['link'];
		$id = $_POST['id_link'];
		$external_link->updateExternalLink($link,$id); // method penyimpanan
		
		header("location:".URL."link?act=edit");
	}
}

else if ($model=='external_link' AND $method=='hapus' ){

		$id = $_GET['id'];
		
		$external_link->deleteNomor($id);
		
		header("location:".URL."link?act=del");

}	
else{
 header("location:".URL."link");
	
}
 
 endif;
?>