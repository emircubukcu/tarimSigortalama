<?php
session_start();
require('_mysqlbaglan.php');
if ( !isset($_SESSION['kullaniciadi']) ) {
header("Location: index.html");
exit();
}

include("_mysqlbaglan.php");


echo $_GET['web'];
$webdeg=$_GET['web'];
$degis=$_GET['id'];

echo $webdeg;
echo $degis;

//$sql ="UPDATE tarla ".
//"SET
//eksper_id=$degis".
//"WHERE tarla_id=$webdeg";



$cevap = mysqli_query($baglanti,$sql);

$sql2 ="UPDATE eksper ".
"SET
eksper_durum='Dolu'".
"WHERE eksper_id=".$_GET['id'];

$cevap2 = mysqli_query($baglanti,$sql2);


//if(!$cevap2 ){
//echo '<br>Hata:' . mysqli_error($baglanti);
//}

header('Location: managerSideExperts.php');

//mysqli_close($baglanti);

?>