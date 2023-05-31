 <aside class="sidebar">
				
	<div class="sidebar-container">
		<div class="sidebar-header">
			<div class="brand" style="line-height: 40px;">
			   <center><img src="../upload/<?php echo $logo; ?>" width="80px" style="padding-top:10px"> </center><?php echo strtoupper($namaaplikasi); ?></div>
		</div>
		
		<nav class="menu">
			<ul class="nav metismenu" id="sidebar-menu">
				<li <?php if($_GET[module]=="home") { echo "class=active";}   ?>>
					<a href="dashboard.php?module=home"> <i class="fa fa-home"></i> Dashboard </a>
				</li>
				<li <?php if($_GET[module]=="profil" 
							or $_GET[module]=="halaman"
							or $_GET[module]=="kontakkami"
							or $_GET[module]=="berita" ) { echo "class='active open'";}   ?>>
					<a href=""> <i class="fa fa-th-large"></i> Website dan Profile  <i class="fa arrow"></i> </a>
					<ul>
						<li <?php if($_GET[module]=="profil") { echo "class='active'";}   ?>> <a href="dashboard.php?module=profil">
							Profile Aplikasi
							</a> </li>
						
						 <li <?php if($_GET[module]=="berita") { echo "class='active'";}   ?>> <a href="dashboard.php?module=berita">
							Berita & Informasi
							</a> </li>
						  <li <?php if($_GET[module]=="kontakkami") { echo "class='active'";}   ?>> <a href="dashboard.php?module=kontakkami">
							Kontak Kami
							</a> </li>
					</ul>
				</li>
				
				<!--  <li <?php // if($_GET[module]=="periodepenerimaan" or $_GET[module]=="calonsantri"  ) { echo "class='active open'";}   ?>>
					<a href=""> <i class="fa fa-th-large"></i> Penerimaan Santri <i class="fa arrow"></i> </a>
					<ul>
						<li <?php // if($_GET[module]=="periodepenerimaan") { echo "class='active'";}   ?>> <a href="dashboard.php?module=periodepenerimaan">
							Periode Penerimaan
							</a> </li>
						<li <?php // if($_GET[module]=="calonsantri") { echo "class='active'";}   ?>> <a href="dashboard.php?module=calonsantri">
							Calon Santri
							</a> </li>
						 
					</ul>
				</li> -->
				
				
				<li <?php if($_GET[module]=="tahunajaran"  
							or $_GET[module]=="pengguna"   
							or $_GET[module]=="siswa"  
							or $_GET[module]=="mapel" 
							or $_GET[module]=="guru" 
							or $_GET[module]=="ruang"   ) { echo "class='active open'";}   ?>>
					<a href=""> <i class="fa fa-folder-open-o"></i>Master Data <i class="fa arrow"></i> </a>
					<ul>
						 <li <?php if($_GET[module]=="pengguna") { echo "class='active'";}   ?>> <a href="dashboard.php?module=pengguna">
								Pengguna
							</a> </li>
						
						<li <?php if($_GET[module]=="guru") { echo "class='active'";}   ?>> <a href="dashboard.php?module=guru">
								Ustadz
							</a> </li>
							
						<li <?php if($_GET[module]=="siswa") { echo "class='active'";}   ?>> <a href="dashboard.php?module=siswa">
								Santri
							</a> </li>
							 
							
						<li <?php if($_GET[module]=="tahunajaran") { echo "class='active'";}   ?>> <a href="dashboard.php?module=tahunajaran">
								Tahun Ajaran
							</a> </li> 
							
							<li <?php if($_GET[module]=="mapel") { echo "class='active'";}   ?>> <a href="dashboard.php?module=mapel">
								Mata Pelajaran
							</a> </li>
					   
						
						  <li <?php if($_GET[module]=="ruang") { echo "class='active'";}   ?>> <a href="dashboard.php?module=ruang">
								Ruangan
							</a> </li>
							
					 
							</a> </li>
					</ul>
				</li>
				
				
				 <li <?php if( $_GET[module]=="kalenderakademik" 
							or $_GET[module]=="kelas"  
							or $_GET[module]=="penempatansiswa" 
							or $_GET[module]=="jadwalkelas"
							or $_GET[module]=="jadwalguru" 
							or $_GET[module]=="nilai"  ) { echo "class='active open'";}   ?>>
					<a href=""> <i class="fa fa-sort-alpha-asc"></i> Akademik <i class="fa arrow"></i> </a>
					<ul>
						   
							
							<li <?php if($_GET[module]=="kalenderakademik") { echo "class='active'";}   ?>> <a href="dashboard.php?module=kalenderakademik">
								Kalender Akademik
							</a> </li> 
							
						<li <?php if($_GET[module]=="kelas") { echo "class='active'";}   ?>> <a href="dashboard.php?module=kelas">
								Kelas 
							</a> </li>
						
						<li <?php if($_GET[module]=="penempatansiswa") { echo "class='active'";}   ?>> <a href="dashboard.php?module=penempatansiswa">
								Penempatan Santri
							</a> </li>
						
						
							
						<li <?php if($_GET[module]=="jadwalkelas") { echo "class='active'";}   ?>> <a href="dashboard.php?module=jadwalkelas">
								Jadwal Kelas
							</a> </li>
						<li <?php if($_GET[module]=="jadwalguru") { echo "class='active'";}   ?>> <a href="dashboard.php?module=jadwalguru">
								Jadwal Ustadz
							</a> </li>  
							
						<li <?php if($_GET[module]=="nilai") { echo "class='active'";}   ?>> <a href="dashboard.php?module=nilai">
								Nilai
							</a> </li>  
					</ul>
				</li>
				
				
				<li <?php if($_GET[module]=="lapnilai" 
							or $_GET[module]=="lappembayaran" 
							or $_GET[module]=="lappelanggaran"   ) { echo "class='active open'";}   ?>>
					<a href=""> <i class="fa fa-file"></i> Laporan <i class="fa arrow"></i> </a>
					<ul>
						<li <?php if($_GET[module]=="lapnilai") { echo "class='active'";}   ?>> <a href="dashboard.php?module=lapnilai">
								Lap. Nilai
							</a> </li>
					</ul>
				 
			</ul>
		</nav>
	</div>
   
</aside>
				