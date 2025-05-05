<?php
require "db.php";
session_start();

$id = $_GET["id"];

if ($_SESSION["admin"] || $_SESSION["id_pac"] == $_GET["id"]) {
    $stmt = $pdo->prepare('SELECT * FROM pacientes WHERE id = ?');
    $stmt->execute([$id]);
    $user = $stmt->fetch();

    echo "<p>Nome: $user[1]</p>";
    echo "<p>Telefone: $user[2]</p>";
    echo "<p>Email: $user[3]</p>";

    // Depois adicionar consultas marcadas e caso não hajam
} else {
    echo "<script>alert('Acesso restrito.')</script>";
    echo "<script>location.href = ('index.php')</script>";
}
