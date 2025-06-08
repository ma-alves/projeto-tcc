<?php
session_start();
require "valida_permissao.php";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/styles/style.css">
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baskervville&display=swap" rel="stylesheet">
    <title>Cautria Santos - Agendamento de Consultas Psicológicas</title>
</head>

<body>
    <?php include "menu.php"; ?>
    <section id="agendamento" class="agendamento-form">
        <div class="container">
            <h3>Adicionar Consulta</h3>
            <form method="post" action="processa_adiciona_consulta.php">
                <p>Data: </p>
                <p><input type="date" name="data" required></p>

                <p>Hora: </p>
                <p><input type="time" name="hora" required></p>

                <p>Valor: </p>
                <p><input type="number" name="valor" value="90" required></p>

                <p><input type="submit" value="Adicionar"></p>
            </form>
        </div>
    </section>
    <hr>
    <section id="agendamento" class="agendamento-form">
        <div class="container">
            <h3>Adicionar Pacote Mensal</h3>
            <form method="post" action="processa_adiciona_pacote_mensal.php">
                <p>Data: </p>
                <p><input type="date" name="data1" required></p>
                <p><input type="date" name="data2" required></p>
                <p><input type="date" name="data3" required></p>
                <p><input type="date" name="data4" required></p>
                <p>Hora: </p>
                <p><input type="time" name="hora" required></p>
                <p>Valor: </p>
                <p><input type="number" name="valor" value="320" required></p>
                <p><input type="submit" value="Adicionar"></p>
            </form>
        </div>
    </section>
    <?php include "footer.php" ?>
</body>

</html>