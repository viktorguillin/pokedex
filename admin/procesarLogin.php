<?php

$usuario=$_POST['usuario'];
$password=$_POST['password'];

if ($usuario == 'admin' && $password == '1234'){
    session_start();
    $_SESSION['usuario'] = $usuario;
    header('Location: /pokedex/index.php');
}
else{
    header('Location: /pokedex/index.php?error_user=S');
}


