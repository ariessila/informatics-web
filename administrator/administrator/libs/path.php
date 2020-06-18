 <?php 


// $a = $_SERVER['SCRIPT_FILENAME'];
// $root3 = explode("www/",$a);
// $root2 = explode("/",$root3[1]);
// $root	= $root2[0];


#nama folder aktif
$a = $_SERVER['SCRIPT_FILENAME'];
$root3 	= explode("www/html/",$a);
$rootpasca 	= explode("pasca/",$root3[1]);
$root2 	= explode("/",end($rootpasca));
$root	= $root2[0]; // halaman aktif
// var_dump($root);
$pasca = (count($rootpasca)>1)?'pasca/':'';

$server_name =  $_SERVER['SERVER_NAME'];
$define = "https://".$server_name."/".$pasca.$root."/";

// var_dump($define);


define('ROOT',$define);

define('URL',''.$define.'administrator/');


// define('ROOT','http://eng.unhas.ac.id/template/');

// define('URL','http://eng.unhas.ac.id/template/administrator/');


?>

