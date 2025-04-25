<?php
require "db.php";

$nome = $_POST["nome"];
$telefone = $_POST["telefone"];
$email = $_POST["email"];
$senha = password_hash($_POST["senha"], PASSWORD_DEFAULT);

$stmt = $pdo->prepare("SELECT email FROM pacientes WHERE email = '$email'");
$stmt->execute();
$linhas = $stmt->rowCount();

if ($linhas == 1) {
  echo "<script> 
					alert ('E-mail já cadastrado. Por favor, utilize um e-mail diferente.') 
		      </script>";

  echo "<script> 
					location.href = ('cadastra_pac.php') 
			  </script>";
} else {
  // SEGUIR ESTE PADRÃO DE INSERT
  $stmt = $pdo->prepare("INSERT INTO pacientes (nome, telefone, email, senha)
                        VALUES (?, ?, ?, ?)");
  $stmt->execute([$nome, $telefone, $email, $senha]);

  if ($stmt == true) {
    echo "<script> 
					alert ('Cadastro realizado com sucesso!') 
				  </script>";

    echo "<script> 
					location.href = ('login_pac.php') 
				  </script>";
  } else {
    echo "<script> 
					alert ('Cadastro não realizado. Tente novamente.')
			     </script>";
    echo "<script> 
					location.href = ('cadastra_pac.php') 
				  </script>";
  }
}
