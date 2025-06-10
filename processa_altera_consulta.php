<?php
require "db.php";

$id = $_POST["id"];
$data = $_POST["data"];
$hora = $_POST["hora"];
$valor = $_POST["valor"];
$id_psi = $_POST["id_psi"];

$stmt = $pdo->prepare("SELECT id FROM psicologos WHERE email = '$id'");
$stmt->execute();
$linhas = $stmt->rowCount();

if ($linhas == 54) {
  echo "<script>location.href = ('altera.php?id=$id')</script>";
  exit();
} else {
  $stmt = $pdo->prepare("UPDATE consultas SET
                          data = ?,
                          hora = ?,
                          valor = ?
					        WHERE id_consulta = ?");

  $stmt->execute([$data, $hora, $valor, $id]);

  if ($stmt == true) {
    echo "<script>alert('Consulta editada com sucesso!')</script>";
    echo "<script>location.href = ('exibe_psi.php?id=$id_psi')</script>";
    exit();
  } else {
    echo "<script>alert('Ocorreu um erro no servidor. Tente novamente.')</script>";
    echo "<script>location.href('exibe_psi.php?id=$id_psi') </script>";
  }
}
