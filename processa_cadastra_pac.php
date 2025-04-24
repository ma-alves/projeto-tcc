<?php
require "db.php";
// $env = parse_ini_file('.env');
// $senha_db = $env["SENHA_DB"];
// $db = $env["DB"];

// $conectar = mysqli_connect("localhost", "root", $senha_db, $db);

$nome_pac = $_POST["nome_pac"];
$telefone_pac = $_POST["telefone_pac"];
$email_pac = $_POST["email_pac"];
$senha_pac = password_hash($_POST["senha_pac"], PASSWORD_DEFAULT);

$stmt = $pdo->prepare("SELECT email_pac FROM pacientes WHERE email_pac = '$email_pac'");
$stmt->execute();
$linhas = $stmt->rowCount();

// $resultado_consulta = $stmt->setFetchMode(PDO::FETCH_ASSOC);

if ($linhas == 1) {
  echo "<script> 
					alert ('E-mail já cadastrado. Por favor, utilize um e-mail diferente.') 
		      </script>";

  echo "<script> 
					location.href = ('cadastra_pac.php') 
			  </script>";
} else {
  $stmt = $pdo->prepare("INSERT INTO pacientes (nome_pac, telefone_pac, email_pac, senha_pac)
                        VALUES ('$nome_pac','$telefone_pac','$email_pac','$senha_pac')");
  $stmt->execute([$nome_pac, $telefone_pac, $email_pac, $senha_pac]);

  // $resultado_cadastrar = mysqli_query($conectar, $sql_cadastrar);

  if ($stmt == true) {
    echo "<script> 
					alert ('Cadastro realizado com sucesso!') 
				  </script>";

    echo "<script> 
					location.href = ('cadastra_pac.php') 
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
