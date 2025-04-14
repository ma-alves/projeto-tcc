<?php
session_start();
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
    <form method="post" action="processa_cadastra_pac.php">
        <table>
            <tr>
                <td>
                    <p>Nome: </p>
                </td>
                <td>
                    <p> <input type="text" name="nome_pac" required> </p>
                </td>
            <tr>
                <td>
                    <p>Telefone: </p>
                </td>
                <td>
                    <p> <input type="text" name="telefone_pac" required> </p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>E-mail: </p>
                </td>
                <td>
                    <p> <input type="email" name="email_pac" required> </p>
                </td>
            </tr>
            <tr>
            </tr>
            <td>
                <p>Senha: </p>
            </td>
            <td>
                <p> <input type="password" name="senha_pac" required> </p>
            </td>
            </tr>
            </tr>
            <tr>
                <td colspan="2">
                    <p><input type="submit" value="Cadastrar"></p>
                </td>
            </tr>
        </table>
    </form>
</body>

</html>