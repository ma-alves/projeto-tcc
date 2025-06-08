<?php
session_start();
require "db.php";

$psi = $_SESSION["id_psi"];
$input_date1 = $_POST['data1'];
$input_date2 = $_POST['data2'];
$input_date3 = $_POST['data3'];
$input_date4 = $_POST['data4'];
$data1 = date("Y-m-d H:i:s", strtotime($input_date1));
$data2 = date("Y-m-d H:i:s", strtotime($input_date2));
$data3 = date("Y-m-d H:i:s", strtotime($input_date3));
$data4 = date("Y-m-d H:i:s", strtotime($input_date4));
$hora = $_POST["hora"];
$valor = $_POST["valor"];
$id_pacote = uniqid();

$stmt = $pdo->prepare(
    "INSERT INTO consultas (psicologos_id, data, hora, valor, id_pacote)
    VALUES (?,?,?,?,?)"
);
$stmt->execute([$psi, $data1, $hora, $valor, $id_pacote]);
$stmt = $pdo->prepare(
    "INSERT INTO consultas (psicologos_id, data, hora, valor, id_pacote)
    VALUES (?,?,?,?,?)"
);
$stmt->execute([$psi, $data2, $hora, $valor, $id_pacote]);
$stmt = $pdo->prepare(
    "INSERT INTO consultas (psicologos_id, data, hora, valor, id_pacote)
    VALUES (?,?,?,?,?)"
);
$stmt->execute([$psi, $data3, $hora, $valor, $id_pacote]);
$stmt = $pdo->prepare(
    "INSERT INTO consultas (psicologos_id, data, hora, valor, id_pacote)
    VALUES (?,?,?,?,?)"
);
$stmt->execute([$psi, $data4, $hora, $valor, $id_pacote]);

if ($stmt == true) {
    echo "<script>alert ('Pacote adicionado com sucesso!') </script>";
    echo "<script>location.href = ('exibe_psi.php?id=$psi')</script>";
} else {
    echo "<script>alert ('Pacote não foi adicionado. Tente novamente.')</script>";
    echo "<script>location.href = ('cria_consulta.php')</script>";
}
