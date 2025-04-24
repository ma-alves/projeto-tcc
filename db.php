<?php
// Conexão PDO segura
$dsn = 'mysql:host=localhost;dbname=clinica;charset=utf8';
$user = 'root';
$pass = '123456';
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
try {
  $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
  die('Erro na conexão: ' . $e->getMessage());
}
