<?php
include_once "config/conexion.php";
session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="StyleSheet" href="http://<?php echo $_SERVER['SERVER_NAME'] . ":" . $_SERVER['SERVER_PORT']; ?>/pokedex/css/header.css" type="text/css">
    <title>TP 4</title>
</head>
<body>
<script src="https://kit.fontawesome.com/8a986d6f92.js" crossorigin="anonymous"></script>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <a class="navbar-brand" href="#"><img class="logo" src="http://<?php echo $_SERVER['SERVER_NAME'] . ":" . $_SERVER['SERVER_PORT']; ?>/pokedex/img/logo.png" alt="logo"> </a>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active btn__buscar" aria-current="page" href="http://<?php echo $_SERVER['SERVER_NAME'] . ":" . $_SERVER['SERVER_PORT']; ?>/pokedex/index.php">Buscar</a>
                    </li>
                </ul>
                <?php if(!isset($_SESSION['usuario'])) { ?>
                <form action="http://<?php echo $_SERVER['SERVER_NAME'] . ":" . $_SERVER['SERVER_PORT']; ?>/pokedex/admin/procesarLogin.php" method="post" class="d-flex">
                    <input required class="form-control me-2" type="text" name="usuario" placeholder="Usuario" aria-label="Search">
                    <input required class="form-control me-2" type="password" name="password" placeholder="Contraseña" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Ingresar</button>
                </form>
                <?php } else { ?>
                    <a href="http://<?php echo $_SERVER['SERVER_NAME'] . ":" . $_SERVER['SERVER_PORT']; ?>/pokedex/admin/logout.php"><button class="btn btn-danger">Cerrar sesion</button></a>
                <?php } ?>
            </div>
            <?php if(isset($_GET['error_user'])) echo "<span>Usuario o password incorrecta</span>" ?>
        </div>
    </nav>

</header>