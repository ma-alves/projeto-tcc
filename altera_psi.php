<?php
session_start();
require "db.php";
require "valida_permissao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cautria Santos - Agendamento de Consultas Psicológicas</title>
    <link rel="stylesheet" href="./assets/styles/style-cadastra-user.css">
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

    $stmt = $pdo->prepare("SELECT nome, crp, email, senha
							 FROM psicologos WHERE id = '$id'");
    $stmt->execute();
    $registro = $stmt->fetch();

    ?>
    <section id="agendamento" class="agendamento-form">
        <div class="container">
            <a href="javascript:history.back()" class="btn-voltar">
                <i class="fas fa-arrow-left"></i> Voltar
            </a>
            <h3>Alteração de Dados Pessoais</h3>
            <form action="processa_altera_psi.php" method="post">

                <input type="hidden" name="id" value="<?php echo $id; ?>">

                <div class="form-group with-icon">
                    <label for="nome">Nome Completo</label>
                    <div class="input-container">
                        <i class="fas fa-user input-icon"></i>
                        <input type="text" name="nome" value="<?php echo "$registro[0]"; ?>" class="form-control" required>
                    </div>
                </div>

                <div class="form-group with-icon">
                    <label for="crp">CRP</label>
                    <div class="input-container">
                        <i class="fa-solid fa-hand-holding-heart input-icon"></i>
                        <input type="text" name="crp" maxlength="8" minlength="7" value="<?php echo "$registro[1]"; ?>" class="form-control" required>
                    </div>
                </div>

                <div class="form-group with-icon">
                    <label for="email">E-mail</label>
                    <div class="input-container">
                        <i class="fas fa-envelope input-icon"></i>
                        <input type="email" name="email" value="<?php echo "$registro[2]"; ?>" class="form-control" required>
                    </div>
                </div>

                <div class="form-group with-icon">
                    <label for="senha">Senha</label>
                    <div class="input-container">
                        <i class="fas fa-lock input-icon"></i>
                        <input type="password" class="form-control" id="senha" name="senha" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                            title="A senha deve conter pelo menos um número, uma letra maiúscula, uma letra mínuscula e no mínimo 8 caracteres."
                            placeholder="Digite uma senha segura" required>
                    </div>
                </div>
                <div class="action-buttons">
                    <input type="submit" class="action-btn btn-submit" value="Alterar">
                    <a href="exibe_psi.php?id=<?php echo $id ?>" class="action-btn btn-cancel">Cancelar</a>
                </div>
            </form>
        </div>
    </section>
    <?php include "footer.php" ?>
</body>

</html>