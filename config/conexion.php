<?php
include_once $_SERVER['DOCUMENT_ROOT']."/pokedex/config/DatabaseQuerys.php";
$conexion = new DatabaseQuerys("127.0.0.1",
    "3306",
    "pokedex-facundo-rivero",
    "root",
    ""
);