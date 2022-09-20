<?php

    // connect to the bookdb database
    include('connect.php');

    $id = $_POST['id'];
    $cantidad = 0;

    /*realizo una consulta para obtener la cantidad de productos que hayan en el id que recibi por post*/ 
    $data = $conn->query("SELECT * FROM productos")->fetchAll();
    
    foreach ($data as $row){
        if(strcmp($row['id_producto'], $id)==0){$cantidad = $row['cantidad'];}
    }

    $cantidad = $cantidad - $_POST['cantidad'];
    if ($cantidad < 0 ){
      echo "No queda stock"; 
    }else{
      /*realizo update*/
      $sql = "UPDATE productos SET cantidad=? WHERE id_producto=?";
      $conn->prepare($sql)->execute([$cantidad, $id]);
      echo "UPDATE DATABASE realizado con exito.";
    }
?>
