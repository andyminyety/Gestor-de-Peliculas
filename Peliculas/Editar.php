<?php

include '../Layout/Menú.php';
include '../Helpers/Utilities.php';
include 'ServiceSession.php';

$Pelis = null;
if (isset($_GET["id"])) {

    $Pelis = GetById($_GET["id"]);

    if(isset($_POST["PelisNombre"]) && isset($_POST["PelisDescripcion"]) && isset($_POST["GeneroId"]) && isset($_POST["Estatus"])){

        $Pelis = ["id"=> $_GET["id"], "Nombre"=>$_POST["PelisNombre"],"Descripción"=>$_POST["PelisDescripcion"],"GeneroId"=>$_POST["GeneroId"],
        "Status"=>$_POST["Estatus"]];
        Editar($Pelis);

        header("Location: ../index.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>
<body>

    <?php echo PrintHeader() ?>

    <?php if ($Pelis == null && count($Pelis) == 0) : ?>
        <h2>No existe esta Pelicula</h2>
    <?php else : ?>

    <div class="modal-dialog shadows">
        <div class="modal-content margin-top-20">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white" id="NuevaPelisLabel">Editar Película</h5>
            </div>

            <div class="modal-body">
                <form action="Editar.php?id=<?= $Pelis["id"]?>" method="POST">
                    <div class="mb-3">
                        <label for="Pelis-Nombre" class="form-label">Nombre de la Pelicula</label>
                        <input name="PelisNombre" value="<?php echo $Pelis["Nombre"]?>" type="text" class="form-control" id="Pelis-Nombre">
                    </div>
                    <div class="mb-3">
                        <label for="Pelis-Descripcion" class="form-label">Descripción</label>
                        <input name="PelisDescripcion" value="<?php echo $Pelis["Descripción"]?>" type="text" class="form-control" id="Pelis-Descripcion">
                    </div>

                    <div class="mb-3">
                        <label for="Pelis-Género" class="form-label">Géneros</label>
                        <select name="GeneroId" class="form-select" id="Pelis-Género">
                    </div>
                        <option value="">Seleccione una opcion</option>
                         <?php foreach ($Generos as $value => $text) : ?>

                        <?php if($value == $Pelis["GeneroId"]):?>
                            <option selected value="<?php echo $value; ?>"> <?= $text ?> </option>
                         <?php else :?>
                            <option value="<?php echo $value; ?>"> <?= $text ?> </option>
                        <?php endif;?>   

                        <?php endforeach; ?>
                        </select>
                    <div class="mb-3"></div>
                    <div class="form-check" style="display: none;">
                        <input name="Estatus" class="form-check-input text-danger" type="checkbox" value="Inactivo" id="flexCheckDefault1" checked>
                        <label class="form-check-label" for="flexCheckDefault1">Inactivo</label>
                    </div>

                    <div class="form-check">
                        <input name="Estatus" class="form-check-input text-success" type="checkbox" value="Activo" id="flexCheckDefault2" checked>
                        <label class="form-check-label" for="flexCheckDefault2">Activo</label>
                    </div> 

                    <button type="submit" class="btn btn-warning float-end margin-left-1">Guardar</button>
                    <a href="../index.php" class="btn btn-dark float-end margin-left-1">Volver atras</a></button>
                </form>
            </div>
        </div>
    </div>

    <?php endif; ?>

    <?php echo PrintFooter() ?>

</body>
</html>