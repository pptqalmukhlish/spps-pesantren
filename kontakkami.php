
<?php include "header.php"; ?>
 
 
<div class="banner1 agileits">
	<div class="header">
		<div class="container">
			<div class="header-main">
				<div class="logo">
			       <h1 style="font-size:2.1em"><a href="index.php"><?php echo $namaponpes; ?></a></h1>
			    </div>
				 <div class="top-nav">
				 	 <span class="menu"> <img src="assets/images/icon.png" alt=""></span>	
				     <nav class="cl-effect-21" id="cl-effect-21">   		       											
							<ul class="res">
								<li><a href="tentangkami.php">Tentang Kami </a></li>
								<li><a href="akademik.php">Sistem Pengajaran </a></li>
								<li><a href="berita.php">Berita & Informasi</a></li> 
								<li><a href="kontakkami.php" style="border-top:solid 2px #fff; border-bottom:solid 2px #fff;">Kontak </a></li>	 		
								<li><a href="login.php">Login Admin </a></li>
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
				<h2>Kontak Kami</h2>
				<p>Hubungi kami untuk informasi lebih lanjut</p>
			</div>		 			 
			
			<div>
			
			</div>
			<div class="contact-block1">
			 	<div class="col-md-6 contact-address">
			 	<h3><?php echo $namaponpes; ?></h3>
			 	 
			 	<ul>
			    	<li><span class="glyphicon glyphicon-map-marker" aria-hidden="true"> </span><p><?php echo $alamat; ?></p></li>
			    	<li><span class="glyphicon glyphicon-phone" aria-hidden="true"> </span><p><?php echo $notelp; ?></p></li>			    	
			    	<li><span class="glyphicon glyphicon-envelope" aria-hidden="true"> </span><p><a href="assets/mailto:info@example.com"><?php echo $email; ?></a></p></li>
			    </ul>
			 	</div>
			 	<div class="col-md-6 contact-block-left">
				<?php
				 if($_POST[sendKontakKami]=="Kirim Pesan"){
 
					 $tgl=date("Y-m-d");
					 mysql_query("INSERT INTO kontakkami(nama, email, subjek, pesan, tanggal) 
					 VALUES('$_POST[nama]','$_POST[email]','$_POST[subjek]','$_POST[pesan]','$tgl')");
					 
					 echo "Pesan Kontak Kami telah dikirim..";
				 }
				 
				
				?>
			
				 	<form action="kontakkami.php" method="post">
				 		<input type="text" placeholder="Nama" required="" name="nama">
	                    <input type="text" class="email" placeholder="Email" name="email">
	                    <input type="text" class="subject" placeholder="Judul Pesan" name="subjek">               
	                    <textarea placeholder="Isi Pesan" name="pesan"></textarea>
	                    <input type="submit" name="sendKontakKami" value="Kirim Pesan">
				 	</form>
			 	</div></div>
		</div>
	</div>
</div>
<!--contact end here-->


<?php include "footer.php"; ?>