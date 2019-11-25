<?php
    // Alkalmazás logika:
    include('config.inc.php');
    $uzenet = array();

    // Űrlap ellenőrzés:
    if (isset($_POST['kuld'])) {
        //print_r($_FILES);
        foreach($_FILES as $fajl) {
            if ($fajl['error'] == 4);   // Nem töltött fel fájlt
            elseif (!in_array($fajl['type'], $MEDIATIPUSOK))
                $uzenet[] = " Nem megfelelő típus: " . $fajl['name'];
            elseif ($fajl['error'] == 1   // A fájl túllépi a php.ini -ben megadott maximális méretet
                        or $fajl['error'] == 2   // A fájl túllépi a HTML űrlapban megadott maximális méretet
                        or $fajl['size'] > $MAXMERET)
                $uzenet[] = " Túl nagy állomány: " . $fajl['name'];
            else {
                $vegsohely = $MAPPA.strtolower($fajl['name']);
                if (file_exists($vegsohely))
                    $uzenet[] = " Már létezik: " . $fajl['name'];
                else {
                    move_uploaded_file($fajl['tmp_name'], $vegsohely);
                    $uzenet[] = ' Ok: ' . $fajl['name'];
                }
            }
        }
    }
    // Megjelenítés logika:
?><!doctype html>
<html lang="en">
  <head>
    <title>Magyar Vöröskereszt&mdash; Képek feltöltése</title>
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
        label { display: block; }
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
              <form action="https://www.google.hu/search?hl=en-GB&source=hp&q=" method="get" class="search-top-form">
                <span class="icon fa fa-search"></span>
                <input type="text" name="q" id="s" placeholder="Keresés Google-n...">
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
                <a class="nav-link" href="index.html">Kezdőlap</a>
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
                <a class="nav-link active" href="mediat_feltolt.php">Képek feltöltése</a>
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

    <section class="site-section py-lg" align = "center">
      <h1>Feltöltés a galériába:</h1>
  <?php
      if (!empty($uzenet))
      {
          echo '<ul>';
          foreach($uzenet as $u)
              echo "<li>$u</li>";
          echo '</ul>';
      }
  ?>
      <form action="mediat_feltolt.php" method="post"
                  enctype="multipart/form-data">
          <label>Első:
              <input type="file" name="elso" required>
          </label>
          <label>Második:
              <input type="file" name="masodik">
          </label>
          <label>Harmadik:
              <input type="file" name="harmadik">
          </label>
          <input type="submit" name="kuld">
        </form>
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
                <div class="mb-5">
                  <h3>Választott szervezet weboldala </h3>
                  <a href = "http://voroskereszt.hu"> Link </a>
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
