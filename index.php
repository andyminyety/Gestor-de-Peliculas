<?php
include 'Helpers/Utilities.php';
include 'Peliculas/ServiceSession.php';
include 'Layout/Menú.php';

$Películas = GetList();

if(!empty($Películas)){

    if(isset($_GET['GeneroId'])){

        $Películas = SearchProperty($Películas,'GeneroId',$_GET['GeneroId']);
    }
}
?>

<?php echo PrintHeader(true); ?>

<div class="row">
    <div class="col-md-10">
        <div>
            <div class="col-md-0 margin-center">
                <div class="btn-group">
                    <a class="btn btn-dark"><strong>Filtrar por:</strong></a>
                    <a href="index.php" class="btn btn-warning"><strong>Todos</strong></a>
                    <a href="index.php?GeneroId=1" class="btn btn-warning"><strong>Acción</strong></a>
                    <a href="index.php?GeneroId=2" class="btn btn-warning"><strong>Terror</strong></a>
                    <a href="index.php?GeneroId=3" class="btn btn-warning"><strong>Comedia</strong></a>
                    <a href="index.php?GeneroId=4" class="btn btn-warning"><strong>Suspenso</strong></a>
                    <a href="index.php?GeneroId=5" class="btn btn-warning"><strong>Documentales</strong></a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-2">
        <button type="button" class="btn btn-warning margin-bottom-24" data-bs-toggle="modal" data-bs-target="#Nueva-Pelis-modal">
        <strong>Agregar Película</strong></button>
    </div>
</div>

<div class="row">
    <?php if (count($Películas) == 0) : ?>
        <h2>No hay Películas registradas</h2>

    <?php else : ?>
        <?php foreach ($Películas as $key => $Pelis) : ?>

            <div class="col-md-4">
                <div class="card shadows">
                    <div class="modal-header text-white bg-dark">
                        <h5 class="modal-title h4" id="NuevaPelisLabel">Película</h5>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?= $Pelis['Nombre'] ?></h5>
                        <p class="card-text"><?= $Pelis['Descripción'] ?></p>
                        <h6 class="card-text"><?php echo $Generos[$Pelis["GeneroId"]] ?></h6>
                        <h6 class="text-success margin-right">Activo</h6>
                        <a href="Peliculas/Editar.php?id=<?= $Pelis['id']?>" class="btn btn-warning float-end margin-left-2 margin-top-1">Editar</a>
                        <a href="Peliculas/Eliminar.php?id=<?= $Pelis['id']?>" class="btn btn-dark float-end margin margin-left-1 margin-top-1">Eliminar</a>
                    </div>
                </div>
                <div class="margin-bottom-20"></div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<div class="modal fade" id="Nueva-Pelis-modal" tabindex="-1" aria-labelledby="NuevaPelisLabel" aria-hidden="true">
    <div class="modal-dialog shadows">
        <div class="modal-content margin-top-20">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white" id="NuevaPelisLabel">Agregar Película</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="Peliculas/Agregar.php" method="POST">
                    <div class="mb-3">
                        <label for="Pelis-Nombre" class="form-label">Nombre de la Película</label>
                        <input name="PelisNombre" type="text" class="form-control" id="Pelis-Nombre">

                    </div>
                    <div class="mb-3">
                        <label for="Pelis-Descripcion" class="form-label">Descripción</label>
                        <input name="PelisDescripcion" type="text" class="form-control" id="Pelis-Descripcion">
                    </div>

                    <div class="mb-3">
                        <label for="Pelis-Género" class="form-label">Géneros</label>
                        <select name="GeneroId" class="form-select" id="Pelis-Género">
                            <option value="">Seleccione una opcion</option>
                            <?php foreach ($Generos as $value => $text) : ?>
                                <option value="<?php echo $value; ?>"> <?= $text ?> </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-warning float-end margin-left-1">Guardar</button>
                        <button type="button" class="btn btn-dark float-end margin-left-1" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php echo PrintFooter(true); ?>
