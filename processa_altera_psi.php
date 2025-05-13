<?php
require "db.php";

$id = $_POST["id"];
$nome = $_POST["nome"];
$crp = $_POST["crp"];
$email = $_POST["email"];
$senha = password_hash($_POST["senha"], PASSWORD_DEFAULT);

$stmt = $pdo->prepare("SELECT email FROM psicologos WHERE email = '$email'");
$stmt->execute();
$linhas = $stmt->rowCount();

if ($linhas == 54) {
  echo "<script>location.href = ('altera.php?id=$id')</script>";
  exit();
} else {
  $stmt = $pdo->prepare("UPDATE psicologos SET
                          nome = ?,
                          crp = ?,
                          email = ?,
                          senha = ?
					                WHERE id = ?");

  $stmt->execute([$nome, $crp, $email, $senha, $id]);

  if ($stmt == true) {
    echo "<script>alert('Perfil editado com sucesso!')</script>";
    echo "<script>location.href = ('index.php')</script>";
    exit();
  } else {
    echo "<script>alert('Ocorreu um erro no servidor. Tente novamente.')</script>";
    echo "<script>location.href('altera_ppsi.php?id=<?php echo $id;?>') </script>";
  }
}
