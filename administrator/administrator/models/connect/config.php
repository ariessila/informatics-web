<?php
$host="localhost";
$user="teknikAsRoot";
$pass="koftte09@3ng_unha$";
$db="informatika";

// $koneksi=mysql_connect($host,$user,$pass);
$koneksi = false;
if(!$koneksi){
	echo "Connection Fail!".mysql_error();
	}
mysql_select_db($db) or die ("Database not found".mysql_error());
?>
