<?php
require "db.php";

$id_pac = $_POST["id_pac"];
$id_pacote = $_POST["id_pacotetri"];

$stmt = $pdo->prepare(
    "UPDATE consultas SET pacientes_id = ? WHERE id_pacotetri = ?"
);
$stmt->execute([$id_pac, $id_pacote]);

if ($stmt == true) {
    echo "<script>alert('Pacote contratado com sucesso!')</script>";
    echo "<script>location.href = ('exibe_pac.php?id=$id_pac')</script>";
    exit();
} else {
    echo "<script>alert ('Ocorreu um erro no servidor. Tente novamente.')</script>";
    echo "<script>location.href('agenda_consulta.php')</script>";
}
