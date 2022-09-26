<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="da">
  <head>
    <!--Charset-->
    <meta charset="utf-8">

    <!--Meta description-->
    <meta name="description" content="Alle har ønsker. Og nu har du et sted at gemme dem. Ønskeportalen følger dig overalt og gør det nemt at dele dine ønsker med venner og familie."/>

    <!--Viewport-->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--Title-->
    <title>Ønskeportalen</title>

    <!--Favicon-->
    <link rel="icon" type="image/png" href="gfx/favicon.png">

    <!--Reset css-->
    <link rel="stylesheet" type="text/css" href="css/reset.css" />

    <!--Google font Niconne-->
    <link href="https://fonts.googleapis.com/css2?family=Niconne&display=swap" rel="stylesheet">

    <!--Google font Roboto Slab-->
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@400;700&display=swap" rel="stylesheet">

    <!--Style css-->
    <link rel="stylesheet" type="text/css" href="css/style.css" />

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
        <a href="/">
          <img src="gfx/favicon.png" alt="Ønskeportalen logo" />
          <h1>Ønskeportalen</h1>
        </a>
      </div>
      <?php
      if($_SESSION['loggedin']){
      ?>
      <!--Navigator if logged in-->
      <nav class="main-navigator">
        <ul>
          <li><a href="oversigt/profil"><?php echo $_SESSION['login_name']; ?></a></li>
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
          <li><a href="oversigt/">Oversigt</a></li>
          <li class="hidden"><a href="oversigt/profil">Min Profil</a></li>
          <li><a href="oversigt/opretliste">Opret Ønskeliste</a></li>
          <li><a href="oversigt/delt">Delt Med Mig</a></li>
          <li><a href="om">Om Os</a></li>
          <li><a href="hjaelp">Hjælp</a></li>
          <li class="hidden"><a href="code/logout.php">Logud</a></li>
        </ul>
      </div>
      <?php
      }else{
      ?>
      <!--Navigator not logged in-->
      <nav class="main-navigator">
        <ul>
          <li class="register-btn">Tilmeld</li>
          <li class="login-btn">Login</li>
          <li id="menu"><span class="fas fa-bars menu-icon"></span></li>
        </ul>
      </nav>
    </header>

    <!--Main-->
    <main class="main-content">

      <!--Menu-->
      <div class="menu">
        <ul>
          <li><a href="/">Forside</a></li>
          <li class="register-btn">Tilmeld</li>
          <li class="login-btn">Login</li>
          <li><a href="om">Om Os</a></li>
          <li><a href="hjaelp">Hjælp</a></li>
        </ul>
      </div>
      <?php
      }
      ?>

      <!--Pager-->
      <div class="pager">
        <?php
          //Pager
          require_once 'code/pager.php';
         ?>
      </div>

      <!--Popup-->
      <div class="popup-overlay"></div>

      <!--Login-->
      <div class="login">

        <!--Close popup-->
        <span class="close-popup fas fa-times-circle" title="Luk"></span>

        <!--Headline2-->
        <h2>Login</h2>

        <!--Login error message-->
        <div class="login-error">
          <p id="response-login">Forkert E-Mail eller Password!</p>
        </div>

        <!--Login form-->
        <form id="login-form" onSubmit="return false;">
          <label for="loginemail">Email</label>
          <input type="email" name="loginemail" id="loginemail" required>

          <label for="loginpassword">Password</label>
          <div>
            <input type="password" name="loginpassword" id="loginpassword" class="toggle-password" required>
            <span class="fas fa-eye show-password" title="Vis password"></span>
          </div>

          <input id="login-but" type="submit" value="Login">
        </form>

        <p class="forgot-password">Glemt password?</p>
      </div>

      <!--Register-->
      <div class="register">

        <!--Close popup-->
        <span class="close-popup fas fa-times-circle" title="Luk"></span>

        <!--Headline2-->
        <h2>Tilmelding</h2>

        <!--Register error message-->
        <div class="register-error">
          <p class="errortxt">Email allerede i brug</p>
        </div>

        <!--Register succes message-->
        <div class="register-succes">
          <p class="successtxt">Bruger oprettet</p>
        </div>

        <!--Register form-->
        <form onSubmit="return false;">

          <label for="regname">Navn</label>
          <input type="text" name="regname" id="regname" required>

          <label for="regemail">Email</label>
          <input type="email" name="regemail" id="regemail" required>

          <label for="regpassword">Password</label>
          <div>
            <input type="password" name="regpassword" id="regpassword" class="toggle-password" required>
            <span class="fas fa-eye show-password" title="Vis password"></span>
          </div>

          <label for="regbirthday">Fødselsdag</label>
          <input type="date" name="regbirthday" id="regbirthday" required>

          <input id="reg-but" type="submit" value="Opret">
        </form>
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


    <!--Popup script-->
    <script src="js/popup.js"></script>

    <!--Showpassword script-->
    <script src="js/showpassword_script.js"></script>

    <!--Login script-->
    <script src="js/login_form_script.js"></script>
    <script src="js/login.js"></script>

    <!--Register script-->
    <script src="js/register_form_script.js"></script>
    <script src="js/register.js"></script>

    <!--Menu script-->
    <script src="../js/menu.js"></script>
  </body>
</html>
