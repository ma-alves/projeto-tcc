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
    <title>Cautria Santos</title>
    <link rel="stylesheet" href="./assets/styles/style.css">
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baskervville&display=swap" rel="stylesheet">
</head>

<body>
    <?php include "menu.php";

    $id = $_SESSION["id_psi"];
    $id_url = $_GET["id"];

    if (!$_SESSION["admin"]) {
        echo "<script>alert('Acesso restrito.')</script>";
        echo "<script>location.href = ('index.php')</script>";
    } else {
        $stmt = $pdo->prepare('SELECT * FROM psicologos WHERE id = ?');
        $stmt->execute([$id]);
        $user = $stmt->fetch();

        echo "<p>Nome: $user[1]</p>";
        echo "<p>CRP: $user[2]</p>";
        echo "<p>Email: $user[3]</p>";
        echo "<p><a href='altera_pac.php?id=$id'>Editar Perfil</a></p>";
        echo "<p><a href='logout.php'>Sair</a></p>";
    }
    ?>
    
    <p><a href="adiciona_consulta.php">Adicionar consulta</a></p>
    <?php
    // Query de horários marcados
    $stmt = $pdo->prepare(
        "SELECT * FROM consultas c JOIN pacientes p ON pacientes_id = p.id WHERE psicologos_id = $id"
    );
    $stmt->execute();
    $consultas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <h3>Consultas Marcadas</h3>
    <table>
        <thead>
            <tr>
                <th style="padding: 10px; text-align: left;">Data</th>
                <th style="padding: 10px; text-align: left;">Hora</th>
                <th style="padding: 10px; text-align: left;">Paciente</th>
                <th style="padding: 10px; text-align: left;">Telefone</th>
                <th style="padding: 10px; text-align: left;">Email</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($consultas) > 0): ?>
                <?php foreach ($consultas as $consulta): ?>
                    <tr>
                        <td style="padding: 8px; border-bottom: 1px solid #ddd;">
                            <?= date('d/m/Y', strtotime($consulta['data'])) ?>
                        </td>
                        <td style="padding: 8px; border-bottom: 1px solid #ddd;">
                            <?= substr($consulta['hora'], 0, 5) ?>
                        </td>
                        <td style="padding: 8px; border-bottom: 1px solid #ddd;">
                            <?= htmlspecialchars($consulta['nome']) ?>
                        </td>
                        <td style="padding: 8px; border-bottom: 1px solid #ddd;">
                            <?= htmlspecialchars($consulta['telefone']) ?>
                        </td>
                        <td style="padding: 8px; border-bottom: 1px solid #ddd;">
                            <?= htmlspecialchars($consulta['email']) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" style="padding: 10px; text-align: center;">
                        Nenhuma consulta marcada no momento.
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <?php
    // Query de horários vagos
    $stmt = $pdo->prepare(
        "SELECT c.id_consulta, c.data, c.hora, p.nome, p.crp FROM consultas c JOIN psicologos p ON c.psicologos_id = p.id
         WHERE pacientes_id IS NULL AND psicologos_id = $id ORDER BY c.data, c.hora"
    );
    $stmt->execute();
    $consultas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <h3>Horários Vagos</h3>
    <table>
        <thead>
            <tr>
                <th style="padding: 10px; text-align: left;">Data</th>
                <th style="padding: 10px; text-align: left;">Hora</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($consultas) > 0): ?>
                <?php foreach ($consultas as $consulta): ?>
                    <tr>
                        <td style="padding: 8px; border-bottom: 1px solid #ddd;">
                            <?= date('d/m/Y', strtotime($consulta['data'])) ?>
                        </td>
                        <td style="padding: 8px; border-bottom: 1px solid #ddd;">
                            <?= substr($consulta['hora'], 0, 5) ?>
                        </td>
                        <td style="padding: 8px; border-bottom: 1px solid #ddd;">
                            <a href="processa_apaga_consulta.php?id=<?php echo $consulta['id_consulta']?>">Apagar horário</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" style="padding: 10px; text-align: center;">
                        Nenhum horário vago no momento.
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <footer>
        <div class="container">
            <p>&copy; 2025 Cautria Santos – Todos os direitos reservados.</p>
        </div>
    </footer>
    <script src="./bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>