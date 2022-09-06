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
        <a href="">
          <img src="gfx/favicon.png" alt="Ønskeportalen logo" />
          <h1>Ønskeportalen</h1>
        </a>
      </div>

      <!--Navigator-->
      <nav class="main-navigator">
        <ul>
          <li id="register">Tilmeld</li>
          <li id="login">Login</li>
        </ul>
      </nav>
    </header>

    <!--Main-->
    <main class="main-content">

      <!--Landingpage-->
      <div class="landingpage">
        <div>
          <h2>Hej og velkommen til Ønskeportalen</h2>
          <h3>Ønskeportalen gør det nemt for dig at gemme og dele ønskerlister med familie og venner.</h3>
        </div>
        <div>
          <img src="gfx/gift.png" alt="Blå gave med rødtbånd" />
        </div>
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
          <p>Email eller Password matcher ikke</p>
        </div>

        <!--Login form-->
        <form onSubmit="return false;">
          <label for="loginemail">Email</label>
          <input type="email" name="loginemail" id="loginemail" required>

          <label for="loginpassword">Password</label>
          <div>
            <input type="password" name="loginpassword" id="loginpassword" class="toggle-password" required>
            <span class="fas fa-eye show-password" title="Vis password"></span>
          </div>

          <input type="submit" value="Login">
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
          <p>Email allerede i brug</p>
        </div>

        <!--Register succes message-->
        <div class="register-succes">
          <p>Bruger oprettet</p>
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

          <input type="submit" value="Opret">

        </form>
      </div>

      <!--Footer-->
      <footer class="main-footer">
        <p class="big-text">Ønskeportalen</p>
        <p class="small-text">Copyright © 2022 Ønskeportalen</p>
        <ul>
          <li><a href="">Om os</a></li>
          <li><a href="mailto:email@example.com">Kontakt</a></li>
          <li><a href="">Hjælp</a></li>
        </ul>
      </footer>
    </main>


    <!--Popup script-->
    <script src="js/popup.js"></script>

    <!--Showpassword script-->
    <script src="js/showpassword_script.js"></script>

    <!--Login script-->
    <script src="js/login_form_script.js"></script>

    <!--Register script-->
    <script src="js/register_form_script.js"></script>
  </body>
</html>
