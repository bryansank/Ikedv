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