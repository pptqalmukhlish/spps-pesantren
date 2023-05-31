<?php
session_start();
include "config/koneksi.php";



	$cari=mysql_query("SELECT * FROM tahunajaran WHERE status='aktif'"); 
	$ta = mysql_fetch_array($cari);
	$_SESSION[tahunajaran]=$ta['namatahunajaran'];
	
	
	

function antiinjection($data){
  $filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter_sql;
}

$username = antiinjection($_POST[username]);
$pass     = antiinjection(md5($_POST[password]));

$login=mysql_query("SELECT * FROM pengguna WHERE username='$username' AND password='$pass' AND status='Aktif'");
$ketemu=mysql_num_rows($login);
$r=mysql_fetch_array($login);
 
// Apabila username dan password ditemukan
if ($ketemu > 0){
	  
	  $_SESSION["idadmin"]     = $r["id_pengguna"];
	  $_SESSION["namauser"]     = $r["username"];
	  $_SESSION["namalengkap"]  = $r["nama_lengkap"];
	  $_SESSION["passuser"]     = $r["password"]; 
	  $_SESSION["hakakses"]     = $r["hak_akses"];
	  
	  if($r[foto]!="") {
		  $_SESSION["foto"]     	= $r["foto"];
	  } else {
			$_SESSION["foto"]  =  "noimage.jpg";
	  }
	 
	  
	  header('location:admin/dashboard.php?module=home');
}
else{
	
	$cariguru=mysql_query("SELECT * FROM guru WHERE username='$username' AND password='$pass'");
	$jumlah=mysql_num_rows($cariguru);
	$guru=mysql_fetch_array($cariguru);
	
	if ($jumlah > 0){
	  
	  $_SESSION["idadmin"]     = $guru["id_guru"];
	  $_SESSION["namauser"]     = $guru["username"];
	  $_SESSION["namalengkap"]  = $guru["nama_guru"];
	  $_SESSION["passuser"]     = $guru["password"]; 
	  $_SESSION["hakakses"]     = "Ustadz";
	  
	  
	   if($guru[foto]!="") {
		  $_SESSION["foto"]     	= $guru["foto"];
	  } else {
		$_SESSION["foto"]  =  "noimage.jpg";
	  } 
	   
	    
	  
	  header('location:ustadz/dashboard.php?module=home');
	}
	else{
			
		 $_SESSION[gagal]    = 'Anda tidak mempunyai hak akses.';
		  header('location:index.php');

	}
	

}
?>
