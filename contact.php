<?php
  //error_reporting(0);
  include("connection.php");
  include("functions.php");
  include("snipescodes/fallosalvo.php");
  $error;
  $good;
  $dbconnect = mysqli_connect($host,$user,$pass,$dbs);
?>
<!--Connection metaData -->
<html lang="en" dir="ltr">
<?php include("snipescodes/metadata.php"); ?>
<!--Fonts-->
<link rel="stylesheet" href="css/indexcss.css?n=1"/>
<!--Fonts-->
<body id="bodyMilk">

  <?php include("snipescodes/nav.php");?>
  <?php include("snipescodes/exchanges.php");?>

  <?php
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submitComment']) && !empty($_POST['email']))
    {
      $functionComment = insertComment($dbconnect,$error, $good);
      echo $functionComment;
    }
  ?>

  <?php include("snipescodes/contact-card.php"); ?> 

  <section id="contact">
    <h1>Contáctanos</h1>
    <div id="form-contact">
      <form id="form-contact-input" action="" method="post">
        <br /><!---->
        <div class="form-pi">
          <label for="name_last">
            <span>Nombre y Apellido:</span>
          </label>
          <input type="text" class="check-text_input" name="name_last"
          placeholder="Nombre y Apellido" pattern="[A-Za-z0-9\s]+" maxlength="100" required />
        </div>
        <div class="form-pi">
          <label for="email">
            <span>Correo electrónico:</span>
          </label>
          <input type="email" class="check-text_input" name="email"
          placeholder="ejemplo@ej.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" maxlength="100" required />
        </div>
        <div class="form-pi">
          <label for="contry">
            <span>Introduzca su Pais:</span>
          </label>
           <select name="contry" class="check-text_input">
             <option value="0">Venezuela</option>
             <option value="1">Colombia</option>
             <option value="2">Peru</option>
             <option value="3">USA</option>
           </select>
         </div>
        <div class="form-pi">
         <label for="need">
           <span>Introduzca su Necesidad:</span>
         </label>
          <select name="need" class="check-text_input">
            <option value="0">Soporte</option>
            <option value="1">Casa de Cambio</option>
            <option value="2">Encomienda</option>
          </select>
        </div>
        <div class="form-pi">
          <label for="comment">
            <span>Requerimiento/Solicitud:</span>
          </label>
          <input type="text" class="check-text_input" name="comment"
          placeholder="Comentario o Solicitud hacia IkedV" pattern="[A-Za-z0-9\s]+" maxlength="400" required />
        </div>
        <div id="button-form-contact">
          <input id="form-pi-button" type="submit" class="button-contact" name="submitComment" value="Enviar" for="form-contact-input">
        </div>
      </form>
    </div>
    <br>
  </section>

  <?php //include("snipescodes/social.php"); ?>

  <?php include("snipescodes/footer.php"); ?>
</body>
</html>
