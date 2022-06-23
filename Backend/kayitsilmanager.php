<?php
session_start();
require('_mysqlbaglan.php');
if ( !isset($_SESSION['kullaniciadi']) ) {
header("Location: index.html");
exit();
}

include("_mysqlbaglan.php");

$sql = "DELETE FROM tarla WHERE tarla_id=".$_GET['id'];
$cevap = mysqli_query($baglanti,$sql);

if(!$cevap ){
echo '<br>Hata:' . mysqli_error($baglanti);
}

header('Location: managerSideTarlalar.php');

//mysqli_close($baglanti);

?>