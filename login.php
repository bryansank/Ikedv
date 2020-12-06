<!--Connection metaData -->
<html lang="en" dir="ltr">
<?php include("snipescodes/metadata.php"); ?>
<!--Fonts-->
<link rel="stylesheet" href="css/logincss.css"/>
<!--Fonts-->

<body>

  <?php include("snipescodes/nav.php"); ?>

  <section id="form-sec">
    <div id="login-box">
      <div id="login-img">
        <img src="img/ikedv.png">
      </div>
      <h1>Iniciar sesión</h1>
      <form id="login-form" action="snipescodes/checklogin.php" method="POST">
          <label for="name"><p>Usuario:</p></label>
          <input type="text" name="name" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2, 3}$"
          maxlength="30" placeholder="Introduzca su usuario.">
          <label for="password"><p>Contraseña:</p></label>
          <input type="password" name="password" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2, 3}$"
          maxlength="30" placeholder="Introduzca su contraseña">
          <input id="login-button-go" type="submit" name="login" value="Login">
          <!--<a href="#" class="login-input-go">¿Olvido su contraseña?</a><br>-->
          <!--<a href="#" class="login-input-go">¿No tienes cuenta?</a>-->
      </form>
    </div>
  </section>

  <?php include("snipescodes/footer.php"); ?>

</body>
</html>
