<?php
require "db.php";

$id_pac = $_POST["id_pac"];
$id_consulta = $_POST["id_consulta"];

$stmt = $pdo->prepare(
    "UPDATE consultas SET pacientes_id = ? WHERE id_consulta = ?"
);
$stmt->execute([$id_pac, $id_consulta]);

if ($stmt == true) {
    echo "<script>alert('Consulta agendada com sucesso!')</script>";
    echo "<script>location.href = ('exibe_pac.php?id=$id_pac')</script>";
    exit();
} else {
    echo "<script>alert ('Ocorreu um erro no servidor. Tente novamente.')</script>";
    echo "<script>location.href('agenda_consulta.php')</script>";
}
