<?php
include_once('header.php');
include_once('config/funciones.php');
include_once('config/conexion.php');

$id = isset($_GET['id']) ? $_GET['id'] : null;

$pokemon = $conexion->getPokemones('id', $id)[0];
?>
    <link rel="StyleSheet" href="css/pokemon.css" type="text/css">

<div class="container">
    <div class="card-deck">
        <div class="card">
            <img class="logo" class="card-img-top" src="img/<?=$pokemon['imagen'];?>" alt="foto">
            <div class="card-body mb-5">
                <h5 class="card-title">Nombre:   <?=$pokemon['nombre']; ?>
                    <img class="img__tabla" alt="Tipo de pokemon" src="<?php echo imgSegunTipo($pokemon['tipo']); ?>"
                </h5>
                <p class="card-text mt-5">Descripcion:   <?=$pokemon['descripcion']; ?></p>
            </div>
        </div>
    </div>
</div>
<?php
include_once('footer.php');
?>