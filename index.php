<?php
include_once('header.php');
include_once('config/funciones.php');
include_once('config/conexion.php');

$nombre = isset($_GET['nombre']) ? $_GET['nombre'] : null;

$pokemones = $conexion->getPokemones('nombre', $nombre);
$no_encontrado = count($pokemones) == 0;

if($no_encontrado){
    $pokemones = $conexion->getPokemones();
}

?>
<div class="input-group rounded m-auto w-50 mt-5">
    <input value="<?=$nombre;?>" id="buscador" type="search" class="form-control rounded" placeholder="Buscar" aria-label="Search"
           aria-describedby="search-addon" />
    <span class="input-group-text border-0" id="search-addon">
    <i class="fas fa-search" onclick="buscar()"></i>
  </span>
</div>

<?php if($no_encontrado){ ?>
    <div class="text-center">
        No se encontro ningun pokemon que incluya <?=$nombre?> en su nombre
    </div>
<?php } ?>

    <div class="d-none text-center" id="error">
        Error al eliminar registro
    </div>


<table class="table table-striped table-hover table-users mt-5 m-auto">
    <thead>
    <tr>

        <th >Imagen</th>
        <th>Tipo</th>
        <th>Numero</th>
        <th class="hidden-phone">Nombre</th>
        <th></th>
        <?php if(isset($_SESSION['usuario'])) { ?>
            <th></th>
            <th></th>
        <?php } ?>
    </tr>
    </thead>

    <tbody>

    <?php foreach ($pokemones as $pokemon)  { ?>
    <tr>
        <td class="img__tabla"><img src="img/<?=$pokemon['imagen'];?>"> </td>
        <td><img src="<?php echo imgSegunTipo($pokemon['tipo']); ?>"</td>
        <td><p><?=$pokemon['id']; ?></p></td>
        <td><p><?=$pokemon['nombre']; ?></p></td>

        <td><a class="btn mini blue-stripe" href="pokemon.php?id=<?=$pokemon['id']?>">Ver</a></td>
        <?php if(isset($_SESSION['usuario'])) { ?>
            <td><a class="btn mini blue-stripe" href="admin/pokemon.php?id=<?=$pokemon['id']?>"><i class="fas fa-pen"></i></a></td>
            <td><button type="button" data-id="<?=$pokemon['id']?>" data-nombre="<?=$pokemon['nombre']?>" data-bs-toggle="modal"  class="btn__borrar btn mini red-stripe"><i class="fas fa-trash"></i></button></td>
        <?php } ?>
    </tr>
    <?php } ?>
    </tbody>

</table>

<?php if(isset($_SESSION['usuario'])) { ?>
    <div class="mx-auto mt-5 text-center">
        <button id="agregar" class="btn btn-primary" type="button">Agregar pokemon</button>
    </div>
<?php } ?>

</body>
</html>


<div class="modal fade" id="modalBorrar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Borrar pokemon</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button id="confirmar_delete" type="button" class="btn btn-primary">Borrar</button>
            </div>
        </div>
    </div>
</div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
    <script src="js/index.js"></script>
<?php
include_once('footer.php');
?>