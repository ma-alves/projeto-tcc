<?php
require "db.php";
session_start();

$email = $_POST["email"];
$senha = $_POST["senha"];

$stmt = $pdo->prepare('SELECT * FROM pacientes WHERE email = ?');
$stmt->execute([$email]);
$user = $stmt->fetch();
if ($user && password_verify($senha, $user['senha'])) {
  $_SESSION['id_pac'] = $user['id'];
  echo "<script>location.href = ('exibe_pac.php')</script>";
} else {
  echo "<script>alert ('E-mail ou senha incorretos. Tente novamente.')</script>";
  echo "<script>location.href = ('index.php#login')</script>";
}
?>