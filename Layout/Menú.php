<?php

    function PrintHeader($isRoot = false){

        $directory = ($isRoot) ? "" : "../";

        $header = <<<NEW

        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peliculas</title>

    <link rel="stylesheet" href="{$directory}assets/CSS/style.css">
    <link rel="stylesheet" href="{$directory}assets/CSS/bootstrap/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/597ca9d7c7.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar navbar-dark bg-warning fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand text-dark" href="{$directory}index.php"><h2><strong><i class="fas fa-film h2"></i> MoviesPlus</strong></h2></a>
        </div>
    </nav>
    <main class="container margin-top-9">

NEW;

    echo $header;
    }

    function PrintFooter($isRoot = false){

        $directory = ($isRoot) ? "" : "../";

        $footer = <<<NEW

        </main>         
        <script src="{$directory}assets/JavaScript/bootstrap/bootstrap.min.js"></script>
    </body>
    </html>

NEW;

    echo $footer;
    }
