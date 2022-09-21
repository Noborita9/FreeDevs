<?php
function load_items($items){
  include("../conexion.php");
  $data = $pdo->query("SELECT * FROM " . $items)->fetchAll(PDO::FETCH_ASSOC);
  if (!(json_encode($data) === false)){ 
    $json = json_encode($data); 
  }else { 
    $json = json_encode(["status" => false, "error"=> "There are no elements"]); 
  } 
  echo $json; 
}
?>

