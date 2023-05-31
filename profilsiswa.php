

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
								<li><a href="profilsiswa.php" style="border-top:solid 2px #fff; border-bottom:solid 2px #fff;">Profile </a></li>
								<li><a href="akademiksiswa.php">Akademik</a></li>  
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
				<h2>Profile Santri </h2> 
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
				 
				<table class="table table-striped table-bordered">
				<tr><td width=200>Nama Lengkap</td><td><?php echo $siswa[nama_lengkap]; ?></td></tr>
				<tr><td>Jenis Kelamin</td><td><?php echo $siswa[jenis_kelamin]; ?></td></tr>
				<tr><td>Tempat Lahir</td><td><?php echo $siswa[tempat_lahir]; ?></td></tr>
				<tr><td>Tanggal Lahir</td><td><?php echo tgl_indo($siswa[tgl_lahir]); ?></td></tr> 
				</table>
				
				<table class="table table-striped table-bordered">
				<tr><td width=200>Nama Bapak</td><td><?php echo $siswa[nama_bapak]; ?></td></tr>
				<tr><td>Pekerjaan Bapak</td><td><?php echo $siswa[pekerjaan_bapak]; ?></td></tr>
				<tr><td>Nama Ibu</td><td><?php echo $siswa[nama_ibu]; ?></td></tr>
				<tr><td>Pekerjaan Ibu</td><td><?php echo $siswa[pekerjaan_ibu]; ?></td></tr>
				<tr><td>Alamat</td><td><?php echo $siswa[alamat_lengkap]; ?></td></tr>
				<tr><td>No. Telp.</td><td><?php echo $siswa[notelp_ortu]; ?></td></tr>   
				</table>
				  
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