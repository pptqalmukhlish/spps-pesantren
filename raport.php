<?php
	session_start();
	error_reporting(0);
 	
	include "config/koneksi.php";
 
	include "config/fungsi_indotgl.php";
	include "config/fungsi_rupiah.php";
 
  
	$carisiswa = mysql_query("SELECT * FROM siswa WHERE id_siswa='$_SESSION[idsiswa]'");
	$siswa=mysql_fetch_array($carisiswa);
					 
	$cari = mysql_query("SELECT * FROM profil WHERE id_profil='1'");
	$profil=mysql_fetch_array($cari);
	
	   
			$tahunajaran = $_GET['ta']; 
	 
			 
				 
				 

$xxx='<style>

body{
	margin:40px 70px 40px 70px;
}

.tableku {
border-collapse:collapse; 
}

* {
font-size:11px;
}
.tableku td{
border-collapse:collapse;
border:1px solid #666666;
font-size:10px;
padding-left:6px;
padding-right:6px;
height:20px;
padding-top:5px;
}

 
 


.formatKalimat{
	   text-transform: lowercase;
	  
}

</style>';



    $xxx .= ' 
	<div align=center style="font-size:14pt; ">RAPORT SEMENTARA</div> 
	<div align=center style="font-size:14pt; ">'.$profil[nama_ponpes].' </div>  
	<br/><br/>
     <hr/><br/><br/>
	  
	 
 ';
  
	$edit =mysql_query("SELECT * FROM siswa, riwayatkelas, kelas  
							WHERE siswa.id_siswa=riwayatkelas.id_siswa
							AND riwayatkelas.id_kelas=kelas.id_kelas
							AND kelas.tahunajaran='$tahunajaran' 
							AND siswa.id_siswa='$_SESSION[idsiswa]'");
   
    $r = mysql_fetch_array($edit);
	$idsiswa=$r[id_siswa];
	$idkelas=$r[id_kelas];
	$namasiswa=$r[nama_lengkap];
	 
	 
	  
		  
		  
	$xxx.='
		 <table class="" width="100%">
			<tr><td width="80">Nama Santri</td><td width="220">: '. $siswa[nama_lengkap].'</td><td>Kelas</td><td>: '.$r[namakelas].'</td></tr>';
		$xxx.= '<tr><td>Tahun Ajaran</td><td>: '.$tahunajaran.'</td><td>Semester</td><td>: '.$_GET[smt].'</td></tr>'; 
		$xxx.= '</table>';
		 
	 
		$xxx.= '<br/><br/>';
	 
		$xxx.=' <table class="tableku" width="100%"> 
			<tr><td width="30" align="center"><b>No</b></td>
				<td align="center"><b>Mata Pelajaran</b></td>
				 <td width="100" align="center"><b>Nilai Akhir</b></td>
			</tr>';
			 
			
			  
			$carimapel = mysql_query("SELECT * FROM jadwal
							WHERE tahunajaran='$tahunajaran'
							AND id_kelas='".$idkelas."' 
							order by id_mapel asc");	
			
			while($mapel = mysql_fetch_array($carimapel)) {
				$carinilai = mysql_query("SELECT * FROM nilai, mapel 
									WHERE nilai.id_siswa='$_SESSION[idsiswa]' 
									AND nilai.id_mapel=mapel.id_mapel
									AND nilai.id_mapel='$mapel[id_mapel]' 
									AND nilai.id_kelas='$idkelas'
									AND nilai.semester='$_GET[smt]'"); 
				$nilaiakhir="";
				$no=1;
				while ($n=mysql_fetch_array($carinilai)) {
					$xxx.= '<tr>
						<td align="center">'.$no.'</td> 
						<td>'.ucwords(strtolower($n[nama_mapel])).'</td> 
						<td align="center">'.$n[nilai_akhir].' </td></tr>';
				$no++;	
				}
					 
			 
				
			}
			 
		$xxx.='</table>'; 
		$xxx.='<br/><br/><br/><br/>';
	
  
	 
	 
 
$tgl = date("Y-m-d");
require_once("assets/dompdf/dompdf_config.inc.php");

$_GET["save_file"] == false;

$dompdf = new DOMPDF();
$dompdf->set_paper(DEFAULT_PDF_PAPER_SIZE, 'portrait');
$dompdf->load_html($xxx);
$dompdf->render();
$dompdf->stream("Raport Sementara ".$namasiswa." TA ".$tahunajaran." Semester ".$_GET[smt].".pdf", array("Attachment" => 0));


 
?>
