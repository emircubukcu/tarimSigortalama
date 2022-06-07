<?php
$server = 'localhost';
$user = '385868';
$password = 'yazilim123';
$database = '385868';
$baglanti = mysqli_connect($server,$user,$password,$database);
if (!$baglanti) {
echo "MySQL sunucu ile baglanti kurulamadi! </br>";
echo "HATA: " . mysqli_connect_error();}
else{
echo "Baglanti kuruldu";}
//exit;

?>