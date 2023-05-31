<?php
	session_start();
	error_reporting(0);
	include "../config/koneksi.php";
	
	$idkelas = isset($_GET['id_kelas']) ? intval($_GET['id_kelas']) : 0; 
	
 	
	$query = "SELECT * FROM jadwal, mapel 
					WHERE jadwal.id_mapel=mapel.id_mapel 
					AND jadwal.tahunajaran='$_SESSION[tahunajaran]' 
					AND jadwal.id_kelas='$idkelas' 
					GROUP BY jadwal.id_mapel";
	$result = mysql_query($query);
	
	$respon = array();
	while ($hasil = mysql_fetch_array($result))
	{
	    $respon[]= $hasil;
	}
	echo json_encode($respon);	
?>