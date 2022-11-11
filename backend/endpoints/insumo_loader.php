<?php
include("./get_insumos.php");
foreach ($data as $row) {
  echo "<span><h2>" . $row['nombre'] . "</h2><span class='list_sub_data'><p>" . $row['stock'] . "</p><p>" . $row['unidad'] . "</p></span></span>";
}
