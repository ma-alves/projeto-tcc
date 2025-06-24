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

    $stmt = $pdo->prepare("SELECT data, hora, valor, id_consulta, psicologos_id
							 FROM consultas WHERE id_consulta = '$id'");
    $stmt->execute();
    $registro = $stmt->fetch();

    ?>
    <section id="agendamento" class="agendamento-form">
        <div class="container">
            <a href="javascript:history.back()" class="btn-voltar">
                <i class="fas fa-arrow-left"></i> Voltar
            </a>

        <h3>Editar Consulta</h3>
        <form action="processa_altera_consulta.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="hidden" name="id_psi" value="<?php echo $registro[4]; ?>">

            <div class="form-group with-icon">
                <label for="data">Data</label>
                <div class="input-container">
                    <input type="date" name="data" id="data" class="form-control"
                        value="<?php echo "$registro[0]"; ?>" required>
                </div>
            </div>

            <div class="form-group with-icon">
                <label for="hora">Hora</label>
                <div class="input-container">
                    <input type="time" name="hora" id="hora" class="form-control"
                        value="<?php echo "$registro[1]"; ?>" required>
                </div>
            </div>

            <div class="form-group with-icon">
                <label for="valor">Valor</label>
                <div class="input-container">
                    <i class="fa-solid fa-dollar-sign input-icon"></i>
                    <input type="number" name="valor" id="valor" value="<?php echo "$registro[2]"; ?>" class="form-control" required>
                </div>
            </div>

            <div class="action-buttons">
                <input type="submit" class="action-btn btn-submit" value="Alterar">
                <a href="exibe_psi.php?id=<?php echo $registro[4] ?>" class="action-btn btn-cancel">Cancelar mudanças</a>
            </div>
        </form>
        </div>
    </section>
    <?php include "footer.php" ?>
</body>

</html>