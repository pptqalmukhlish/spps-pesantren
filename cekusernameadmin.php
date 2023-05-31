<?php 

include "../config/koneksi.php";

if (empty($_POST['username'])){
    
}else {
$xxx = trim($_POST['username']);

 
$r = mysql_query("select * from admin where username ='$xxx'");

 
    if (mysql_num_rows($r) > 0) {
        echo http_response_code(404);

    } else {
        echo http_response_code(200);
    }
 

?>