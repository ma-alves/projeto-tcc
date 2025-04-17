<?php
session_start();
$env = parse_ini_file('.env');
$senha_db = $env["SENHA_DB"];
$db = $env["DB"];

$conectar = mysqli_connect("localhost", "root", $senha_db, $db);

$login = $_POST["email_pac"];
$senha = $_POST["senha_pac"];

$sql_consulta = "SELECT cod_pac, nome_pac, senha_pac
					 FROM pacientes
					 WHERE 
					       email_pac = '$login' 
					 AND 
					       senha_pac = '$senha'";

$resultado_consulta = mysqli_query($conectar, $sql_consulta);

$linhas = mysqli_num_rows($resultado_consulta);

if ($linhas == 1) {
    $registro = mysqli_fetch_row($resultado_consulta);
    $_SESSION["cod_pac"] = $registro[0];
    $_SESSION["nome_pac"] = $registro[1];

    echo "<script>location.href = ('administracao.php')</script>"; %alterar
} else {
    echo "<script>alert ('E-mail ou senha incorretos. Tente novamente.')</script>";
    echo "<script>location.href = ('index.php')</script>";
}
