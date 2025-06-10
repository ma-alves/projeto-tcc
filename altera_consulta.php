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
    <form action="processa_altera_consulta.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="hidden" name="id_psi" value="<?php echo $registro[4]; ?>">
        <p>
            Data: <input type="date" name="data" value="<?php echo "$registro[0]"; ?>" required>
        </p>
        <p>
            Hora: <input type="time" name="hora" value="<?php echo "$registro[1]"; ?>" required>
        </p>
        <p>
            Valor: <input type="number" name="valor" value="<?php echo "$registro[2]"; ?>" required>
        </p>
        <p>
            <input type="submit" value="Alterar">
        </p>
        <p>
            <a href="exibe_psi.php?id=<?php echo $registro[4] ?>">Cancelar mudanças</a>
        </p>
    </form>
    <?php include "footer.php" ?>
</body>

</html>