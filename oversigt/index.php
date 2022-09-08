<!DOCTYPE html>
<html lang="da">
  <head>
    <!--Charset-->
    <meta charset="utf-8">

    <!--Viewport-->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--Title-->
    <title>Ønskeportalen</title>

    <!--Favicon-->
    <link rel="icon" type="image/png" href="../gfx/favicon.png">

    <!--Reset css-->
    <link rel="stylesheet" type="text/css" href="../css/reset.css" />

    <!--Google font Niconne-->
    <link href="https://fonts.googleapis.com/css2?family=Niconne&display=swap" rel="stylesheet">

    <!--Google font Roboto Slab-->
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@400;700&display=swap" rel="stylesheet">

    <!--Style css-->
    <link rel="stylesheet" type="text/css" href="../css/style.css" />

    <!--Jquery lib-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!--Fontawesome-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  </head>
  <body>

    <!--Header-->
    <header class="main-header">

      <!--Logo-->
      <div class="logo">
        <a href="?page=oversigt">
          <img src="../gfx/favicon.png" alt="Ønskeportalen logo" />
          <h1>Ønskeportalen</h1>
        </a>
      </div>

      <!--Navigator-->
      <nav class="main-navigator">
        <ul>
          <li><a href="?page=profil">Lasse Schmidt</a></li>
          <li><a href="code/logout.php">Logud</a></li>
          <li id="menu"><span class="fas fa-bars menu-icon"></span></li>
        </ul>
      </nav>
    </header>

    <!--Main-->
    <main class="main-content">

      <!--Menu-->
      <div class="menu">
        <ul>
          <li><a href="?page=oversigt">Oversigt</a></li>
          <li class="hidden"><a href="?page=profil">Min Profil</a></li>
          <li><a href="?page=opretliste">Opret Ønskeliste</a></li>
          <li><a href="?page=delt">Delt Med Mig</a></li>
          <li><a href="?page=om">Om Os</a></li>
          <li><a href="?page=hjealp">Hjælp</a></li>
          <li class="hidden"><a href="code/logout.php">Logud</a></li>
        </ul>
      </div>

      <!--Pager-->
      <div class="pager">
        <?php
          //Pager
          require_once 'code/pager.php';
         ?>
      </div>
    </main>

    <!--Footer-->
    <footer class="main-footer">
      <p class="big-text">Ønskeportalen</p>
      <p class="small-text">Copyright © 2022 Ønskeportalen</p>
      <ul>
        <li><a href="?page=om">Om os</a></li>
        <li><a href="mailto:email@example.com">Kontakt</a></li>
        <li><a href="?page=hjaelp">Hjælp</a></li>
      </ul>
    </footer>

    <!--Menu script-->
    <script src="../js/menu.js"></script>
  </body>
</html>
