
<?php include "index.php"; ?>
<?php

	 if($_POST[sendLogin]=="Login"){
		 //cek login
		  
		  
			function antiinjection($data){
			  $filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
			  return $filter_sql;
			}

			$nis = antiinjection($_POST[nis]);
			$pass     = antiinjection(md5($_POST[password]));

			$login=mysql_query("SELECT * FROM siswa WHERE nis='$nis' AND password='$pass'");
			$ketemu=mysql_num_rows($login);
			$r=mysql_fetch_array($login);
			 
			// Apabila username dan password ditemukan
			if ($ketemu > 0){
			  
			  $_SESSION["idsiswa"]     = $r["id_siswa"]; 
			  
			  header('location:profilsiswa.php');
			}
			else{
			
			}
				 }

?>
			
			<?php
				
				$tampil=mysql_query("SELECT * FROM berita  ORDER BY id_berita DESC limit 0, 3");
				  
				while($r=mysql_fetch_array($tampil)){
					
					$tgl = substr($r[tanggal],8,2);
					$bulan = substr($r[tanggal],5,2);
					?>
					
					
						<div class="events-grid">
							<div class="col-md-2 event-month wthree">
								<h3><?php echo $tgl; ?></h3>
								<h4><?php echo getBulan2($bulan); ?></h4>
							</div>
							<div class="col-md-6 event-text">
								<h4><?php echo $r[judul]; ?></h4>
								<p><?php echo substr(strip_tags($r[isi_berita]),0,200); ?> ... </p>
								<a href="detilberita.php?id=<?php echo $r[id_berita]; ?>">Selengkapnya</a>
								<p> </p>
							</div>
							<div class="col-md-4 event-img">
								<div class="item item-type-move">
									 
									<div class="item-img">
											<img src="upload/foto_berita/<?php echo $r[gambar]; ?>" class="img-responsive" alt="" style="padding:5px; border:solid 1px #ccc; margin:0px 10px;">
									</div>
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

<script src="assets/js/responsiveslides.min.js"></script>
<script>
    // You can also use "$(window).load(function() {"
    $(function () {
      $("#slider2").responsiveSlides({
        auto: true,
        pager: true,
        speed: 300,
        namespace: "callbacks",
      });
    });
  </script>

 


<?php include "footer.php"; ?>