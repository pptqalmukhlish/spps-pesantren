

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
								<li><a href="keuangansiswa.php">Keuangan</a></li>
								<li><a href="tabungansiswa.php">Tabungan </a></li>
								<li><a href="tatatertibsiswa.php" style="border-top:solid 2px #fff; border-bottom:solid 2px #fff;">Tata Tertib </a></li>	
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
				<h2>Tata Tertib Santri </h2> 
				<p>Tahun Ajaran <?php echo $tahunajaran; ?></p>
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
				 	$cari = mysql_query("SELECT * FROM tatatertibsantri WHERE tahunajaran='$tahunajaran'");
					$tt=mysql_fetch_array($cari);
					$tatatertiblengkap=$tt[isi_tatatertib ];
					$file=$tt[file_tatatertib ];
				 ?>
			 
			 
			 <div>  <a href="upload/<?php echo $file; ?>" class="btn btn-success pull-right" target="_blank" style="margin-top:-30px;" >Download Buku Tata Tertib Santri</a></div>
					 
				<ul id="myTab" class="nav nav-tabs" role="tablist">
				  <li class="active"><a href="#tartib" role="tab" data-toggle="tab">Tata Tertib</a></li>
				  <li><a href="#pelanggaran" role="tab" data-toggle="tab">Catatan Pelanggaran</a></li>
				   
				   
				</ul>
				<div id="myTabContent" class="tab-content">
				  <div class="tab-pane fade in active" id="tartib">
					<br/>  
					<?php
					         
						echo $tatatertiblengkap;
					
					?>
					
				  </div>
				  <div class="tab-pane fade" id="pelanggaran">
					<br/> 
 
				
				<?php
				
				$tampil = mysql_query("SELECT * FROM pelanggaransantri, siswa, jenispelanggaran 
									WHERE pelanggaransantri.id_siswa=siswa.id_siswa 
									AND siswa.id_siswa='$_SESSION[idsiswa]' 
									AND pelanggaransantri.id_jenispelanggaran=jenispelanggaran.id_jenispelanggaran  
									ORDER BY pelanggaransantri.tgl_pelanggaran DESC  ");
				
				
				$jumlah=mysql_num_rows($tampil);
				if($jumlah>0){ 
				  echo "<div class='table-responsive'>
				  <table id='datatable_demo' class='table table-striped table-bordered'>
				  <thead>
				  <tr><th width=20>No</th> 
				  <th>Tgl Pelanggaran</th>  
				  <th>Pelanggaran</th>
				  <th>Tipe Pelanggaran</th>
				  <th>Sanksi</th>
				  <th>Pemberi Sanksi</th> 
				  <th>Pembinaan / Feedback</th>
				  </tr></thead><tbody>";
		 

			
		  
			$no =  1;
			 

			while($r=mysql_fetch_array($tampil)){
			  echo "<tr><td>$no</td> 
						<td >".tgl_indo($r[tgl_pelanggaran])."</td> 
						<td >$r[nama_pelanggaran]</td>
						<td >$r[tipe_pelanggaran]</td>
						<td >$r[sanksi]</td>
						<td >$r[pemberi_sanksi]</td>
						<td >$r[catatan]</td>"; ?>
					   
		 
						 
						
				
			<?php	   
			echo  "</tr>";
			  $no++;
			}
			echo "</tbody></table> </div>";
				
			} else {
				echo "Siswa tidak memiliki catatan pelanggaran.";
				
			}
				?>
				
				  
			 	</div>
					
					
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