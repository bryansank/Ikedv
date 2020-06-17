<?php
  $functionView = litleFunction($dbconnect);
  foreach($functionView as $row){
?>
<div id="prices">
  <div id="cost-prices">

     <div class="price">
       <img src="img/per.png" alt="peru">
       <div>
         <span><?php echo $row['flSol']. "Bs";?></span>
       </div>
     </div>

     <div class="price">
       <img src="img/usa.png" alt="usa">
       <div>
         <span><?php echo $row['flUsd']. "Bs";?></span>
       </div>
     </div>

     <div class="price">
       <img src="img/col.png" alt="col">
       <div>
         <span><?php echo $row['flCop'] . "Bs"; ?></span>
       </div>
     </div>

  </div>

  <div id="date-prices">
    <span>Ultima Actualización: <?php echo $row['create_at']; ?></span>
  </div>

 </div>
 <?php
     }
     session_unset();
 ?>
