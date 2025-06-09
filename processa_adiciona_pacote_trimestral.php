<?php
session_start();
require "db.php";

$psi = $_SESSION["id_psi"];
$input_date1 = $_POST['data1'];
$input_date2 = $_POST['data2'];
$input_date3 = $_POST['data3'];
$input_date4 = $_POST['data4'];
$input_date5 = $_POST['data5'];
$input_date6 = $_POST['data6'];
$input_date7 = $_POST['data7'];
$input_date8 = $_POST['data8'];
$input_date9 = $_POST['data9'];
$input_date10 = $_POST['data10'];
$input_date11 = $_POST['data11'];
$input_date12 = $_POST['data12'];
$data1 = date("Y-m-d H:i:s", strtotime($input_date1));
$data2 = date("Y-m-d H:i:s", strtotime($input_date2));
$data3 = date("Y-m-d H:i:s", strtotime($input_date3));
$data4 = date("Y-m-d H:i:s", strtotime($input_date4));
$data5 = date("Y-m-d H:i:s", strtotime($input_date5));
$data6 = date("Y-m-d H:i:s", strtotime($input_date6));
$data7 = date("Y-m-d H:i:s", strtotime($input_date7));
$data8 = date("Y-m-d H:i:s", strtotime($input_date8));
$data9 = date("Y-m-d H:i:s", strtotime($input_date9));
$data10 = date("Y-m-d H:i:s", strtotime($input_date10));
$data11 = date("Y-m-d H:i:s", strtotime($input_date11));
$data12 = date("Y-m-d H:i:s", strtotime($input_date12));
$hora = $_POST["hora"];
$valor = $_POST["valor"];
$id_pacotetri = uniqid();

$stmt = $pdo->prepare(
    "INSERT INTO consultas (psicologos_id, data, hora, valor, id_pacotetri)
    VALUES (?,?,?,?,?)"
);
$stmt->execute([$psi, $data1, $hora, $valor, $id_pacotetri]);
$stmt = $pdo->prepare(
    "INSERT INTO consultas (psicologos_id, data, hora, valor, id_pacotetri)
    VALUES (?,?,?,?,?)"
);
$stmt->execute([$psi, $data2, $hora, $valor, $id_pacotetri]);
$stmt = $pdo->prepare(
    "INSERT INTO consultas (psicologos_id, data, hora, valor, id_pacotetri)
    VALUES (?,?,?,?,?)"
);
$stmt->execute([$psi, $data3, $hora, $valor, $id_pacotetri]);
$stmt = $pdo->prepare(
    "INSERT INTO consultas (psicologos_id, data, hora, valor, id_pacotetri)
    VALUES (?,?,?,?,?)"
);
$stmt->execute([$psi, $data4, $hora, $valor, $id_pacotetri]);
$stmt = $pdo->prepare(
    "INSERT INTO consultas (psicologos_id, data, hora, valor, id_pacotetri)
    VALUES (?,?,?,?,?)"
);
$stmt->execute([$psi, $data5, $hora, $valor, $id_pacotetri]);
$stmt = $pdo->prepare(
    "INSERT INTO consultas (psicologos_id, data, hora, valor, id_pacotetri)
    VALUES (?,?,?,?,?)"
);
$stmt->execute([$psi, $data6, $hora, $valor, $id_pacotetri]);
$stmt = $pdo->prepare(
    "INSERT INTO consultas (psicologos_id, data, hora, valor, id_pacotetri)
    VALUES (?,?,?,?,?)"
);
$stmt->execute([$psi, $data7, $hora, $valor, $id_pacotetri]);
$stmt = $pdo->prepare(
    "INSERT INTO consultas (psicologos_id, data, hora, valor, id_pacotetri)
    VALUES (?,?,?,?,?)"
);
$stmt->execute([$psi, $data8, $hora, $valor, $id_pacotetri]);
$stmt = $pdo->prepare(
    "INSERT INTO consultas (psicologos_id, data, hora, valor, id_pacotetri)
    VALUES (?,?,?,?,?)"
);
$stmt->execute([$psi, $data9, $hora, $valor, $id_pacotetri]);
$stmt = $pdo->prepare(
    "INSERT INTO consultas (psicologos_id, data, hora, valor, id_pacotetri)
    VALUES (?,?,?,?,?)"
);
$stmt->execute([$psi, $data10, $hora, $valor, $id_pacotetri]);
$stmt = $pdo->prepare(
    "INSERT INTO consultas (psicologos_id, data, hora, valor, id_pacotetri)
    VALUES (?,?,?,?,?)"
);
$stmt->execute([$psi, $data11, $hora, $valor, $id_pacotetri]);
$stmt = $pdo->prepare(
    "INSERT INTO consultas (psicologos_id, data, hora, valor, id_pacotetri)
    VALUES (?,?,?,?,?)"
);
$stmt->execute([$psi, $data12, $hora, $valor, $id_pacotetri]);

if ($stmt == true) {
    echo "<script>alert ('Pacote adicionado com sucesso!') </script>";
    echo "<script>location.href = ('exibe_psi.php?id=$psi')</script>";
} else {
    echo "<script>alert ('Pacote não foi adicionado. Tente novamente.')</script>";
    echo "<script>location.href = ('cria_consulta.php')</script>";
}
