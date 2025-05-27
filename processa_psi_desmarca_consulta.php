<?php
session_start();
require "db.php";

$id_psi = $_SESSION["id_psi"];
$id_consulta = $_GET["id"];

$stmt = $pdo->prepare(
    "UPDATE consultas SET pacientes_id = ? WHERE id_consulta = ?"
);
$stmt->execute([null, $id_consulta]);

if ($stmt == true) {
    echo "<script>alert('Consulta desmarcada com sucesso!')</script>";
    echo "<script>location.href = ('exibe_psi.php?id=$id_psi')</script>";
    exit();
} else {
    echo "<script>alert('Ocorreu um erro no servidor. Tente novamente.')</script>";
    echo "<script>location.href('exibe_psi.php?id=$id_psi')</script>";
}
