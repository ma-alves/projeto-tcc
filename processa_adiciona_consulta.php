<?php
session_start();
require "db.php";

$psi = $_SESSION["id_psi"];
$input_date = $_POST['data'];
$data = date("Y-m-d H:i:s", strtotime($input_date));
$hora = $_POST["hora"];
$valor = $_POST["valor"];

$stmt = $pdo->prepare(
    "INSERT INTO consultas (psicologos_id, data, hora, valor)
    VALUES (?,?,?,?)"
);
$stmt->execute([$psi, $data, $hora, $valor]);

if ($stmt == true) {
    echo "<script>alert ('Consulta criada com sucesso!') </script>";
    echo "<script>location.href = ('exibe_psi.php?id=$psi')</script>";
} else {
    echo "<script>alert ('Consulta não foi criada. Tente novamente.')</script>";
    echo "<script>location.href = ('cria_consulta.php')</script>";
}
