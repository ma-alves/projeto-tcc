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
    <title>Cautria Santos - Agendamento de Consultas Psicológicas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/styles/style.css">
    <link rel="stylesheet" href="./assets/styles/style-agenda-consulta.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baskervville&display=swap" rel="stylesheet">

</head>

<body>
    <?php include "menu.php"; ?>

    <section class="agendamento-section">


        <div class="agendamento-title">
            <a href="javascript:history.back()" class="btn-voltar">
                <i class="fas fa-arrow-left"></i> Voltar
            </a>
            Agendar Consulta
        </div>

        <!-- Consultas Avulsas -->
        <?php
        $stmt = $pdo->prepare(
            "SELECT c.id_consulta, c.data, c.hora, p.nome, p.crp FROM consultas c JOIN psicologos p ON c.psicologos_id = p.id
             WHERE pacientes_id IS NULL AND id_pacote IS NULL AND id_pacotetri IS NULL ORDER BY c.data, c.hora"
        );
        $stmt->execute();
        $consultas = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $consultasPorData = [];
        foreach ($consultas as $consulta) {
            $data = $consulta['data'];
            if (!isset($consultasPorData[$data])) {
                $consultasPorData[$data] = [];
            }
            $consultasPorData[$data][] = $consulta;
        }
        ?>

        <h3>Consultas Avulsas</h3>
        <div class="calendario">
            <?php if (empty($consultasPorData)): ?>
                <div class="sem-consultas">Nenhuma consulta disponível no momento.</div>
            <?php else: ?>
                <?php foreach ($consultasPorData as $data => $consultasDoDia): ?>
                    <div class="dia">
                        <div class="data-header">
                            <?= date('d/m/Y', strtotime($data)) ?> -
                            <?php
                            // Array com os dias da semana em inglês e suas traduções
                            $diasemana = array(
                                'Sunday' => 'Domingo',
                                'Monday' => 'Segunda-feira',
                                'Tuesday' => 'Terça-feira',
                                'Wednesday' => 'Quarta-feira',
                                'Thursday' => 'Quinta-feira',
                                'Friday' => 'Sexta-feira',
                                'Saturday' => 'Sábado'
                            );

                            // Obter o dia em inglês
                            $dia_ingles = date('l', strtotime($data));

                            // Traduzir para português
                            echo $diasemana[$dia_ingles];
                            ?>
                        </div>

                        <?php if (empty($consultasDoDia)): ?>
                            <div class="sem-consultas">Nenhum horário disponível</div>
                        <?php else: ?>
                            <?php foreach ($consultasDoDia as $consulta): ?>
                                <div class="consulta-item">
                                    <div class="consulta-info">
                                        <span class="hora"><?= substr($consulta['hora'], 0, 5) ?></span>
                                        <span class="psicologo"><?= htmlspecialchars($consulta['nome']) ?> (CRP: <?= htmlspecialchars($consulta['crp']) ?>)</span>
                                    </div>
                                    <?php if (!isset($_SESSION["id_psi"])): ?>
                                        <form action="processa_agenda_consulta.php" method="post" style="margin: 0;">
                                            <input type="hidden" name="id_pac" value="<?= $_SESSION["id_pac"] ?>">
                                            <input type="hidden" name="id_consulta" value="<?= $consulta["id_consulta"] ?>">
                                            <button type="submit" class="btn-agendar">Agendar</button>
                                        </form>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <!-- Pacotes Mensais -->
        <div class="pacotes-container">
            <h3 class="pacotes-title">Pacotes Mensais</h3>
            <?php
            $stmt = $pdo->prepare(
                "SELECT c.id_consulta, c.data, c.hora, c.id_pacote, p.nome, p.crp FROM consultas c JOIN psicologos p ON c.psicologos_id = p.id
                 WHERE pacientes_id IS NULL AND id_pacote IS NOT NULL ORDER BY c.data, c.hora"
            );
            $stmt->execute();
            $consultas = $stmt->fetchAll(PDO::FETCH_ASSOC);
            ?>

            <table class="pacotes-table">
                <thead>
                    <tr>
                        <th>Psicólogo(a)</th>
                        <th>CRP</th>
                        <th>Hora</th>
                        <th>Datas</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($consultas) > 0): ?>
                        <?php
                        $pacotes = [];
                        foreach ($consultas as $consulta) {
                            $id_pacote = $consulta['id_pacote'];
                            if (!isset($pacotes[$id_pacote])) {
                                $pacotes[$id_pacote] = [
                                    'nome' => $consulta['nome'],
                                    'crp' => $consulta['crp'],
                                    'hora' => $consulta['hora'],
                                    'datas' => []
                                ];
                            }
                            $pacotes[$id_pacote]['datas'][] = $consulta['data'];
                        }
                        ?>
                        <?php foreach ($pacotes as $id_pacote => $pacote): ?>
                            <tr>
                                <td><?= htmlspecialchars($pacote['nome']) ?></td>
                                <td><?= htmlspecialchars($pacote['crp']) ?></td>
                                <td><?= substr($pacote['hora'], 0, 5) ?></td>
                                <td>
                                    <?php foreach ($pacote['datas'] as $data): ?>
                                        <?= date('d/m/Y', strtotime($data)) ?><br>
                                    <?php endforeach; ?>
                                </td>
                                <td>
                                    <?php if (!isset($_SESSION["id_psi"])): ?>
                                        <form action="processa_agenda_pacote.php" method="post">
                                            <input type="hidden" name="id_pac" value="<?= $_SESSION["id_pac"] ?>">
                                            <input type="hidden" name="id_pacote" value="<?= $id_pacote ?>">
                                            <button type="submit" class="btn-agendar">Contratar</button>
                                        </form>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="sem-consultas">Nenhum pacote disponível no momento.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Pacotes Trimestrais -->
        <div class="pacotes-container">
            <h3 class="pacotes-title">Pacotes Trimestrais</h3>
            <?php
            $stmt = $pdo->prepare(
                "SELECT c.id_consulta, c.data, c.hora, c.id_pacotetri, p.nome, p.crp FROM consultas c JOIN psicologos p ON c.psicologos_id = p.id
                 WHERE pacientes_id IS NULL AND id_pacotetri IS NOT NULL ORDER BY c.data, c.hora"
            );
            $stmt->execute();
            $consultas = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $consultasPorData = [];
            foreach ($consultas as $consulta) {
                $data = $consulta['data'];
                if (!isset($consultasPorData[$data])) {
                    $consultasPorData[$data] = [];
                }
                $consultasPorData[$data][] = $consulta;
            }
            ?>

            <table class="pacotes-table">
                <thead>
                    <tr>
                        <th>Psicólogo(a)</th>
                        <th>CRP</th>
                        <th>Hora</th>
                        <th>Datas</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($consultas) > 0): ?>
                        <?php
                        $pacotes = [];
                        foreach ($consultas as $consulta) {
                            $id_pacote = $consulta['id_pacotetri'];
                            if (!isset($pacotes[$id_pacote])) {
                                $pacotes[$id_pacote] = [
                                    'nome' => $consulta['nome'],
                                    'crp' => $consulta['crp'],
                                    'hora' => $consulta['hora'],
                                    'datas' => []
                                ];
                            }
                            $pacotes[$id_pacote]['datas'][] = $consulta['data'];
                        }
                        ?>
                        <?php foreach ($pacotes as $id_pacote => $pacote): ?>
                            <tr>
                                <td><?= htmlspecialchars($pacote['nome']) ?></td>
                                <td><?= htmlspecialchars($pacote['crp']) ?></td>
                                <td><?= substr($pacote['hora'], 0, 5) ?></td>
                                <td>
                                    <?php foreach ($pacote['datas'] as $data): ?>
                                        <?= date('d/m/Y', strtotime($data)) ?><br>
                                    <?php endforeach; ?>
                                </td>
                                <td>
                                    <?php if (!isset($_SESSION["id_psi"])): ?>
                                        <form action="processa_agenda_pacotetri.php" method="post">
                                            <input type="hidden" name="id_pac" value="<?= $_SESSION["id_pac"] ?>">
                                            <input type="hidden" name="id_pacotetri" value="<?= $id_pacote ?>">
                                            <button type="submit" class="btn-agendar">Contratar</button>
                                        </form>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="sem-consultas">Nenhum pacote disponível no momento.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>

    <!-- Rodapé -->
    <?php include "footer.php" ?>
</body>

</html>