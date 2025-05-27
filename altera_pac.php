<?php
session_start();
require "db.php";
require "valida_login.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cautria Santos</title>
    <link rel="stylesheet" href="./assets/styles/style.css">
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baskervville&display=swap" rel="stylesheet">
</head>

<body>
    <?php include "menu.php" ?>
    <?php
    $id = $_GET["id"];

    $stmt = $pdo->prepare("SELECT nome, telefone, email, senha
							 FROM pacientes WHERE id = '$id'");
    $stmt->execute();
    $registro = $stmt->fetch();
    ?>
    <form action="processa_altera_pac.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <p>
            Nome: <input type="text" name="nome" value="<?php echo "$registro[0]"; ?>" required>
        </p>
        <p>
            Telefone: <input type="text" name="telefone" value="<?php echo "$registro[1]"; ?>" maxlength="11" minlength="11" required>
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
            <a href="exibe_pac.php?id=<?php echo $id ?>">Cancelar mudanças</a>
        </p>
    </form>
    <footer>
        <div class="container">
            <p>&copy; 2025 Cautria Santos – Todos os direitos reservados.</p>
        </div>
    </footer>
    <script src="./bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>