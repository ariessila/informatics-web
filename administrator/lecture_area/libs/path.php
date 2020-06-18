<?php 

// $a = $_SERVER['SCRIPT_FILENAME'];
// $root3 = explode("www/",$a);
// $root2 = explode("/",$root3[1]);
// $root	= $root2[0];


#nama folder aktif
$a = $_SERVER['SCRIPT_FILENAME'];
$root3 	= explode("www/",$a);
$rootpasca 	= explode("pasca/",$root3[1]);
$root2 	= explode("/",end($rootpasca));
$root	= $root2[0]; // halaman aktif
// var_dump($root);

$pasca = (count($rootpasca)>1)?'pasca/':'';

$server_name =  $_SERVER['SERVER_NAME'];
 $define = "http://".$server_name."/".$pasca.$root."/";


define('ROOT',$define);

define('URL', $define.'/lecture_area/');

