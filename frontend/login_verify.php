<?php
session_start();

/*me aseguro que existan los recursos por POST, con esto solo se procesa si se proviene del form configurado para ello*/
if (!empty($_POST["user_name"]) && !empty($_POST["user_pass"]) && isset($_POST["user_name"]) && isset($_POST["user_pass"])) {
  process_login();
} else {
  /*redirecciono a login si es que no se provino con DATA SET via POST desde el*/
  header("Location: ./login.php");
  exit();
}

function process_login()
{
  include("conexion.php");

  /*datos POST*/
  $array_dataset =
    [
      "user" => $_POST["user_name"],
      "pass" => $_POST["user_pass"],
    ];

  /*configuracion consulta*/
  $data = $pdo->query("SELECT * FROM usuarios")->fetchAll();

  /*recorro consulta*/
  $log_validate = false;
  foreach ($data as $row) {
    /*escucho coincidencia en usuario y pass*/
    if (strcmp($row['username'], $array_dataset["user"]) == 0 && strcmp($row['passwd'], $array_dataset["pass"]) == 0) {
      $log_validate = true;
      $_SESSION["rol"] = $row["rol"];
      $_SESSION["username"] = $row["nombre_usuario"];
      $_SESSION["user_id"] = $row["id"];
    }
  }


  if ($log_validate == true) {
    echo "true";
  } else {
    echo "false";
  }


  /*estimo resultado de consulta login*/
};
