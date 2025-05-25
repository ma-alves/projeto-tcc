<?php
session_start();
require "db.php";
require "valida_permissao.php";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/styles/layout.css">
    <title>Cautria Santos</title>
</head>

<body>
    <form method="post" action="processa_adiciona_consulta.php">
        <p>Data: </p>
        <p><input type="date" name="data" required></p>

        <p>Hora: </p>
        <p><input type="time" name="hora" required></p>

        <p>Valor: </p>
        <p><input type="number" name="valor" value="90" required></p>

        <p><input type="submit" value="Adicionar"></p>
    </form>
</body>

</html>