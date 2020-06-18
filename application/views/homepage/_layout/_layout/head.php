<!DOCTYPE html>
<html lang="en">
<head>
	<title><?=($this->uri->segment(1) == '' ? '' : $title.' | ')?> Faculty of Engineering | Hasanuddin University</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <meta name="author" content="Fakultas Teknik Universitas Hasanuddin" />
    <meta name="keywords" content="ftuh, teknik-uh, teknik, unhas" />
    <meta name="description" content="Fakultas Teknik Universitas Hasanuddin" />
    <meta name="title" content="Fakultas Teknik Universitas Hasanuddin" />
	<!-- Favicon -->
	<link href="<?=home_assets()?>img/favicon.png" rel="shortcut icon"/>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="<?=home_assets()?>css/bootstrap.min.css"/>
	<link rel="stylesheet" href="<?=home_assets()?>css/font-awesome.min.css"/>
	<link rel="stylesheet" href="<?=home_assets()?>css/themify-icons.css"/>
	<link rel="stylesheet" href="<?=home_assets()?>css/magnific-popup.css"/>
	<link rel="stylesheet" href="<?=home_assets()?>css/animate.css"/>
	<link rel="stylesheet" href="<?=home_assets()?>css/owl.carousel.css"/>
	<link rel="stylesheet" href="<?=home_assets()?>css/owl.theme.default.css"/>
	<link rel="stylesheet" href="<?=home_assets()?>css/style.css"/>

	<!-- Custom CSS untuk Replace Efek CSS bawaan Template -->
	<link rel="stylesheet" href="<?=home_assets()?>css/custom.css"/>
	<link rel="stylesheet" href="<?=home_assets()?>css/custom-2.css"/>


	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
    </div>
    <?php
    $pengaturan = $this->crud->gw('pengaturan', array('id_pengaturan' => 1))[0];
    ?>
