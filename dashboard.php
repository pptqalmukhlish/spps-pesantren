<?php
session_start();
error_reporting(0);

include "../config/koneksi.php";
include "../config/fungsi_indotgl.php";
include "../config/fungsi_thumb.php";
include "../config/Pagination.class.php";
include "../config/library.php";
include "../config/fungsi_rupiah.php";



if ($_GET[tahunajaran]== "" or $_SESSION[tahunajaran]==null) {
	 
} else {
	$_SESSION[tahunajaran]=$_GET[tahunajaran];
}
 
 
  $cari = mysql_query("SELECT * FROM profil WHERE id_profil='1'");
  while($r=mysql_fetch_array($cari)){
	  $namaaplikasi = $r['nama_aplikasi'];
		$namaponpes = $r['nama_ponpes'];
		$alamat = $r['alamat']; 
		$notelp = $r['notelp']; 	  
		$logo = $r['logo'];
  }


  
  if($_SESSION['idadmin']!=""){
   
?>


<!doctype html>
<html class="no-js" lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
         <title><?php echo $namaponpes; ?></title>
		 <link rel="shortcut icon" href="../upload/<?php echo $logo; ?>">
		 
		 
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" href="assets/css/vendor.css">
        <link href="assets/css/app-green.css" rel="stylesheet" type="text/css">
		<link href="assets/plugins/parsley/validation.css" rel="stylesheet" type="text/css">
		<link href="assets/plugins/niceselect/css/nice-select.css" rel="stylesheet" type="text/css">
		
	<link rel="stylesheet" href="assets/css/datepicker.css" />
	<link rel="stylesheet" href="assets/css/bootstrap-timepicker.css" />
	<link rel="stylesheet" href="assets/css/daterangepicker.css" />
	<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.css" />
	 
 
	
		
		<style>
	.header {
			//opacity:0.8 !important;
			background-color: #FFF !important;
		}
		
	/*		.header-fixed .header {
			position: static !important; 
		}

		.footer-fixed .footer {
			 position: static !important; 
		} */
		
		label{ 
		margin-top:5px;
		}
		
		.footer {
			font-size:13px;
		}
		
		.sidebar-fixed .sidebar {
			position: static !important;
 		}

		 .sidebar .sidebar-container {
			overflow-x: hidden; 
		 }

		 a:hover {
			 text-decoration:none !important;
		 }
		 .content { 
			 padding: 100px 40px 85px 40px  !important;
		 }
		 
		 
		 
		.pagination {
		  display: inline-block;
		  padding-left: 0;
		  margin: 0px 0;
		  border-radius: 4px;
		}
		
		.pagination > li {
		  display: inline;
		}
		
		.pagination > li > a,
		.pagination > li > span {
		  position: relative;
		  float: left;
		  padding: 6px 12px;
		  margin-left: -1px;
		  line-height: 1.42857143;
		  color: #337ab7;
		  text-decoration: none;
		  background-color: #fff;
		  border: 1px solid #ddd;
		}
		.pagination > li:first-child > a,
		.pagination > li:first-child > span {
		  margin-left: 0;
		  border-top-left-radius: 4px;
		  border-bottom-left-radius: 4px;
		}
		.pagination > li:last-child > a,
		.pagination > li:last-child > span {
		  border-top-right-radius: 4px;
		  border-bottom-right-radius: 4px;
		}
		.pagination > li > a:hover,
		.pagination > li > span:hover,
		.pagination > li > a:focus,
		.pagination > li > span:focus {
		  z-index: 3;
		  color: #23527c;
		  background-color: #eee;
		  border-color: #ddd;
		}
		.pagination > .active > a,
		.pagination > .active > span,
		.pagination > .active > a:hover,
		.pagination > .active > span:hover,
		.pagination > .active > a:focus,
		.pagination > .active > span:focus {
		  z-index: 2;
		  color: #fff;
		  cursor: default;
		  background-color: #337ab7;
		  border-color: #337ab7;
		}
		.pagination > .disabled > span,
		.pagination > .disabled > span:hover,
		.pagination > .disabled > span:focus,
		.pagination > .disabled > a,
		.pagination > .disabled > a:hover,
		.pagination > .disabled > a:focus {
		  color: #777;
		  cursor: not-allowed;
		  background-color: #fff;
		  border-color: #ddd;
		}
		.pagination-lg > li > a,
		.pagination-lg > li > span {
		  padding: 10px 16px;
		  font-size: 18px;
		  line-height: 1.3333333;
		}
		.pagination-lg > li:first-child > a,
		.pagination-lg > li:first-child > span {
		  border-top-left-radius: 6px;
		  border-bottom-left-radius: 6px;
		}
		.pagination-lg > li:last-child > a,
		.pagination-lg > li:last-child > span {
		  border-top-right-radius: 6px;
		  border-bottom-right-radius: 6px;
		}
		.pagination-sm > li > a,
		.pagination-sm > li > span {
		  padding: 5px 10px;
		  font-size: 12px;
		  line-height: 1.5;
		}
		.pagination-sm > li:first-child > a,
		.pagination-sm > li:first-child > span {
		  border-top-left-radius: 3px;
		  border-bottom-left-radius: 3px;
		}
		.pagination-sm > li:last-child > a,
		.pagination-sm > li:last-child > span {
		  border-top-right-radius: 3px;
		  border-bottom-right-radius: 3px;
		}


		th {
			text-transform:uppercase;
			text-align:center;
		}
		
		.card, .form-control {
			font-size:0.9em;
		}
		
		 
		.form-control::-moz-placeholder {
			font-style: normal !important;
			color: #d7dde4;
			 
		}
		
		.input-group .form-control {
			padding-left: 10px;
		}
		 
		
		.sidebar-header .brand {
			 margin-left:0px;
			padding-left: 0px;
			text-align:center;
 
		}
		.brand img{
			 margin-left:-0px; 
 
		}
		
		.table-responsive {
			padding:20px;
			border:none;
		}
		.dataTables_filter, .dataTables_paginate{
			float:right;
		}
		
		</style>
		
		
		
			
<script type="text/javascript" src="../assets/tinymce/js/tinymce/tinymce.min.js"></script>

<script type="text/javascript">
tinymce.init({
 menubar : false,
	  forced_root_block : "", 
    force_br_newlines : true,
    force_p_newlines : false,
    selector: "textarea",
	
    plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste  code"
    ],
    toolbar: " styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link "
	//undo redo | jbimages | code
});
</script>  
		
    </head>

    <body>
        <div class="main-wrapper">
            <div class="app" id="app">
			
			
				
				<header class="header">
                    <div class="header-block header-block-collapse hidden-lg-up"> 
						<button class="collapse-btn" id="sidebar-collapse-btn">
						<i class="fa fa-bars"></i>
						</button> 
					</div>
                    <div class="header-block header-block-search hidden-sm-down">
                               Tahun Ajaran
							   <div class="btn-group">
							 
									 <?php
							
									$caritahunajaran=mysql_query("select * from tahunajaran order by id_tahunajaran desc limit 0,3");
									echo " <select name=tahunajaran id=pilihantahunajaran class='wide' onChange='jsGantiTahun()'  > ";
									while ($data=mysql_fetch_array($caritahunajaran)) {
										if ($data[namatahunajaran]==$_SESSION[tahunajaran]) {
											$selected="selected=selected";
										} else { 
											$selected="";	
										}
										echo "<option value='$data[namatahunajaran]' $selected> $data[namatahunajaran]</option>";
									}
									echo "</select>";
			
									?>
								 
							</div>
                   
                    </div>
                    
                    <div class="header-block header-block-nav">
                        <ul class="nav-profile">
                            <li class="profile dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                     <img src="../upload/foto_pengguna/<?php echo $_SESSION[foto]; ?>" class="img-responsive" width="32px" style="border-radius:4px;"> <span class="name"> &nbsp; 
    			      <?php echo $_SESSION["namalengkap"]; ?>
    			    </span> </a>
                                <div class="dropdown-menu profile-dropdown-menu" aria-labelledby="dropdownMenu1">
                                    <a class="dropdown-item" href="?module=editakun"> <i class="fa fa-user icon"></i> Profile Pengguna </a>
                                     
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="logout.php"> <i class="fa fa-power-off icon"></i> Logout </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </header>
				
				
              
               <?php
			  
				if($_SESSION[hakakses]=="Superadmin"){
					include "menu_superadmin.php";
				} else if($_SESSION[hakakses]=="Administrasi"){
					include "menu_administrasi.php";
				} else if($_SESSION[hakakses]=="Keuangan"){
					include "menu_keuangan.php";
				}
			  
			  ?>
			  
				
                <div class="sidebar-overlay" id="sidebar-overlay"></div>
				
			
			
			<?php include "content.php"; ?>
			
			


			  <footer class="footer">
                    
                    <div class="footer-block author">
                        <ul>
                            <li> Dibuat Oleh : Pesantren Al Mukhlish. Kalidadi. </li>
                            
                        </ul>
                    </div>
                </footer>
               
            </div>
        </div>
      
       
        <script src="assets/js/vendor.js"></script>
        <script src="assets/js/app.js"></script>
		
	
	<?php

		include "delete_confirm.php";
	?>
	
	<script src="assets/js/jquery.maskedinput.js"></script>
	
	
	<script type="text/javascript">
	
	 
	
	jQuery(function($){
		$("#tahunajaran1").mask("9999",{placeholder:""});
		$("#tahunajaran2").mask("9999",{placeholder:""});
	});
   
	function jsGantiTahun(){
		var tahun = document.getElementById("pilihantahunajaran").value; 		
		alert("Tahun Ajaran akan diubah ke tahun "+tahun);
		window.location.href = document.URL+"&tahunajaran="+tahun;
 
	}
	</script>
	
	<script src="assets/plugins/parsley/parsley.min.js"></script>
	<script src="assets/plugins/parsley/messages.id.js"></script>
	
	<script src="assets/plugins/parsley/parsley.remote.js"></script>
	
 
	<script src="assets/plugins/niceselect/js/jquery.nice-select.js"></script>
	
	
	
	<script>
	 
	$("#pilihanKelas").change(function(){
		
        var getValue= $('#pilihanKelas').val();
		 
	  
		 
        if(getValue == 0)
        {
            $("#pilihanMapel").html("<option>-- Pilih Mapel Terlebih Dahulu --</option>"); 
        }
        else
        {
            $.getJSON('getMapel.php',{'id_kelas' : getValue},function(data){
                var showData;
				 showData += "<option value=''> -- Pilih Mapel -- </option>";
				// showData += "<option value='Semua'> Semua Mapel </option>";
                $.each(data,function(index,value){
                    showData += "<option value="+value.id_mapel+">"+value.nama_mapel+"</option>";
                })
                $("#pilihanMapel").html(showData)
            })
        }
    }) ;  
	
	
	
	$("#pilihankelasbayar").change(function(){
		
		
        var getValue= $('#pilihankelasbayar').val();
		 
		 
        if(getValue == 0)
        {
            $("#pilihankomponenbiaya").html("<option>-- Pilih Biaya Pendidikan --</option>"); 
        }
        else
        {
            $.getJSON('getBiaya.php',{'id_kelas' : getValue},function(data){
                var showData;
				 showData += "<option value=''> -- Pilih Biaya Pendidikan -- </option>";
				 
                $.each(data,function(index,value){
                    showData += "<option value="+value.id_biaya+">"+value.nama_biaya+"</option>";
                })
                $("#pilihankomponenbiaya").html(showData)
            })
        }
    }) ;  
	
	
			$(".alert").delay(7000).addClass("in").fadeOut("slow");
			$('#pilihantahunajaran').niceSelect();
			 
	
	
	</script>
	
	
 <script src="assets/js/date-time/bootstrap-datepicker.min.js"></script>
<script src="assets/js/date-time/bootstrap-timepicker.min.js"></script>
<script src="assets/js/date-time/moment.min.js"></script>
<script src="assets/js/date-time/daterangepicker.min.js"></script>
<script src="assets/js/date-time/bootstrap-datetimepicker.min.js"></script>

	
		<link rel="stylesheet" href="http://cdn.datatables.net/responsive/1.0.3/css/dataTables.responsive.css"/>
	<script src="http://cdn.datatables.net/responsive/1.0.3/js/dataTables.responsive.js"></script>
	
	

<script type="text/javascript">
	$('.date-picker').datepicker({
		autoclose: true,
		todayHighlight: true
	})
		//show datepicker when clicking on the icon
			.next().on(ace.click_event, function(){
				$(this).prev().focus();
			});

 
	
	
	 

</script>


	  	
	
<!-- page specific plugin scripts -->
<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/jquery.dataTables.bootstrap.js"></script>

 

<!-- inline scripts related to this page -->
	<script type="text/javascript">
	


			$(function() {
				var oTable1 = $('#sample-table-2').dataTable( {
                    "aaSorting":[[0, "asc"]],
					responsive: true
                });
            })
			
			$(function() {
				var oTable1 = $('#sample-table-1').dataTable( {
                    "aaSorting":[[0, "asc"]],
					responsive: true
                });
				
				$('#sample-table-1').each(function(){
				var datatable = $(this);
				// SEARCH - Add the placeholder for Search and Turn this into in-line form control
				var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
				search_input.attr('placeholder', 'Kata Pencarian');
				search_input.addClass('form-control input-sm');
				// LENGTH - Inline-Form control
				var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
				length_sel.addClass('form-control input-sm');
                datatable.bind('page', function(e){
                    window.console && console.log('pagination event:', e) //this event must be fired whenever you paginate
                });
			});
			
            })
			
			
			
			
		</script>

	
	
    </body>

</html>


<?php

  } else {
 $_SESSION[gagal]    = 'Anda tidak mempunyai hak akses.';
  header('location:index.php');

}
  
  
?>




