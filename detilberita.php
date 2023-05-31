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
								<li><a href="berita.php" style="border-top:solid 2px #fff; border-bottom:solid 2px #fff;">Berita & Informasi</a></li> 
								<li><a href="kontakkami.php">Kontak </a></li>
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
<!--tab start here-->
<script type="text/javascript" src="assets/js/colorfulTab.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
        
        $("#colorful").colorfulTab();    
        
        $("#colorful-elliptic").colorfulTab({
            theme: "elliptic"
        }); 
       
       $("#colorful-flatline").colorfulTab({
            theme: "flatline"
        });    
        
        $("#colorful-background-image").colorfulTab({
            theme: "flatline",
            backgroundImage: "true",
            overlayColor: "#002F68",
            overlayOpacity: "0.8"
        });   
    
    });
  </script>
<!--tab start here-->
<!--about start here-->
<div class="about">
	<div class="container">
		<div class="about-main">
			<div class="about-top">
				<h2>Berita dan Informasi</h2>
				<p>Berita, Informasi, dan Pengumuman Seputar Pondok Pesantren dan Madrasah Diniyyah Al Mukhlish Kalidadi.</p>
			</div>
 </div>
	</div>
</div>
<!--about end here-->
 
 
 
 <!--event start here-->
<div class="events">
	<div class="container">
		<div class="events-main">
			 
			
			<?php
				
				$tampil=mysql_query("SELECT * FROM berita  WHERE id_berita='$_GET[id]'");
				  
				while($r=mysql_fetch_array($tampil)){
					
					$tgl = substr($r[tanggal],8,2);
					$bulan = substr($r[tanggal],5,2);
					?>
					
					
						<div class="events-grid">
							<div class="col-md-2 event-month wthree">
								<h3><?php echo $tgl; ?></h3>
								<h4><?php echo getBulan2($bulan); ?></h4>
							</div>
							<div class="col-md-10 event-text">
								<img src="upload/foto_berita/<?php echo $r[gambar]; ?>" class="img-responsive" alt="" align="right" width="400px" style="padding:5px; border:solid 1px #ccc; margin:0px 10px;">
								<h4><?php echo $r[judul]; ?></h4>
								<p><?php echo $r[isi_berita]; ?> </p> 
								<p> </p>
							</div>
							 

							</div>
						   <div class="clearfix"> </div>
						</div>
					
		
					
					<?php
				}
				 
			?>
			

		
		</div>
	</div>
</div>
<!--event end here-->


<?php include "footer.php"; ?>