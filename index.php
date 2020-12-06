<?php
  //error_reporting(0);
  include("connection.php");
  include("functions.php");
  $dbconnect = mysqli_connect($host,$user,$pass,$dbs);
?>
<!--Connection metaData -->
<html lang="es" dir="ltr">
<?php include("snipescodes/metadata.php"); ?>
<!--Fonts-->
<link rel="stylesheet" href="css/indexcss.css?n=1"/>
<!--Fonts-->
<!--JAVASCRIPT-->
<script type="text/javascript" src="js/functions.js?n=1"></script>
<!--JAVASCRIPT-->
<body>

  <?php include("snipescodes/nav.php");?>
  <?php include("snipescodes/exchanges.php");?>

  <?php

    $packagesFunct = readClient($dbconnect);

    if($_SERVER['REQUEST_METHOD'] == 'POST' && $_SESSION['boolvar'] == "1"){
      echo "
            <br/><br/><div class='container'>
              <table class='table table-dark table-striped table-bordered'>
                <thead>";
        ///////////////TABLE BODY ///////////////
				    foreach($packagesFunct as $row){
                    echo"<tr>";
                      echo"<th>Código:</th>";
                      echo"<th align='center'>". $row['strCode'] ."</th>";
                    echo"</tr>";
                    echo"<tr>";
                      echo"<th>Posición Actual:</th>";
                      echo"<th align='center'>". $row['strPosition'] ."</th>";
                    echo"</tr>";
                    echo"<tr>";
                      echo"<th>Compañia Responsable:</th>";
                      echo"<th align='center'>". $row['strCompany'] ."</th>";
                    echo"</tr>";
                    echo"<tr>";
                      echo"<th>Telefono Compañia:</th>";
                      echo"<th align='center'>". $row['strPhoneCompany'] ."</th>";
                    echo"</tr>";
                    echo"<tr>";
                      echo"<th>Lugar de Entrega:</th>";
                      echo"<th align='center'>". $row['strDeliveryPlace'] ."</th>";
                    echo"</tr>";
                    echo"<tr>";
                      echo"<th>Destinario:</th>";
                      echo"<th align='center'>". $row['strReceiver'] ."</th>";
                    echo"</tr>";
                    echo"<tr>";
                      echo"<th>Pasaporte:</th>";
                      echo"<th align='center'>". $row['strPassport'] ."$" ."</th>";
                    echo"</tr>";
                    echo"<tr>";
                      echo"<th>Estado:</th>";
                      if($row['intState'] == 0){
                        echo"<th align='center'>Entregado</th>";
                      }else{
                        echo"<th align='center'>No entregado</th>";
                      }
                    echo"</tr>";
            }
        ///////////////END TABLE BODY ///////////////
                echo"</thead>
              </table>
            </div>";
            session_unset();
      }
      session_unset();

  ?>

  <section id="cards">
    <div class="card">
      <div class="head-card">
        <!--IMG-->
        <img src="img/card1.png" alt="card1">
      </div>
      <div class="body-card">
        <center>
          <h2>Calcula Peso-Volumen</h2>
          <!-- JAVASCRIPT-->
          <form action="" id="form-boxDimen">
            <input type="number" name="widthContent" id="widthContent" placeholder="Ancho (cm)" class="check-text_input" step="any" maxlength="4" required /><br />
            <input type="number" name="longContent" id="longContent" placeholder="Largo (cm)" class="check-text_input" step="any" maxlength="4" required /><br />
            <input type="number" name="depthContent" id="depthContent" placeholder="Profundidad (cm)" class="check-text_input" step="any" maxlength="4" required /><br />
            <div class="button-card">
              <button type="button" onclick="getData();">Calcular</button>
              <span id="result"></span>
            </div>
          </form>
        </center>
      </div>
    </div>
    <div class="card">
      <div class="head-card-exchangeHouse">
        <!--IMG-->
        <img src="img/ikedv.png" alt="card1">
      </div>
      <div class="body-card-exchangeHouse">
        <h2>¿Quienes somos?</h2>
        <span>
          Ikedv transporta tu paquete a su
          destino con la mayor seguridad y
          al mejor precio del mercado.
        </span>
        <div class="button-card">
          <a href="contact.php">
            Más informacion...
          </a>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="head-card-shipments">
        <!--IMG-->
        <img src="img/card2.jpg" alt="card1">
      </div>
      <div class="body-card-shipments">
        <h2>Documentos necesarios.</h2>
        <span>
          Estos documentos seran obligatorios al enviar un paquete con nuestros servicios.
        </span>
        <div class="button-card">
          <a href="document.php">
            Ir al documento.
          </a>
        </div>
      </div>
    </div>
  </section>

  <section id="checkCode">
    <form id="check-form" action="" method="POST">
        <div id="check-box-img">
          <img src="img/box.svg" alt="box.svg">
        </div>
        <label for="check-text">
          <h1>Introduzca su código de envío</h1>
        </label>
        <input type="text" id="check-text" name="checkcode"
        placeholder="Codigo de envio"
        pattern="[0-9]+"
        maxlength="11" required />
        <br>
      <div id="check-button">
        <input type="submit" name="submitCheckCode" value="Enviar" />
      </div>
    </form>

  </section>

  <?php include("snipescodes/footer.php"); ?>
</body>
</html>
