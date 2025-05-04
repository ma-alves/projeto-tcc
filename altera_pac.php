<?php
session_start();
require "db.php";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/styles/layout.css">
    <title>Cautria Santos</title>
</head>

<body>
    <?php
    // $conectar = mysqli_connect("localhost", "root", $senha_db, $db);

    $id = $_GET["id"];

    $stmt = $pdo->prepare("SELECT nome, telefone, email, senha
							 FROM pacientes WHERE id = '$id'");
    $stmt->execute();
    $registro = $stmt->fetch();

    // $resultado_pesquisa = mysqli_query($conectar, $sql_consulta);
    // $registro = mysqli_fetch_row($resultado_pesquisa);
    ?>
    <form action="processa_altera_pac.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <p>
            Nome: <input type="text" name="nome" value="<?php echo "$registro[0]"; ?>" required>
        </p>
        <p>
            Telefone: <input type="text" name="telefone" value="<?php echo "$registro[1]"; ?>" required>
        </p>
        <p>
            Email: <input type="email" name="email" value="<?php echo "$registro[2]"; ?>" required>
        </p>
        <p>
            Senha: <input type="password" id="senha" name="senha" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                title="A senha deve conter pelo menos um número, uma letra maiúscula, uma letra mínuscula e no mínimo 8 caracteres." required>
        </p>
        <p>
            <input type="submit" value="Alterar">
        </p>
        <p>
            <a href="exibe_pac.php?id=<?php echo $id?>">Cancelar mudanças</a>
        </p>
    </form>
</body>

</html>