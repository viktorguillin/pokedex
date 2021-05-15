<?php

include($_SERVER['DOCUMENT_ROOT'].'/pokedex/config/conexion.php');

$pokemon['id'] = $_POST['id'];
$pokemon['nombre'] = $_POST['nombre'];
$pokemon['tipo'] = $_POST['tipo'];
$pokemon['descripcion'] = $_POST['descripcion'];
$pokemon['imagen'] = basename($_FILES['imagen']['name']);

$carpeta = '../img/';
$archivo = $carpeta . basename($_FILES['imagen']['name']);

if (!move_uploaded_file($_FILES['imagen']['tmp_name'], $archivo)) {
    header('Location: /pokedex/admin/pokemon.php?error=S');
}

if($pokemon['id'] != -1){
    if ($conexion->editPokemon($pokemon)) {
        header('Location: /pokedex/index.php');
    } else {
        header('Location: /pokedex/admin/pokemon.php?error=S');
    }
} else {
    if ($conexion->addPokemon($pokemon)) {
        header('Location: /pokedex/index.php');
    } else {
        header('Location: /pokedex/admin/pokemon.php?error=S');
    }
}
