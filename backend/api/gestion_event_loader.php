<?php
  include("./get_insumos.php");
  // Return text here
  foreach ($data as $insumo) {
    echo "<p>".$insumo["nombre"]."</p>";
  }
?>
