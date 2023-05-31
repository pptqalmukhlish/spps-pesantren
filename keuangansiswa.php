

<?php include "header.php"; ?>
<?php if($_SESSION[idsiswa]!="") { ?>

 
<div class="banner1 agileits">
	<div class="header">
		<div class="container">
			<div class="header-main">
				<div class="logo">
			       <h1 style="font-size:2.1em"><a href="profilsiswa.php"><?php echo $namaponpes; ?></a></h1>
			    </div>
				 <div class="top-nav">
				 	 <span class="menu"> <img src="assets/images/icon.png" alt=""></span>	
				     <nav class="cl-effect-21" id="cl-effect-21">   		       											
							<ul class="res">
								<li><a href="profilsiswa.php">Profile </a></li>
								<li><a href="akademiksiswa.php">Akademik</a></li>
								<li><a href="keuangansiswa.php" style="border-top:solid 2px #fff; border-bottom:solid 2px #fff;">Keuangan</a></li> 
								<li><a href="tabungansiswa.php">Tabungan </a></li>
								<li><a href="tatatertibsiswa.php" >Tata Tertib </a></li>	
								<li><a href="logout.php" >Logout </a></li>								
							</ul>
						</nav>
						<!-- script-for-menu -->
										 <script>
										   $( "span.menu" ).click(function() {
											 $( "ul.res" ).slideToggle( 300, function() {
											 // Animation complete.
											  });
											 });
										</script>
						<!-- /script-for-menu -->
		
				 </div>
				<div class="clearfix"> </div>
			</div>			
	    </div>
   </div>
</div>
<!--header end here-->
<!--banner end here-->
<!--contact start here-->
<div class="contact">
	<div class="container">
		<div class="contact-main">	
			<div class="contact-top">
				<h2>Keuangan Santri </h2> 
				<p>Tahun Ajaran <?php echo $tahunajaran; ?></p>
			</div>		 			 
			
			<div>
			
			</div>
			<div class="contact-block1">
			 	<div class="col-md-3 contact-address">
			 	 <?php
					$carisiswa = mysql_query("SELECT * FROM siswa WHERE id_siswa='$_SESSION[idsiswa]'");
					$siswa=mysql_fetch_array($carisiswa);
					if($siswa[foto]!=""){
						$siswa[foto]=$siswa[foto];
					} else {
						$siswa[foto]="noimage.jpg";
					}
				 ?>
				 <center><img src="upload/foto_siswa/<?php echo $siswa[foto]; ?>" class="img-responsive" width="60%"></center>
				 
			 	</div>
			 	<div class="col-md-9 contact-block-left">
				 
				  


			<?php 
			 $edit =mysql_query("SELECT * FROM siswa, riwayatkelas, kelas  
							WHERE siswa.id_siswa=riwayatkelas.id_siswa
							AND riwayatkelas.id_kelas=kelas.id_kelas
							AND kelas.tahunajaran='$tahunajaran' 
							AND siswa.id_siswa='$_SESSION[idsiswa]'");
    $r    = mysql_fetch_array($edit);
	?>

 

         
            
                    
    	 
		  
		  
	  
		 
			<?php
			$caribiaya = mysql_query("SELECT * FROM biayapendidikan 
							WHERE tahunajaran='$tahunajaran' AND tingkat='$r[tingkat]'");
			
			 
			
			echo "<ul id='myTab' class='nav nav-tabs' role='tablist'>";
 			$x=0;
			while($biaya = mysql_fetch_array($caribiaya)) {
				 if($x==0){ $ok= "active"; } else { $ok="";} 
				echo "<li class='$ok'><a href='#$biaya[id_biaya]' role='tab' data-toggle='tab'>$biaya[nama_biaya]</a></li>";
				$x++; 
			}
			echo "</ul>";
			 
			
			?>
				
				 
			</ul>
			<!-- Tab panes -->
			<div id="myTabContent" class="tab-content">
			
			<?php
			$caribiaya = mysql_query("SELECT * FROM biayapendidikan 
							WHERE tahunajaran='$tahunajaran' AND tingkat='$r[tingkat]'");
			
			$x=0;
			while($biaya = mysql_fetch_array($caribiaya)) {
				if($x==0){ $ok= "active"; } else { $ok="";} 
				echo "<div class='tab-pane fade in $ok' id='$biaya[id_biaya]'><br/>";
				?>
				<form id="formulir" class="form-horizontal" enctype="multipart/form-data"  method="post" action='#' role="form">
				
				<input type=hidden name='idsiswa' value='<?php echo $r[id_siswa]; ?>'>
				<input type=hidden name='idkelas' value='<?php echo $r[id_kelas]; ?>'>
				<input type=hidden name='idbiaya' value='<?php echo $biaya[id_biaya]; ?>'>
					TOTAL BIAYA : <?php echo format_rupiah($biaya[besar_biaya]) ?><br/><br/>
					<table class="table table-striped table-bordered"> 
					<tr><th>Angsuran Ke</th><th> Tagihan</th><th> Tanggal Terlambat</th><th>Tanggal Bayar</th><th>Jumlah Bayar</th></tr>
			
				<?php
					$caribiayadetail = mysql_query("SELECT * FROM biayapendidikandetail 
							WHERE id_biaya='$biaya[id_biaya]' order by id_detailbiaya ASC"); 
					$total=0;
					while($biayadetail = mysql_fetch_array($caribiayadetail)) {
						
						$caripembayaran = mysql_query("SELECT * FROM pembayaransiswa 
							WHERE id_siswa='$_SESSION[idsiswa]' 
							AND id_biaya='$biaya[id_biaya]' 
							AND angsuran_ke='$biayadetail[angsuran_ke]'"); 
					
						$pembayaran= mysql_fetch_array($caripembayaran);
						if($pembayaran[tgl_bayar]=="0000-00-00") { $pembayaran[tgl_bayar]=""; } else { $pembayaran[tgl_bayar]=$pembayaran[tgl_bayar]; }
						
						if($pembayaran[jumlah_bayar]=="0") { $pembayaran[jumlah_bayar]=""; } else { $pembayaran[jumlah_bayar]=$pembayaran[jumlah_bayar]; } 
						echo "<tr>
								<td align='center'>$biayadetail[angsuran_ke]</td>
								<td align='center'> ".format_rupiah($biayadetail[tagihan])."</td>
								<td align='center'> $biayadetail[tgl_terlambat] </td>
								<td align='center'> $pembayaran[tgl_bayar] </td>
								<td align='center'> ".format_rupiah($pembayaran[jumlah_bayar])."</td>
							</tr>";
						$total=$total+$pembayaran[jumlah_bayar];
					}
				?>
					<tr>
								<td align='center'> </td>
								<td align='center'> </td>
								<td align='center'> </td>
								<td align='center'> TOTAL PEMBAYARAN </td>
								<td align='center'> <?php echo format_rupiah($total); ?> </td>
							</tr>
					</table>
					
				 
				</form>
					 
				<?php	 
				echo "</div>";
				$x++;
			}
			
			?>
				
				
				 
			</div>
		 
		  
	 
	
<br/> <br/>  
	
	
	</div>
			 














				 
			 	</div>
			 	<div class="clearfix"> </div>
			 </div>			 	
				 
	 </div>
	</div>
</div>
<!--contact end here-->

<?php } else {
	$_SESSION[gagal]    = 'Anda tidak mempunyai hak akses.';
	header('location:index.php');
} ?>

<?php include "footersiswa.php"; ?>