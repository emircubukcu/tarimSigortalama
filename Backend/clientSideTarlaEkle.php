<?php
session_start();
require('_mysqlbaglan.php');
if ( !isset($_SESSION['kullaniciadi']) ) {
header("Location: index.html");
exit();
}

extract($_POST);

$kuladi=$_SESSION['kullaniciadi'];

$sql1="SELECT musteri_id FROM musteri WHERE musteri_email='$kuladi'";
$cevapa = mysqli_query($baglanti, $sql1);
$gelen=mysqli_fetch_array($cevapa);
$mid=$gelen["musteri_id"];

//if(!$cevapa){
//echo '<br>Hata:' . mysqli_error($baglanti);
//}

$sql="INSERT INTO `tarla` (tarla_ad,tarla_boyut,tarla_konum,tarla_urun,tarla_rapor,tarla_prim,musteri_id,mudurluk_id)";
$sql = $sql . "VALUES ('$ad',$boyut,'$konum','$urun','boss',125,$mid,1)";
$cevap = mysqli_query($baglanti, $sql);

//if(!$cevap){
//echo '<br>Hata:' . mysqli_error($baglanti);
//}
//baglantı kapama suan yok denemedim.
mysqli_close($baglanti);
?>

<!--<!doctype html>-->
<html lang="en">

<head>
  <title>Tarlalarım</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- Material Kit CSS -->
  <link href="./assets/css/material-kit.css?v=3.0.0" rel="stylesheet" />
</head>

<body>
  <!-- Navbar Transparent -->
  <nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3 navbar-transparent">
    <div class="container">
      <a class="navbar-brand  text-white " href="clientSideMain.php" rel="tooltip" title="Designed and Coded by Creative Tim" data-placement="bottom">
        Tarım Sigortalama
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon">
        </span>
      </button>
      <div class="collapse navbar-collapse" id="navigation">
        <ul class="navbar-nav navbar-nav-hover mx-auto">
          <li class="nav-item px-3">
            <a href="clientSideTarlalar.php" class="nav-link ps-2 d-flex cursor-pointer align-items-center" id="dropdownMenuPages2" data-bs-toggle="dropdown" aria-expanded="false">
            Tarlalarım 
            </a>
          </li>

          <li class="nav-item px-3">
            <a href="clientSideReport.php" class="nav-link ps-2 d-flex cursor-pointer align-items-center" id="dropdownMenuDocs" data-bs-toggle="dropdown" aria-expanded="false">
            Hasar İhbarı
            </a>
          </li>
          <li class="nav-item px-3">
            <a href="clientUserSettings.php" class="nav-link ps-2 d-flex cursor-pointer align-items-center" id="dropdownMenuDocs" data-bs-toggle="dropdown" aria-expanded="false">
            Kullanıcı Bilgileri
            </a>
          </li>
          
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->


  <div class="page-header min-vh-45" style="background-image: url('https://3.bp.blogspot.com/-YJHnBG2IzWY/VqyQfLYya6I/AAAAAAABE98/O5jVPj6ygGk/s1600/tractor_field_arable_land_agriculture_14560_3840x2400.jpg');">
    <span class="mask bg-gradient-dark opacity-6"></span>
    <div class="container">
      <div class="row">
        <div class="col-md-8 mx-auto">
          <div class="text-center">
            <h1 class="text-white">Tarla Sigortalama Formu</h1>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="card card-body shadow-xl mx-3 mx-md-4 mt-n6">
    <div class="container">
      <div class="section text-center">
        <div class="card">
          <form action="<?php $_PHP_SELF ?>" method="POST" role="form" class="text-start">
            <div class="input-group input-group-outline my-3">
              <label class="form-label">Tarla Adı</label>
              <input type="text" name="ad" class="form-control">
            </div>
            <div class="input-group input-group-outline my-3">
              <label class="form-label">Tarla Boyutu</label>
              <input type="text" name="boyut" class="form-control">
            </div>
            <div class="input-group input-group-outline my-3">
              <label class="form-label">Konumu</label>
              <input type="text" name="konum" class="form-control">
            </div>
            <div class="input-group input-group-outline my-3">
              <label class="form-label">Tarla Urunu</label>
              <input type="text" name="urun" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary btn-lg">Sigortala</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  
  <footer class="footer pt-5 mt-5">
    <div class="container">
      <div class=" row">
        <div class="col-md-3 mb-4 ms-auto">
          <div>
            <h6 class="font-weight-bolder mb-4">Tarım Sigortalama</h6>
          </div>
        </div>
        <div class="col-md-2 col-sm-6 col-6 mb-4">
          <div>
            <h6 class="text-sm">Company</h6>
            <ul class="flex-column ms-n3 nav">
              <li class="nav-item">
                <a class="nav-link" href="https://www.creative-tim.com/presentation" target="_blank">
                  Hakkımızda
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="https://www.creative-tim.com/blog" target="_blank">
                  Blog
                </a>
              </li>
            </ul>
          </div>
        </div>
        
        <div class="col-md-2 col-sm-6 col-6 mb-4">
          <div>
            <h6 class="text-sm">Yardım ve Destek</h6>
            <ul class="flex-column ms-n3 nav">
              <li class="nav-item">
                <a class="nav-link" href="https://www.creative-tim.com/contact-us" target="_blank">
                  İletişim
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="https://www.creative-tim.com/knowledge-center" target="_blank">
                  Bilgi Merkezi
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!--  Plugin for Parallax, full documentation here: https://github.com/wagerfield/parallax  -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTTfWur0PDbZWPr7Pmq8K3jiDp0_xUziI"></script>
  <script src="./assets/js/material-kit.min.js?v=3.0.2" type="text/javascript"></script>
</body>

</html>
