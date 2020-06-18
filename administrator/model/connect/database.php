<?php
// menghubungi master admin
	$master = new PDO('mysql:host=localhost; dbname=masteradministrator;charset=utf8','root','585259');

	$master->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	$master->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	//deteksi db yang digunakan
	// $a = $_SERVER['SCRIPT_FILENAME'];
	// $root3 = explode("www/",$a);
	// $root2 = explode("/",$root3[1]);
	// $root  = $root2[0];


	#nama folder aktif
	$a = $_SERVER['SCRIPT_FILENAME'];
	$root3 	= explode("www/html/",$a);
	$rootpasca 	= explode("pasca/",$root3[1]);
	$root2 	= explode("/",end($rootpasca));
	$root	= $root2[0]; // halaman aktif
	// var_dump($root);


	$subdomain	= $root; // identitas halaman

	$database = 'db_'.$subdomain;

	$admin = $master->prepare("select * from subdomain where subdomain = :id");
	$admin->bindParam('id',$subdomain,PDO::PARAM_STR);
	$admin->execute();

	$adm = $admin->fetch();

	// $select = new PDO('mysql:host=localhost; dbname='.$database.';charset=utf8','root','sqlnugraha93');
	$select = new PDO('mysql:host=localhost; dbname='.$database.';charset=utf8',$adm['user'],$adm['password']);

	$select->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	$select->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	// $insert = new PDO('mysql:host=localhost; dbname='.$database.';charset=utf8','root','sqlnugraha93');
	$insert = new PDO('mysql:host=localhost; dbname='.$database.';charset=utf8',$adm['user'],$adm['password']);

	$insert->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	$insert->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>
