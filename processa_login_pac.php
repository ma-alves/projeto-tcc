<?php
require "db.php";
session_start();
// $env = parse_ini_file('.env');
// $senha_db = $env["SENHA_DB"];
// $db = $env["DB"];

// $conectar = mysqli_connect("localhost", "root", $senha_db, $db);

$email = $_POST["email_pac"];
$senha = $_POST["senha_pac"];
$stmt = $pdo->prepare('SELECT * FROM pacientes WHERE email = ?');
$stmt->execute([$email]);
$user = $stmt->fetch();
if ($user && password_verify($senha, $user['senha'])) {
  $_SESSION['id_pac'] = $user['id'];
  echo "<script>location.href = ('exibe_pac.php')</script>"; %alterar, botar pra ir pro perfil
} else {
  echo "<script>alert ('E-mail ou senha incorretos. Tente novamente.')</script>";
  echo "<script>location.href = ('index.php')</script>";
}

// $sql_consulta = "SELECT cod_pac, nome_pac, senha_pac
// 					 FROM pacientes
// 					 WHERE 
// 					       email_pac = '$login' 
// 					 AND 
// 					       senha_pac = '$senha'";

// $resultado_consulta = mysqli_query($conectar, $sql_consulta);

// $linhas = mysqli_num_rows($resultado_consulta);

// if ($linhas == 1) {
//     $registro = mysqli_fetch_row($resultado_consulta);
//     $_SESSION["cod_pac"] = $registro[0];
//     $_SESSION["nome_pac"] = $registro[1];

//     echo "<script>location.href = ('exibe_pac.php')</script>"; %alterar, botar pra ir pro perfil
// } else {
//     echo "<script>alert ('E-mail ou senha incorretos. Tente novamente.')</script>";
//     echo "<script>location.href = ('index.php')</script>";
// }
?>