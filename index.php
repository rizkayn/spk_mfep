<?php
include'functions.php';
//if(empty($_SESSION[login]))
    //header("location:login.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="description" content="Sistem Pendukung Keputusan(SPK) Metode Multi Factor Evaluation Process (MFEP). Studi kasus: proyek pu."/>
    <meta name="keywords" content="spk, mfep, php, mysql, web, website"/>
    <meta name="author" content="tugas"/>
    <link rel="icon" href="favicon.ico"/>
    <link rel="canonical" href="http://demo.rizka.com/spk-mfep/" />
    
    <title>SPK PEMENANG TENDER PROYEK PU BENGKULU</title>
    <link href="assets/css/flatly-bootstrap.min.css" rel="stylesheet"/>
    <link href="assets/css/general.css" rel="stylesheet"/>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>           
  </head>
  <body style="background: #4682B4;">
<div style="max-width: 1024px; margin: 0 auto; background: white;">
    <img src="assets/images/header3.jpg" style="width: 100%;" />
    <nav class="navbar navbar-default navbar-static-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
         <a class="navbar-brand"  href="?"><span class="glyphicon glyphicon-home"></span>Beranda</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <?php if($_SESSION['login']):?>

            <li class="dropdown">
                <a href="?m=tender" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-file"></span>Tender<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="?m=tender"><span class="glyphicon glyphicon-th"></span>Data Tender</a></li>
                    <li><a href="?m=data_alt"><span class="glyphicon glyphicon-user"></span>Data Alternatif</a></li>
                    <li><a href="?m=ahli"><span class="glyphicon glyphicon-cog"></span>Tenaga Ahli</a></li>
                    <li><a href="?m=pengalaman"><span class="glyphicon glyphicon-road"></span>Pengalaman Tenaga Ahli</a></li>
                </ul>
            </li>

            
            <li class="dropdown">
                <a href="?m=kriteria" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-th-large"></span>Tahap 1|A<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="?m=kriteria"><span class="glyphicon glyphicon-th-list"></span> Kriteria</a></li>
                    <li><a href="?m=crips"><span class="glyphicon glyphicon-star"></span> Nilai Kriteria</a></li>
                    <li><a href="?m=alternatif"><span class="glyphicon glyphicon-list-alt"></span> Nilai Alternatif</a></li>
                    <li><a href="?m=hitung"><span class="glyphicon glyphicon-calendar"></span> Perhitungan</a></li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="?m=kriteria1" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-th-large"></span>Tahap 1|PQ<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="?m=kriteria1"><span class="glyphicon glyphicon-th-list"></span> Kriteria</a></li>
                    <li><a href="?m=crips"><span class="glyphicon glyphicon-star"></span> Nilai Kriteria</a></li>
                    <li><a href="?m=alternatif1"><span class="glyphicon glyphicon-list-alt"></span> Nilai Alternatif</a></li>
                    <li><a href="?m=hitung"><span class="glyphicon glyphicon-calendar"></span> Perhitungan</a></li>
                </ul>
            </li>  

            <li class="dropdown">
                <a href="?m=kriteria" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-th-large"></span>Tahap 2<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="?m=kriteria2"><span class="glyphicon glyphicon-th-list"></span> Kriteria</a></li>
                    <li><a href="?m=crips2"><span class="glyphicon glyphicon-star"></span> Nilai Kriteria</a></li>
                    <li><a href="?m=alternatif2"><span class="glyphicon glyphicon-list-alt"></span> Nilai Alternatif</a></li>
                    <li><a href="?m=hitung2"><span class="glyphicon glyphicon-calendar"></span> Perhitungan</a></li>
                </ul>
            </li>         

            <li class="dropdown">
                <a href="?m=kriteria" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-th-large"></span>Tahap 3<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="?m=kriteria"><span class="glyphicon glyphicon-th-list"></span> Kriteria</a></li>
                    <li><a href="?m=crips"><span class="glyphicon glyphicon-star"></span> Nilai Kriteria</a></li>
                    <li><a href="?m=alternatif"><span class="glyphicon glyphicon-list-alt"></span>Nilai Alternatif</a></li>
                    <li><a href="?m=hitung"><span class="glyphicon glyphicon-calendar"></span> Perhitungan</a></li>
                </ul>
            </li> 

            <li><a href="?m=password"><span class="glyphicon glyphicon-lock"></span>Password</a></li>
            <li><a href="aksi.php?act=logout"><span class="glyphicon glyphicon-log-out">Keluar</span></a></li>
            <?php else:?>
            <li><a href="?m=hitung"><span class="glyphicon glyphicon-calendar"></span> Perhitungan</a></li>                
            <li><a href="?m=login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            <?php endif?>                               
          </ul>          
        </div>
    </nav>

    <div class="container-fluid" style="min-height: 500px;">
    <?php
        if(!$_SESSION['login'] && !in_array($mod, array('', 'home', 'hitung', 'login')))
            $mod = 'login';
            
        if(file_exists($mod.'.php'))
            include $mod.'.php';
        else
            include 'home.php';
    ?>
    </div>
    <footer class="bg-primary">
      <div class="container-fluid">
        <p style="padding: 15px 10px; margin: 0;">Copyright  &copy; <?=date('Y')?> : RYN-G1A014005 | SPK PEMENANG TENDER PROYEK PU BENGKULU</p>
      </div>
    </footer>
</div>
</body>    
</html>