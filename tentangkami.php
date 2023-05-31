
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
								<li><a href="tentangkami.php" style="border-top:solid 2px #fff; border-bottom:solid 2px #fff;">Tentang Kami </a></li>
								<li><a href="akademik.php">Sistem Pengajaran </a></li>
								<li><a href="berita.php">Berita & Informasi</a></li> 
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
				<h2>Tentang Kami</h2>
				<p><?php echo $namaponpes; ?></p>
				<br/><br/><br/>
				<p align="left">
				<img src="upload/<?php echo $logo; ?>" alt="" class="img-responsive" width="200px" align="left" style="margin-right:20px;"> 
				
							<?php
								$isi = substr($tentangkami,0);
							echo $isi;
							?>
				</p>
			</div>
 
		</div>
	</div>
</div>
<!--about end here-->
 
 
 
 <?php include "footer.php"; ?>