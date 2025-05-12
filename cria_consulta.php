<?php
require "db.php";
session_start();
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
    <form method="post" action="processa_cadastra_psi.php">
        <p>Nome: </p>
        <p><input type="text" name="nome" required></p>

        <p>E-mail: </p>
        <p><input type="email" name="email" required></p>

        <p>Senha: </p>
        <p>
            <input type="password" id="senha" name="senha" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                title="A senha deve conter pelo menos um número, uma letra maiúscula, uma letra mínuscula e no mínimo 8 caracteres." required>
        </p>

        <p><input type="submit" value="Cadastrar"></p>
    </form>
</body>

</html>