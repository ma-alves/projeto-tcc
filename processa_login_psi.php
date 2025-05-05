<?php
require "db.php";
session_start();

$email = $_POST["email"];
$senha = $_POST["senha"];

$stmt = $pdo->prepare('SELECT * FROM psicologos WHERE email = ?');
$stmt->execute([$email]);
$user = $stmt->fetch();
if ($user && password_verify($senha, $user['senha'])) {
  $_SESSION['id_psi'] = $id = $user['id'];
  $_SESSION['admin'] = true;
  echo "<script>location.href = ('exibe_psi.php?id=$id')</script>";
} else {
  echo "<script>alert ('E-mail ou senha incorretos. Tente novamente.')</script>";
  echo "<script>location.href = ('login_psi.php')</script>";
}
