<?php
include("connect.php");

$data = $conn->query("SELECT * FROM productos")->fetchAll();

foreach ($data as $row)
{
  if ($row["cantidad"] > 0 ){
    echo "<div id='prod_".$row["id_producto"]."' class='producto'>
      <img src='".$row["imagen"]."'>
      <span>
        <p>".$row["nombre"]."</p>
        <h2>".$row["descrip"]."</h2>
        <p>$".$row["precio"]."</p>
      </span>
      <button onclick='carrito_charger(\"".$row['id_producto']."\", \"".$row['nombre']."\", \"".$row['precio']."\");'>comprar</button>
      </div>";
  } else {

  }
}
?>
