<?php
require "db.php";
session_start();

$id = $_SESSION["id_psi"];
$id_url = $_GET["id"];

if (!$_SESSION["admin"]) {
    echo "<script>alert('Acesso restrito.')</script>";
    echo "<script>location.href = ('index.php')</script>";
} else {
    $stmt = $pdo->prepare('SELECT * FROM psicologos WHERE id = ?');
    $stmt->execute([$id]);
    $user = $stmt->fetch();

    echo "<p>Nome: $user[1]</p>";
    echo "<p>CRP: $user[2]</p>";
    echo "<p>Email: $user[3]</p>";

    $stmt = $pdo->prepare('SELECT * FROM consultas WHERE psicologos_id = ?');
    $stmt->execute([$id]);
    while ($consultas = $stmt->fetch()) {
        if (!$consultas[1]) {
            echo "<p>Data: $consultas[3]</p>";
            echo "<p>Hora: $consultas[4]</p>";
        } else {
            echo "<p>Paciente: $consultas[1]</p>";
            echo "<p>Data: $consultas[3]</p>";
            echo "<p>Hora: $consultas[4]</p>";
        }
    };
}
?>
<p><a href="logout.php">Sair</a></p>