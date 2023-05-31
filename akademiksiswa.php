

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
								<li><a href="akademiksiswa.php" style="border-top:solid 2px #fff; border-bottom:solid 2px #fff;">Akademik</a></li> 
								<li><a href="keuangansiswa.php">Keuangan</a></li>
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
				<h2>Akademik Santri </h2> 
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
					$data=mysql_query("select * from siswa, riwayatkelas, kelas 
					where siswa.id_siswa='$_SESSION[idsiswa]'
					and riwayatkelas.id_siswa=siswa.id_siswa 
					and riwayatkelas.id_kelas=kelas.id_kelas
					and kelas.tahunajaran='$tahunajaran'");
					 
					$isi=mysql_fetch_array($data);
					
					$_SESSION[nis]= $isi[nis];
					$_SESSION[kelas] = $isi[id_kelas];
					$_SESSION[idwalikelas] = $isi[walikelas];
					
						$caripengasuh=mysql_query("select * from siswa, riwayatkelas, kelas, guru 
									where siswa.id_siswa='$_SESSION[idsiswa]'
									and riwayatkelas.id_siswa=siswa.id_siswa 
									and riwayatkelas.id_kelas=kelas.id_kelas
									and kelas.tahunajaran='$tahunajaran' 
									and kelas.walikelas=guru.id_guru");
						$pengasuh=mysql_fetch_array($caripengasuh);			
						$_SESSION[idwalikelas] = $pengasuh[id_guru];
					
					 


				?>
				 
				<table class="table table-striped table-bordered">
				 <tr><td width=200>NIS</td><td><?php echo $isi[nis]; ?></td></tr>
				 <tr><td width=200>Nama Santri</td><td><?php echo $isi[nama_lengkap]; ?></td></tr>
				<tr><td width=200>Tingkat</td><td><?php echo $isi[tingkat]; ?></td></tr>
				<tr><td>Kelas</td><td><?php echo $isi[namakelas]; ?></td></tr> 
				<tr><td>Wali Kelas</td><td><?php echo $pengasuh[nama_guru]; ?></td></tr> 
				<tr><td>No. Telp. Wali Kelas</td><td><?php echo $pengasuh[notelp]; ?></td></tr> 
				</table>
				
				 
				<ul id="myTab" class="nav nav-tabs" role="tablist">
				  <li class="active"><a href="#kaldik" role="tab" data-toggle="tab">Kalender Akademik</a></li>
				  <li><a href="#jadwal" role="tab" data-toggle="tab">Jadwal</a></li>
				  <li><a href="#nilai" role="tab" data-toggle="tab">Nilai</a></li>
				   
				</ul>
				<div id="myTabContent" class="tab-content">
				  <div class="tab-pane fade in active" id="kaldik">
					<br/>
					<?php
					        echo "  <div class='table-responsive'>
							  <table id='datatable_demo' class='table table-striped table-bordered'>
							  <thead>
							  <tr><th>No</th><th>Tgl Kegiatan</th><th>Nama Kegiatan</th>  </tr>
							  </thead> <tbody>";

					   
					 
						  $tampil = mysql_query("SELECT * FROM kalenderakademik WHERE tahunajaran='$tahunajaran'  ORDER BY tgl_mulai DESC");
						 
					  
						$no = 1;
						while($r=mysql_fetch_array($tampil)){
							
							 
						  $tgl_posting=tgl_indo($r[tanggal]);
						  echo "<tr><td>$no</td>
									<td>".tgl_indo($r[tgl_mulai])." s/d ".tgl_indo($r[tgl_selesai])."</td>
									<td>$r[nama_kegiatan]</td>
									
										 
									</tr>";
						  $no++;
						}
						echo "</tbody></table></div> ";
	
	
					
					?>
					
				  </div>
				  <div class="tab-pane fade" id="jadwal">
					
					<?php
					 include "jadwal.php";
					?>
					
					
				  </div>
				  <div class="tab-pane fade" id="nilai">
					<br/>
					
					<?php
					$data=mysql_query("select * from siswa, riwayatkelas, kelas 
					where siswa.id_siswa='$_SESSION[idsiswa]'
					and riwayatkelas.id_siswa=siswa.id_siswa 
					and riwayatkelas.id_kelas=kelas.id_kelas ");
					
					echo "<table class='table table-bordered table-striped'>";
					echo "<tr>
							<th>Tahun Ajaran</th>
							<th>Tingkat</th>
							<th>Nilai</th> 
						</tr>";
					while ($r=mysql_fetch_array($data)){
						
						echo "<tr>
							<td align='center'>".$r[tahunajaran]."</td>
							<td align='center'>".$r[tingkat]."</td>
							<td align='center'>
							<a href='raport.php?ta=".$r[tahunajaran]."&smt=1' class='btn btn-success' target='_blank'> Semester 1</a> 
							<a href='raport.php?ta=".$r[tahunajaran]."&smt=2' class='btn btn-success' target='_blank'> Semester 2</a>
							</td> 
							</tr>";
						
					}
					echo "</table>";
					?>
					
					
				  </div>
				 
				</div>
				 
				 
								  
			 	</div>
			 	<div class="clearfix"> </div>
			 </div>			 	
				<!-- AIzaSyAQ1xRdc7rVHJ54He94xJb-Enc4B-4PT-E  -->
	 </div>
	</div>
</div>
<!--contact end here-->




<?php } else {
	$_SESSION[gagal]    = 'Anda tidak mempunyai hak akses.';
	header('location:index.php');
} ?>

<?php include "footersiswa.php"; ?>
 