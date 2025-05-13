<?php
session_start();
require "db.php";
require "valida_permissao.php";
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
    $id = $_GET["id"];

    $stmt = $pdo->prepare("SELECT nome, crp, email, senha
							 FROM psicologos WHERE id = '$id'");
    $stmt->execute();
    $registro = $stmt->fetch();

    ?>
    <form action="processa_altera_psi.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <p>
            Nome: <input type="text" name="nome" value="<?php echo "$registro[0]"; ?>" required>
        </p>
        <p>
            CRP: <input type="text" name="crp" value="<?php echo "$registro[1]"; ?>" required>
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