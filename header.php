<?php
session_start();
error_reporting(0);

date_default_timezone_set('Asia/Jakarta');
 
include "config/koneksi.php";
include "config/fungsi_indotgl.php";
include "config/fungsi_rupiah.php";


  $cari = mysql_query("SELECT * FROM profil WHERE id_profil='1'");
  while($r=mysql_fetch_array($cari)){
		$namaponpes = $r['nama_ponpes'];
		$alamat = $r['alamat']; 
		$notelp = $r['notelp']; 	
		$email = $r['email']; 		
		$logo = $r['logo'];
		$tentangkami = $r['tentangkami'];
  }
 
  $cari_ta = mysql_query("SELECT * FROM tahunajaran WHERE status='aktif'");
  while($ta=mysql_fetch_array($cari_ta)){
		$tahunajaran = $ta['namatahunajaran']; 
  }
 
 
?>

<!DOCTYPE HTML>
<html>
<head>
<title><?php echo $namaponpes; ?></title>
<link rel="shortcut icon" href="upload/<?php echo $logo; ?>">

<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Custom Theme files -->
<link href="assets/css/style.css" rel="stylesheet" type="text/css" media="all"/>
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Learning  Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--Google Fonts-->
<link href='//fonts.googleapis.com/css?family=Marvel:400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Roboto:400,300,500,700,900' rel='stylesheet' type='text/css'>
<!--google fonts-->
<script src="assets/js/jquery-1.11.0.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<link type="text/css" rel="stylesheet" href="assets/css/colorfulTab.min.css">
<link rel="stylesheet" href="assets/css/flexslider.css" type="text/css" media="screen" />

<style>

th {
	
	text-align:center;
	
}

table {
	
	font-size:0.9em;
}

.about-top p {
    color: #777676;
    font-size: 1em;
    line-height: 1.8em;
    margin: 0 auto;
    width: 100%;
}

.tabelku td,  .tabelku th, .tabelku{
	
	border-color:#ccc;
}

.tabelku th {
	background-color:#F1F1F1;
	padding:5px;
}


.top-nav ul.res li a {
	padding:4px !important;
}

nav a {
    margin: 0px 3px;
}

</style>

</head>
<body>