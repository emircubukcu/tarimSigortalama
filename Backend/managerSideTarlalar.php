<?php
session_start();
require('_mysqlbaglan.php');
if ( !isset($_SESSION['kullaniciadi']) ) {
header("Location: index.html");
exit();
}


?>

<html lang="en">

<head>
  <title>Tarlalar</title>
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
      <a class="navbar-brand  text-white " href="managerSideMain.php" rel="tooltip" title="Designed and Coded by Creative Tim" data-placement="bottom">
        Tarım Sigortalama
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon">
        </span>
      </button>
      <div class="collapse navbar-collapse" id="navigation">
        <ul class="navbar-nav navbar-nav-hover mx-auto">
          <li class="nav-item px-3">
            <a href="managerSideTarlalar.php" class="nav-link ps-2 d-flex cursor-pointer align-items-center" id="dropdownMenuPages2" data-bs-toggle="dropdown" aria-expanded="false">
            Tarlalar
            </a>
          </li>

          <li class="nav-item px-3">
            <a href="managerSideReport.php" class="nav-link ps-2 d-flex cursor-pointer align-items-center" id="dropdownMenuBlocks" data-bs-toggle="dropdown" aria-expanded="false">
            Hasar İhbarları
            </a>
          </li>

          <li class="nav-item px-3">
            <a href="managerSideExperts.php" class="nav-link ps-2 d-flex cursor-pointer align-items-center" id="dropdownMenuDocs" data-bs-toggle="dropdown" aria-expanded="false">
            Eksperler
            </a>
          </li>
        </ul>
		<ul class="navbar-nav navbar-nav-hover ms-auto">
          <li class="nav-item my-auto ms-3 ms-lg-0">
            <a href="_logout.php" class="btn btn-sm  bg-gradient-secondary  mb-0 me-1 mt-2 mt-md-0">Çıkış Yap</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->


  <div class="page-header min-vh-45" style="background-image: url('https://images.unsplash.com/photo-1630752708689-02c8636b9141?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2490&q=80')">
    <span class="mask bg-gradient-dark opacity-6"></span>
    <div class="container">
      <div class="row">
        <div class="col-md-8 mx-auto">
          <div class="text-center">
            <h1 class="text-white">Tarlalar</h1>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="card card-body shadow-xl mx-3 mx-md-4 mt-n6">
    <div class="container">
      <div class="section text-center">
        <div class="card">
          <div class="table-responsive">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tarla Adı</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tarla Boyutu</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Konum</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Ürün</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">SAHİBİ</th>
                  <th></th>
                </tr>
              </thead>
			  
<?php

	$kuladi=$_SESSION['kullaniciadi'];
	include("_mysqlbaglan.php");
	$sql1="SELECT mudurluk_id FROM genelmudurluk WHERE mudurluk_email='$kuladi'";
	$cevapa = mysqli_query($baglanti, $sql1);
	$gelen2=mysqli_fetch_array($cevapa);
	$mid=$gelen2["mudurluk_id"];
	
	$sql = "SELECT tarla_id,tarla_ad,tarla_boyut,tarla_konum,tarla_urun FROM tarla WHERE mudurluk_id='$mid'";
	$cevap = mysqli_query($baglanti,$sql);
	
	//$sql2 = "SELECT musteri_id FROM tarla WHERE mudurluk_id='$mid'";
	
	$sql2 = "SELECT musteri_ad,musteri_soyad FROM musteri WHERE mudurluk_id='$mid'";
	
	//$cevap = mysqli_query($baglanti,$sql);
	$cevap2 = mysqli_query($baglanti,$sql2);
	if(!$cevap ){
	echo '<br>Hata:'. mysqli_error($baglanti);
	}
	
	while(($gelen=mysqli_fetch_array($cevap)) && ($gelen3=mysqli_fetch_array($cevap2)))
	{
			 
    echo         "<tbody>";
    echo            "<tr>";
    echo              "<td>";
    echo                "<div class='d-flex px-2'>";
    
    echo                  "<div class='my-auto'>";
    echo                    "<h6 class='mb-0 text-xs'>".$gelen['tarla_ad']."</h6>";
    echo                  "</div>";
    echo               " </div>";
    echo             "</td>";
    echo              "<td>";
    echo                "<p class='text-xs font-weight-normal mb-0'>".$gelen['tarla_boyut']." Hektar"."</p>";
    echo              "</td>";
    echo             " <td>";
    echo                "<span class='badge badge-dot me-4'>";
    echo                  "<i class='bg-info'></i>";
    echo                  "<span class='text-dark text-xs'>".$gelen['tarla_konum']."</span>";
    echo                "</span>";
    echo             " </td>";
    echo             " <td class='align-middle text-center'>";
    echo                "<div class='align-items-center'>";
    echo                 " <span class='me-2 text-xs'>".$gelen['tarla_urun']."</span>";
    echo             " </div>";
    echo             "</td>";
    echo              "<td class='align-middle text-center'>";
    echo                "<div class='align-items-center'>";
    echo                  "<span class='me-2 text-xs'>".$gelen3['musteri_ad']." ".$gelen3['musteri_soyad']."</span>";
    echo               " </div>";
    echo             " </td>";
    echo              "<td class='align-middle'>";
    echo                "<a href='managerSideExperts.php?tid=".$gelen['tarla_id']."'"."class='btn btn-primary btn-sm'>";
    echo                  "Görevlendir";
    echo                "</a>";
    echo              "</td>";
    echo              "<td class='align-middle'>";
    echo                "<a href='kayitsilmanager.php?id=".$gelen['tarla_id']."'"."class='btn btn-primary btn-sm'>";
    echo                  "Sil";
    echo                "</a>";
    echo              "</td>";
    echo            "</tr>";
                
        
    echo          "</tbody>";
	}
	//mysqli_close($baglanti);
?>
            </table>
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
</body>

</html>
