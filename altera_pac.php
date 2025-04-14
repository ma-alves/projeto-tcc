<?php
session_start();
$env = parse_ini_file('.env');
$senha_db = $env["SENHA_DB"];
$db = $env["DB"];
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
    <?php
    $conectar = mysqli_connect("localhost", "root", $senha_db, $db);

    $cod_pac = $_GET["cod_pac"];

    $sql_consulta = "SELECT nome_pac, telefone_pac, email_pac, senha_pac
							 FROM pacientes WHERE cod_pac = '$cod_pac'";

    $resultado_pesquisa = mysqli_query($conectar, $sql_consulta);

    $registro = mysqli_fetch_row($resultado_pesquisa);
    ?>
    <form action="processa_altera_pac.php" method="post">
        <input type="hidden" name="cod_pac" value="<?php echo $cod_pac; ?>">
        <p>
            Nome: <input type="text" name="nome_pac" value="<?php echo "$registro[0]"; ?>" required>
        </p>
        <p>
            Telefone: <input type="text" name="telefone_pac" value="<?php echo "$registro[1]"; ?>" required>
        </p>
        <p>
            Email: <input type="email" name="email_pac" value="<?php echo "$registro[2]"; ?>" required>
        </p>
        <p>
            Senha: <input type="password" name="senha_pac" value="<?php echo "$registro[3]"; ?>" required>
        </p>
        <p>
            <input type="submit" value="Alterar">
        </p>
    </form>
</body>

</html>