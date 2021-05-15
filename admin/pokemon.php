<?php
include_once('../header.php');
include_once('../config/funciones.php');
include_once('../config/conexion.php');

$pokemon['id'] = isset($_GET['id']) ? $_GET['id'] : -1;
$pokemon['nombre'] = '';
$pokemon['descripcion'] = '';
$pokemon['imagen'] = '';
$pokemon['tipo'] = '';

if ( $pokemon['id'] !== -1){
    $pokemon = $conexion->getPokemones('id', $pokemon['id'])[0];
}
?>
    <link rel="StyleSheet" href="../css/admin_pokemon.css" type="text/css">

<?php if(isset($_GET['error']) ){ ?>
    <div class="text-center">
        Error al grabar pokemon
    </div>
<?php } ?>

<div class="container mt-5">
    <form  enctype="multipart/form-data" action="http://<?php echo $_SERVER['SERVER_NAME'] . ":" . $_SERVER['SERVER_PORT']; ?>/pokedex/admin/procesarPokemon.php" method="post">
        <input type="hidden" name="id" value="<?=$pokemon['id'];?>" >
        <div class="form-group mt-3">
            <label for="nombre">Nombre</label>
            <input required value="<?=$pokemon['nombre'] ?>" type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre pokemon">
        </div>
        <div class="form-group mt-3">
            <label for="tipo">Tipo</label>
            <select required name="tipo" id="tipo" class="form-control form-control-lg">
                <option <?php echo $pokemon['tipo']=='fuego'? "selected": null; ?> value="fuego">Fuego</option>
                <option <?php echo $pokemon['tipo']=='hierba'? "selected": null; ?> value="hierba">Hierba</option>
                <option <?php echo $pokemon['tipo']=='agua'? "selected": null; ?> value="agua">Agua</option>
            </select>
        </div>
        <div class="form-group mt-3">
            <label for="descripcion">Descripcion</label>
            <textarea required class="form-control" id="descripcion" name="descripcion" rows="3"><?=$pokemon['descripcion'] ?></textarea>
        </div>
        <div class="form-group mt-3 d-flex align-items-center pr-3">
            <?php if($pokemon['imagen'] !== '') { ?>
            <img class="foto" class="card-img-top" src="../img/<?=$pokemon['imagen'];?>" alt="foto">
            <?php } ?>
            <div >
                <label for="imagen" class="d-block"><?php echo $pokemon['id'] != 1? 'Cambiar imagen' : 'Seleccionar imagen';  ?></label>
                <input type="file" class="form-control-file" id="imagen" name="imagen">
            </div>
        </div>

        <button type="submit" class="btn btn-primary btn-lg mt-3"><?php echo $pokemon['id'] != 1? 'Editar' : 'Grabar';  ?></button>
    </form>
</div>
<?php
include_once('../footer.php');
?>