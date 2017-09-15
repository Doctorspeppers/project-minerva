<?php
    session_start();

    if (!isset($_SESSION["materia"])) {
        $_SESSION["materia"] = $_GET["materia"];
    }

    require "logica/lib.php";

    if (!isset($_GET["acao"])){
        $_GET["acao"] = "variaveis";
    }

    if (!isset($_GET["acao"])){
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta charset="UTF-8">

</head>
<body>
<style>
    body {
        background-image: url("img/fundo.jpg");
        background-size: 125%;
        background-position: center center;
    }

    @font-face {
        font-family: airbus;
        src: url(fontes/airbus.ttf);
    }
</style>

<div class="row" style="border-radius: 30px; margin: 30px auto; background-color:rgba(300, 300, 300, 0.8); width: 850px">
    <h2 align="center" style="color: black;font-size: 56px; font-family: 'airbus'"> <?php echo strtoupper($_SESSION["materia"])?> !</h2>
</div>
<div class="container">
    <div class="row" style="border-radius: 30px; margin: auto; background-color:rgba(50, 50, 50, 0.9);width: 850px">
        <div class="col-md-12">
            <div class="col-md-12" style="color: white">
                <?php
                    rotas($_GET["acao"]);
                ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>