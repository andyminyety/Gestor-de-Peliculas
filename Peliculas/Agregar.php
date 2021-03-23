<?php
include '../Helpers/Utilities.php';
include 'ServiceSession.php';

    if(isset($_POST["PelisNombre"]) && isset($_POST["PelisDescripcion"]) && isset($_POST["GeneroId"])){

        $Pelis = ["Nombre"=>$_POST["PelisNombre"],"Descripción"=>$_POST["PelisDescripcion"],"GeneroId"=>$_POST["GeneroId"]];
        Agregar($Pelis);

        header("Location: ../index.php");
    }
?>