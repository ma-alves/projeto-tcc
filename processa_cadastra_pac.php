<?php
$env = parse_ini_file('.env');
$senha_db = $env["SENHA_DB"];
$db = $env["DB"];

$conectar = mysqli_connect("localhost", "root", $senha_db, $db);

$nome_pac = $_POST["nome_pac"];
$telefone_pac = $_POST["telefone_pac"];
$email_pac = $_POST["email_pac"];
$senha_pac = $_POST["senha_pac"];

$sql_consulta = "SELECT email_pac FROM pacientes WHERE email_pac = '$email_pac'";

$resultado_consulta = mysqli_query($conectar, $sql_consulta);

$linhas = mysqli_num_rows($resultado_consulta);

if ($linhas == 1) {

  echo "<script> 
					alert ('E-mail já cadastrado. Por favor, utilize um e-mail diferente.') 
		      </script>";

  echo "<script> 
					location.href = ('cadastra_pac.php') 
			  </script>";
} else {
  $sql_cadastrar = "INSERT INTO pacientes 
                            (nome_pac,
                            telefone_pac,
                            email_pac,
                            senha_pac)
                      VALUES 
                            ('$nome_pac',
                            '$telefone_pac',
                            '$email_pac',
                            '$senha_pac')";

  $resultado_cadastrar = mysqli_query($conectar, $sql_cadastrar);

  if ($resultado_cadastrar == true) {
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
