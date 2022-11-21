<?php
if (
    isset($_POST["id"]) &&
    !empty($_POST["id"]) &&
    isset($_POST["item"]) &&
    !empty($_POST["item"])
) {
    remove_item_by_id($_POST["id"], $_POST["item"]);
} else {
    //header("Location: ../../frontend/index.html ");
    exit();
}

function remove_item_by_id($id, $item)
{
    include("../conexion.php");

    switch ($item) {
        case 'unidades':
            include("../elements/unidad.php");
            $remove_item = new Unidad();
            $remove_item->id = $id;
            break;
        case 'eventos':
            include("../elements/evento.php");
            $remove_item = new Evento();
            $remove_item->id = $id;
            break;
        case 'insumos':
            include("../elements/ingrediente.php");
            $remove_item = new Ingrediente();
            $remove_item->id = $id;
            break;
        case 'orden_prod':
            include("../elements/orden_prod.php");
            $remove_item = new OrdenProduccion();
            $remove_item->id = $id;
            break;
        case 'ficha_tecnica':
            include("../elements/ficha_tecnica.php");
            $remove_item = new FichaTecnica();
            $remove_item->id = $id;
            break;
        case 'usuarios':
            include("../elements/usuario.php");
            $remove_item = new Usuario();
            $remove_item->id = $id;
            break;
        case '':
            $remove_item = new Evento();
            $remove_item->id = $id;
            break;
        default:
            # code...
            break;
    }

    $stmt = $pdo->prepare("INSERT INTO :table (nombre, unidad, stock, precio) VALUES(:nombre, :unidad, :stock, :precio)");


    $stmt->execute();
    echo "Producto agregado";
}
