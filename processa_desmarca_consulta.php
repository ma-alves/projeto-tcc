<?php
session_start();
require "db.php";

$id_pac = $_SESSION["id_pac"];
$id_consulta = $_GET["id"];

$stmt = $pdo->prepare(
    "UPDATE consultas SET pacientes_id = ? WHERE id_consulta = ?"
);
$stmt->execute([null, $id_consulta]);

if ($stmt == true) {
    echo "<script>alert('Consulta desmarcada com sucesso!')</script>";
    echo "<script>location.href = ('exibe_pac.php?id=$id_pac')</script>";
    exit();
} else {
    echo "<script>alert('Ocorreu um erro no servidor. Tente novamente.')</script>";
    echo "<script>location.href('exibe_pac.php?id=$id_pac')</script>";
}
