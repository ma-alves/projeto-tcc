<?php
session_start();
require "valida_permissao.php";
require "db.php";

$nome = $_POST["nome"];
$crp = $_POST["crp"];
$email = $_POST["email"];
$senha = password_hash($_POST["senha"], PASSWORD_DEFAULT);

$stmt = $pdo->prepare("SELECT email FROM psicologos WHERE email = '$email'");
$stmt->execute();
$linhas = $stmt->rowCount();

if ($linhas == 1) {
  echo "<script>alert ('E-mail já cadastrado. Por favor, utilize um e-mail diferente.')</script>";
  echo "<script>location.href = ('cadastra_psi.php')</script>";
} else {
  $stmt = $pdo->prepare("INSERT INTO psicologos (nome, crp, email, senha, admin)
                        VALUES (?, ?, ?, ?, ?)");
  $stmt->execute([$nome, $crp, $email, $senha, 1]);

  if ($stmt == true) {
    echo "<script>alert ('Cadastro realizado com sucesso!') </script>";
    echo "<script>location.href = ('login_psi.php')</script>";
  } else {
    echo "<script>alert ('Cadastro não realizado. Tente novamente.')</script>";
    echo "<script>location.href = ('cadastra_psi.php')</script>";
  }
}
