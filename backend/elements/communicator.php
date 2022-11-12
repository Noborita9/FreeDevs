<?php

$database = "gestornomia";
include('./evento.php');
include('./unidad.php');
include('./evento.php');
include('./orden_prod.php');
include('./ingrediente.php');
include('./ficha_tecnica.php');

function delete_by_id($element){
    return 
        "DELETE FROM " . $element->database_table .
        " WHERE id=" . $element->id;
}

function delete_by_custom_id($element, $custom_id){
    return 
        "DELETE FROM " . $element->database_table .
        " WHERE " . $custom_id . "=" . $element->id;
}

function simple_insert($element){
    $fields = [];
    $values = [];
    foreach ($element->return_as_array as $field => $value) {
        array_push($fields, $field);
        array_push($values, $value);
    }
    return 
        "INSERT INTO " . $database .
        " (" . join(',', $fields) . ")" . 
        "VALUES (" . join(',', $values) . ")";



}
