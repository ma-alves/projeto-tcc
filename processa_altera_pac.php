<?php
$env = parse_ini_file('.env');
$senha_db = $env["SENHA_DB"];
$db = $env["DB"];

$conectar = mysqli_connect("localhost", "root", $senha_db, $db);

$cod_pac = $_POST["cod_pac"];

$nome_pac = $_POST["nome_pac"];
$telefone_pac = $_POST["telefone_pac"];
$email_pac = $_POST["email_pac"];
$senha_pac = $_POST["senha_pac"];

$sql_pesquisa = "SELECT email_pac FROM pacientes	
								  WHERE email_pac = '$email_pac' 							  
								  AND cod_pac <> '$cod_pac'";
$sql_resultado = mysqli_query($conectar, $sql_pesquisa);

$linhas = mysqli_num_rows($sql_resultado);
if ($linhas == 1) {
    echo "<script>location.href = ('altera_pac.php?cod_pac=$cod_pac')</script>";
    exit();
} else {
    $sql_altera = "UPDATE pacientes 		
				    SET
                    nome_pac = '$nome_pac',
                    email_pac = '$email_pac',
                    senha_pac = '$senha_pac',
                    telefone_pac = '$telefone_pac',
					WHERE cod_pac = '$cod_pac'";

    $sql_resultado_alteracao = mysqli_query($conectar, $sql_altera);

    if ($sql_resultado_alteracao == true) {
        echo "<script>
				alert('Perfil editado com sucesso!')
			  </script>";
        echo "<script> 
				location.href = ('index.php') 
			  </script>";
        exit();
    } else {
        echo "<script> 
				alert ('Ocorreu um erro no servidor. Tente novamente.') 
			  </script>";
        echo "<script> 
				location.href('altera_pac.php?cod_pac=<?php echo $cod_pac;?>') 
			  </script>";
    }
}
