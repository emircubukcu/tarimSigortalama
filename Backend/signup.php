<!--
=========================================================
* Material Kit 2 - v3.0.2
=========================================================

* Product Page:  https://www.creative-tim.com/product/material-kit 
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Coded by www.creative-tim.com

 =========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!--<!DOCTYPE html>-->
<?php
require ('_mysqlbaglan.php');
if (isset($_POST['username']) && isset($_POST['password'])){
extract($_POST);
$password = hash('sha256', $password);
$sql="INSERT INTO `musteri` (musteri_ad,musteri_soyad,musteri_email,musteri_no,musteri_kullanıcıadi,musteri_sifre,mudurluk_id)";
$sql = $sql . "VALUES ('$username','$soyad','$kullaniciadi',$telno,'$email','$password',1)";
$cevap = mysqli_query($baglanti, $sql);
if ($cevap){
$mesaj = "<h1>Uyarı: Kullanıcı oluşturuldu!</h1>";
}else{
$mesaj = "<h1>Uyarı: Kullanıcı oluşturulamadı!</h1>";
}
}
?>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/favicon.png">
  <title>
    Kayıt Ol
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="./assets/css/material-kit.css?v=3.0.2" rel="stylesheet" />
</head>

<body class="sign-in-basic">
  <!-- Navbar Transparent -->
  <nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3  navbar-transparent ">
    <div class="container">
      <a class="navbar-brand  text-white " href="index.html" rel="tooltip" title="Designed and Coded by Creative Tim" data-placement="bottom">
        Tarım Sigortalama
      </a>
      <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon mt-2">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </span>
      </button>
      <div class="collapse navbar-collapse w-100 pt-3 pb-2 py-lg-0 ms-lg-12 ps-lg-5" id="navigation">
        <ul class="navbar-nav navbar-nav-hover ms-auto">
          <li class="nav-item my-auto ms-3 ms-lg-0">
            <a class="btn btn-sm  bg-gradient-primary  mb-0 me-1 mt-2 mt-md-0">Giriş Yap</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
  <div class="page-header align-items-start min-vh-100" style="background-image: url('https://www.teahub.io/photos/full/216-2160474_agriculture.jpg');" loading="lazy">
    <span class="mask bg-gradient-dark opacity-6"></span>
    <div class="container my-auto">
      <div class="row">
        <div class="col-lg-4 col-md-8 col-12 mx-auto">
          <div class="card z-index-0 fadeIn3 fadeInBottom">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Kayıt Ol</h4>
              </div>
            </div>
            <div class="card-body">
              <form action="<?php $_PHP_SELF ?>" method="POST" role="form" class="text-start">
                <div class="input-group input-group-outline my-3">
                  <label class="form-label">Ad</label>
                  <input type="text" name="username" class="form-control">
                </div>
                <div class="input-group input-group-outline my-3">
                  <label class="form-label">Soyad</label>
                  <input type="text" name="soyad" class="form-control">
                </div>
                <div class="input-group input-group-outline my-3">
                  <label class="form-label">Kullanıcı Adı</label>
                  <input type="text" name="kullaniciadi" class="form-control">
                </div>
                <div class="input-group input-group-outline my-3">
                  <label class="form-label">Telefon</label>
                  <input type="text" name="telno" class="form-control">
                </div>
                <div class="input-group input-group-outline my-3">
                  <label class="form-label">Email</label>
                  <input type="text" name="email" class="form-control">
                </div>
                <div class="input-group input-group-outline mb-3">
                  <label class="form-label">Şifre</label>
                  <input type="password" name="password" class="form-control">
                </div>
                <div class="text-center">
                  <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Kayıt Ol</button>
				  <!--<input type="submit" value="Kayıt Ol"/>-->
				
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="footer position-absolute bottom-2 py-2 w-100">
      <div class="container">
        <div class="row align-items-center justify-content-lg-between">
          
          <div class="col-12 col-md-19">
            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
              <li class="nav-item">
                <a href="https://www.creative-tim.com/presentation" class="nav-link text-white" target="_blank">Hakkımızda</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/presentation" class="nav-link text-white" target="_blank">Yardım ve Destek</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/presentation" class="nav-link text-white" target="_blank">İletişim</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
  </div>
  <!--   Core JS Files   -->
  <script src="./assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="./assets/js/core/bootstrap.min.js" type="text/javascript"></script>
  <script src="./assets/js/plugins/perfect-scrollbar.min.js"></script>
  <!--  Plugin for Parallax, full documentation here: https://github.com/wagerfield/parallax  -->
  <script src="./assets/js/plugins/parallax.min.js"></script>
  <!-- Control Center for Material UI Kit: parallax effects, scripts for the example pages etc -->
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTTfWur0PDbZWPr7Pmq8K3jiDp0_xUziI"></script>
  <script src="./assets/js/material-kit.min.js?v=3.0.2" type="text/javascript"></script>
</body>

</html>
