<?php
    // Alkalmazás logika:
    include('config.inc.php');

    // adatok összegyűjtése:
    $kepek = array();
    $olvaso = opendir($MAPPA);
    while (($fajl = readdir($olvaso)) !== false) {
        if (is_file($MAPPA.$fajl)) {
            $vege = strtolower(substr($fajl, strlen($fajl)-4));
            if (in_array($vege, $TIPUSOK)) {
                $kepek[$fajl] = filemtime($MAPPA.$fajl);
            }
        }
    }
    closedir($olvaso);

    // Megjelenítés logika:
?><!doctype html>
<html lang="en">
  <head>
    <title>Colorlib Balita &mdash; Minimal Blog Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300, 400,700" rel="stylesheet">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <!-- Theme Style -->
    <link rel="stylesheet" href="css/style.css">

    <style type="text/css">
        div#galeria {margin: 0 auto; width: 620px;}
        div.kep { display: inline-block; }
        div.kep img { width: 200px; }
    </style>
  </head>
  <body>



    <header role="banner">
      <div class="top-bar" style="background:red">
        <div class="container">
          <div class="row">
            <div class="col-9 social">
              <a href="https://twitter.com/mvoroskereszt"><span class="fa fa-twitter"></span></a>
              <a href="https://www.facebook.com/magyarvoroskereszt"><span class="fa fa-facebook"></span></a>
              <a href="https://www.instagram.com/voroskereszt_hunredcross/"><span class="fa fa-instagram"></span></a>
              <a href="https://www.youtube.com/user/HungarianRedCross/"><span class="fa fa-youtube-play"></span></a>
            </div>
            <div class="col-3 search-top">
              <!-- <a href="#"><span class="fa fa-search"></span></a> -->
              <form action="#" class="search-top-form">
                <span class="icon fa fa-search"></span>
                <input type="text" id="s" placeholder="Type keyword to search...">
              </form>
            </div>
          </div>
        </div>
      </div>

      <div class="container logo-wrap">
        <div class="row pt-5">
          <div class="col-12 text-center">
            <a class="absolute-toggle d-block d-md-none" data-toggle="collapse" href="#navbarMenu" role="button" aria-expanded="false" aria-controls="navbarMenu"><span class="burger-lines"></span></a>
            <h1 class="site-logo"><a href="index.html">MAGYAR VÖRÖSKERESZT</a></h1>
          </div>
        </div>
      </div>

      <nav class="navbar navbar-expand-md  navbar-light bg-light">
        <div class="container">


          <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav mx-auto">
              <li class="nav-item">
                <a class="nav-link active" href="index.html">Kezdőlap</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Adományozás</a>
                <div class="dropdown-menu" aria-labelledby="dropdown04">
                  <a class="dropdown-item" href="kampany_tamogat.html">Kampány támogatása</a>
                  <a class="dropdown-item" href="#">Szervezet támogatása</a>
                  <a class="dropdown-item" href="#">Adományvonal</a>
                </div>

              </li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Katasztrófák</a>
                <div class="dropdown-menu" aria-labelledby="dropdown04">
                  <a class="dropdown-item" href="segitseg.html">Miben segíthetünk?</a>
                  <a class="dropdown-item" href="#">Rehabilitáció</a>
                  <a class="dropdown-item" href="#">Katasztrófa-válaszadás</a>
                </div>

              </li>
              <li class="nav-item">
                <a class="nav-link" href="mediat.php">Médiatár</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="mediat_feltolt.php">Képek feltöltése</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.html">Kapcsolat</a>
              </li>
            </ul>

          </div>
        </div
      </nav>
    </header>
    <!-- END header -->

    <section class="site-section py-lg">
      <div id="galeria">
      <h1>Galéria</h1>
      <?php
      arsort($kepek);
      foreach($kepek as $fajl => $datum)
      {
      ?>
          <div class="kep">
              <a href="<?php echo $MAPPA.$fajl ?>">
                  <img src="<?php echo $MAPPA.$fajl ?>">
              </a>
              <p>Név:  <?php echo $fajl; ?></p>
              <p>Dátum:  <?php echo date($DATUMFORMA, $datum); ?></p>
          </div>
      <?php
      }
      ?>
      </div>
    </section>

    <section class="py-5">

    </section>
    <!-- END section -->

    <footer class="site-footer" style="background:red">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-4">
            <h3>A Vöröskereszt Mozgalom</h3>

            <p>1859. Solferino. A háború áldozatainak megkülönböztetés nélküli, intézményes nemzetközi védelme a XIX. század második felében vált megvalósítható és mozgósító programmá. A történelmileg szükségszerű lépést az 1859-ben lezajlott Solferinói csata ösztönözte. Az ütközet, amely az osztrák és az egyesített francia-szárd haderők között zajlott, óriási áldozatokat követelt.</p>
          </div>
          <div class="col-md-6 ml-auto">
            <div class="row">

              <div class="col-md-1"></div>

              <div class="col-md-4">

                <div class="mb-5">
                  <h3>Közösségi oldalak</h3>
                  <ul class="list-unstyled footer-social">
                    <a href="https://twitter.com/mvoroskereszt"><span class="fa fa-twitter"></span></a>
                    <a href="https://www.facebook.com/magyarvoroskereszt"><span class="fa fa-facebook"></span></a>
                    <a href="https://www.instagram.com/voroskereszt_hunredcross/"><span class="fa fa-instagram"></span></a>
                    <a href="https://www.youtube.com/user/HungarianRedCross/"><span class="fa fa-youtube-play"></span></a>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          </div>
        </div>
      </div>
    </footer>
    <!-- END footer -->

    <!-- loader -->
    <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#f4b214"/></svg></div>

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.0.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>


    <script src="js/main.js"></script>
  </body>
</html>
