<?php
require "db.php";

$id = $_POST["id"];
$nome = $_POST["nome"];
$telefone = $_POST["telefone"];
$email = $_POST["email"];
$senha = password_hash($_POST["senha"], PASSWORD_DEFAULT);

$stmt = $pdo->prepare("SELECT email FROM pacientes WHERE email = '$email'");
$stmt->execute();
$linhas = $stmt->rowCount();

if ($linhas == 54) {
  echo "<script>location.href = ('altera.php?id=$id')</script>";
  exit();
} else {
  $stmt = $pdo->prepare("UPDATE pacientes SET
                          nome = ?,
                          telefone = ?,
                          email = ?,
                          senha = ?
					                WHERE id = ?");

  $stmt->execute([$nome, $telefone, $email, $senha, $id]);

  if ($stmt == true) {
    echo "<script>alert('Perfil editado com sucesso!')</script>";
    echo "<script>location.href = ('exibe_pac.php?id=$id')</script>";
    exit();
  } else {
    echo "<script>alert ('Ocorreu um erro no servidor. Tente novamente.')</script>";
    echo "<script>location.href('exibe_pac.php?id=$id')</script>";
  }
}
