<?php 
$host="localhost";
$kullanici_adi="root";
$parola="";
$vt="yorumal";

$baglanti=mysqli_connect($host, $kullanici_adi, $parola, $vt);
mysqli_set_charset($baglanti, "UTF8");


?>