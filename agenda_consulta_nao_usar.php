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
    <?php include "menu.php"; ?>

    <!-- Agendamento -->
    <?php
    $stmt = $pdo->prepare(
        // fazer select de consultas e psicologos, pra puxar o nome e crp
        // talvez meter um group by, pra ficar uma única data
        "SELECT c.data, c.hora, p.nome, p.crp FROM consultas c JOIN psicologos p ON c.psicologos_id = p.id
         WHERE pacientes_id IS NULL ORDER BY c.data, c.hora"
    );
    $stmt->execute();
    $consultas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <table>
        <thead>
            <tr>
                <th style="padding: 10px; text-align: left;">Data</th>
                <th style="padding: 10px; text-align: left;">Hora</th>
                <th style="padding: 10px; text-align: left;">Psicólogo(a)</th>
                <th style="padding: 10px; text-align: left;">CRP</th>
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
                            <?= htmlspecialchars($consulta['crp']) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" style="padding: 10px; text-align: center;">
                        Nenhuma consulta disponível no momento.
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <!-- <section id="agendamento" class="agendamento-form">
        <div class="container">
            <h3>Agendar Consulta</h3>
            <form>
                <label for="nome">Nome Completo</label>
                <input type="text" id="nome" required />

                <label for="email">Email</label>
                <input type="email" id="email" required />

                <label for="data">Data</label>
                <input type="date" id="data" required />

                <label for="hora">Horário</label>
                <input type="time" id="hora" required />

                <button type="submit">Confirmar Agendamento</button>
            </form>
        </div>
    </section> -->

    <!-- Rodapé -->
    <footer>
        <div class="container">
            <p>&copy; 2025 Cautria Santos – Todos os direitos reservados.</p>
        </div>
    </footer>
    <script src="./bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>