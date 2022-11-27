<?php
var_dump($_POST);
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
        case 'eventos':
            include("../elements/evento.php");
            $remove_item = new Evento();
            $remove_item->id = $id;
            $remove_item->delete_by_id();
            break;
        case 'productos':
            include("../elements/producto.php");
            $remove_item = new Producto();
            $remove_item->id = $id;
            $remove_item->delete_by_id();
            break;
        case 'insumos':
            include("../elements/ingrediente.php");
            $remove_item = new Ingrediente();
            $remove_item->id = $id;
            $remove_item->delete_by_id();
            break;
        case 'orden_prod':
            include("../elements/orden_prod.php");
            $remove_item = new OrdenProduccion();
            $remove_item->id = $id;
            $remove_item->delete_by_id();
            break;
        case 'usuarios':
            include("../elements/usuario.php");
            $remove_item = new Usuario();
            $remove_item->id = $id;
            $remove_item->delete_by_id();
            break;
        default:
            # code...
            break;
    }
}
