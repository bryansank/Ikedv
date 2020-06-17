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
<link rel="stylesheet" href="css/indexcss.css"/>
<!--Fonts-->
<body>

  <section>
    <nav id="nav">
      <div id="home">
        <a href="#">
          <img id="home-imagotipo" src="img/ikedv.png" alt="logo"/>
        </a>
        <div id="mobile-menu">
          <span><img src="img/menu.svg" alt="mobile-menu"></span>
        </div>
      </div>
      <div id="nav-menu">
        <ul>
          <li><a href="testview" class="button">Volver a Super Administrador.</a></li>
        </ul>
      </div>
    </nav>
  </section>

  <?php
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submitup']) && !empty($_POST['code_input']))
    {
      $functionUpdatePackage = updatePackage($dbconnect,$error, $good);
      echo $functionUpdatePackage;
    }
  ?>

  <<?php
    $id = $_GET['id'];
    $select = "SELECT * FROM package WHERE id_package = $id";
    $result = mysqli_query($dbconnect, $select);
  ?>

<?php
  echo"<section id='form-packages-input'>
    <form id='update-form' action='' method='POST'>
        <h1>Ingrese los datos a Actualizar</h1>";

          while($row = mysqli_fetch_array($result)){
            echo"<div class='form-pi-box'>
          <div class='form-pi-package'>
            <label for='code_input'>
              <span>Introduzca su código de envío:</span>
            </label>";

            echo"<input value='". $row['strCode']."' type='text' class='check-text_input' name='code_input'
            placeholder='Codigo de envio' pattern='[0-9]+' maxlength='10' required />
          </div>";

          echo"<div class='form-pi-package'>
            <label for='actual_input'>
              <span>Introduzca posición actual:</span>
            </label>";

              echo"<input value='". $row['strActual_position']."' type='text' class='check-text_input' name='actual_input'
              placeholder='Posición actual' pattern='[A-Za-z0-9\s]+' maxlength='60' required />
          </div>
        </div>
        <br />";

        echo"<div class='form-pi-box'>
          <div class='form-pi-package'>
            <label for='remaining_input'>
              <span>Introduzca puntos faltantes:</span>
            </label>";

            echo"<input value='". $row['intRemaining_point']."' type='text' class='check-text_input' name='remaining_input'
              placeholder='Puntos faltantes' pattern='[0-9]+' maxlength='11' required />
          </div>
          <div class='form-pi-package'>
            <label for='place_input'>
              <span>Introduzca lugar de entrega:</span>
            </label>";

              echo"<input value='". $row['strPlace_delivery']."' type='text' class='check-text_input' name='place_input'
              placeholder='Lugar de entrega' pattern='[A-Za-z0-9\s]+' maxlength='60' required/>
          </div>
        </div>
        <br />";

        echo"<div class='form-pi-box'>
          <div class='form-pi-package'>
            <label for='receiver_input'>
              <span>Introduzca retirador:</span>
            </label>";

              echo"<input value='". $row['strReceiver']."' type='text' class='check-text_input' name='receiver_input'
              placeholder='Retirador' pattern='[A-Za-z0-9\s]+' maxlength='60' required />
          </div>
            <div class='form-pi-package'>
              <label for='passport_input'>
               <span>Introduzca Pasaporte:</span>
              </label>";

               echo"<input value='". $row['strPassport']."' type='text' class='check-text_package' name='passport_input'
               placeholder='Pasaporte' pattern='[0-9]+' maxlength='10' required />
            </div>
        </div>
        <br />";

        echo"<div class='form-pi-box'>
          <div class='form-pi-package'>
            <label for='price_input'>
              <span>Introduzca precio:</span>
            </label>";
    
        echo"<input value='". $row['flPrice']."' step='0.01' type='number' class='check-text_package' name='price_input'
          placeholder='Precio' required />
          
            <div class='form-pi-package'>
              <label for='state_input'>
                <span>Introduzca Estado del paquete:</span>
              </label>";

			  echo"  <select name='state_input' class='check-text_package'>
                <option value='".$row['intState']."'>"; if($row['intState'] == 0){echo "Entregado";}else{echo "No entregado";}echo"</option>
                <option value='0'>Entregado</option>
                <option value='1'>No entregado</option>
              </select>
            </div>
        </div>
        <input type='hidden' name='id_input' value='".$id."'/>";
          }

          echo"<div class='form-pi-box'>
            <input id='form-pi-button' type='submit' name='submitup' value='Actualizar' for='update-form' />
          </div>

    </form>
  </section>";
  ?>

  <?php include("snipescodes/footer.php"); ?>
</body>
</html>
