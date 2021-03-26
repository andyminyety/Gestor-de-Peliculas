<?php

include '../Helpers/Utilities.php';
include 'ServiceSession.php';

session_start();

$Pelis = $_SESSION ['Películas'];

if(isset($_GET['id'])){

    $GeneroId = $_GET['id'];

    $IndexDelete = GetIndexDelete($Pelis,'id',$GeneroId);

    unset($Pelis[$IndexDelete]);

    $_SESSION['Películas']=$Pelis;
}
header("Location: ../index.php");
exit();

?>