<?php
include($_SERVER['DOCUMENT_ROOT'].'/pokedex/config/conexion.php');

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

$json = file_get_contents('php://input');
$id = json_decode($json)->id;

if($conexion->deletePokemon($id)){
    header("HTTP/1.1 200 OK");
    echo json_encode([
        'ok' => true,
        'message' => 'Se borro el registro correctamente.'
    ]);
} else {
    header("HTTP/1.1 200 OK");
    echo json_encode([
        'ok' => false,
        'message' => 'Error al eliminar registro.'
    ]);
}

?>