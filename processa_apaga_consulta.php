<?php
session_start();
require "db.php";

$id = $_GET["id"];
$id_psi = $_SESSION["id_psi"];

$stmt = $pdo->prepare("DELETE FROM consultas WHERE id_consulta = '$id'");
$stmt->execute();

if ($stmt->rowCount() > 0) {
    echo "<script>alert('Consulta deletada com sucesso!')</script>";
} else {
    echo "<script>alert('Ocorreu um erro, tente novamente.')</script>";
}
echo "<script>location.href = ('exibe_psi.php?id=$id_psi')</script>";
