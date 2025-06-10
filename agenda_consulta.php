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
    <link rel="stylesheet" href="./assets/styles/style.css">
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baskervville&display=swap" rel="stylesheet">
</head>

<body>
    <?php include "menu.php"; ?>

    <!-- Agendamento Consulta Avulsa-->
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

    <style>
        .calendario {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 30px;
            margin-left: 30px;
        }

        .dia {
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 15px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .data-header {
            font-size: 1.2em;
            font-weight: bold;
            color: #3a7bd5;
            margin-bottom: 10px;
            padding-bottom: 5px;
            border-bottom: 1px solid #eee;
        }

        .consulta-item {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px dashed #eee;
        }

        .consulta-item:last-child {
            border-bottom: none;
        }

        .hora {
            font-weight: bold;
            color: #555;
        }

        .psicologo {
            color: #666;
            font-size: 0.9em;
        }

        .sem-consultas {
            color: #999;
            font-style: italic;
            padding: 10px 0;
        }

        /* Estilo do botão Agendar */
        .btn-agendar {
            background-color: #28a745;
            /* Verde */
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s ease;
            margin-left: 0px;
        }

        .btn-agendar:hover {
            background-color: #218838;
            /* Verde mais escuro no hover */
            transform: translateY(-1px);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
    </style>

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
                                <span class="hora">
                                    Hora: <?= substr($consulta['hora'], 0, 5) ?>
                                </span>
                                <span class="psicologo">
                                    <?= htmlspecialchars($consulta['nome']) ?> (CRP: <?= htmlspecialchars($consulta['crp']) ?>)
                                </span>
                            </div>
                            <?php if (!isset($_SESSION["id_psi"])): ?>
                                <form action="processa_agenda_consulta.php" method="post">
                                    <input type="hidden" name="id_pac" value="<?php echo $_SESSION["id_pac"] ?>">
                                    <input type="hidden" name="id_consulta" value="<?php echo $consulta["id_consulta"] ?>">
                                    <button type="submit" class="btn-agendar">Agendar</button>
                                </form>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <!-- Agendamento Pacote Mensal -->
    <div>
        <?php
        $stmt = $pdo->prepare(
            "SELECT c.id_consulta, c.data, c.hora, c.id_pacote, p.nome, p.crp FROM consultas c JOIN psicologos p ON c.psicologos_id = p.id
         WHERE pacientes_id IS NULL AND id_pacote IS NOT NULL ORDER BY c.data, c.hora"
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
        <h3>Pacotes Mensais</h3>
        <table>
            <thead>
                <tr>
                    <th style="padding: 10px; text-align: left;">Psicólogo(a)</th>
                    <th style="padding: 10px; text-align: left;">CRP</th>
                    <th style="padding: 10px; text-align: left;">Hora</th>
                    <th style="padding: 10px; text-align: left;">Datas</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($consultas) > 0): ?>
                    <tr>
                        <td style="padding: 8px; border-bottom: 1px solid #ddd;">
                            <?= htmlspecialchars($consulta['nome']) ?>
                        </td>
                        <td style="padding: 8px; border-bottom: 1px solid #ddd;">
                            <?= htmlspecialchars($consulta['crp']) ?>
                        </td>
                        <td style="padding: 8px; border-bottom: 1px solid #ddd;">
                            <?= substr($consulta['hora'], 0, 5) ?>
                        </td>
                        <?php foreach ($consultas as $consulta): ?>
                            <td style="padding: 8px; border-bottom: 1px solid #ddd;">
                                <?= date('d/m/Y', strtotime($consulta['data'])) ?>
                            </td>
                        <?php endforeach; ?>
                        <?php if (!isset($_SESSION["id_psi"])): ?>
                            <td>
                                <form action="processa_agenda_pacote.php" method="post">
                                    <input type="hidden" name="id_pac" value="<?php echo $_SESSION["id_pac"] ?>">
                                    <input type="hidden" name="id_pacote" value="<?php echo $consulta["id_pacote"] ?>">
                                    <button type="submit" class="btn-agendar">Agendar</button>
                                </form>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php else: ?>
                    <tr>
                        <td colspan="4" style="padding: 10px; text-align: center;">
                            Nenhum pacote disponível no momento.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <div>
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
        <h3>Pacotes Trimestrais</h3>
        <table>
            <thead>
                <tr>
                    <th style="padding: 10px; text-align: left;">Psicólogo(a)</th>
                    <th style="padding: 10px; text-align: left;">CRP</th>
                    <th style="padding: 10px; text-align: left;">Hora</th>
                    <th style="padding: 10px; text-align: left;">Datas</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($consultas) > 0): ?>
                    <tr>
                        <td style="padding: 8px; border-bottom: 1px solid #ddd;">
                            <?= htmlspecialchars($consulta['nome']) ?>
                        </td>
                        <td style="padding: 8px; border-bottom: 1px solid #ddd;">
                            <?= htmlspecialchars($consulta['crp']) ?>
                        </td>
                        <td style="padding: 8px; border-bottom: 1px solid #ddd;">
                            <?= substr($consulta['hora'], 0, 5) ?>
                        </td>
                        <?php foreach ($consultas as $consulta): ?>
                            <td style="padding: 8px; border-bottom: 1px solid #ddd;">
                                <?= date('d/m/Y', strtotime($consulta['data'])) ?>
                            </td>
                        <?php endforeach; ?>
                        <?php if (!isset($_SESSION["id_psi"])): ?>
                            <td>
                                <form action="processa_agenda_pacotetri.php" method="post">
                                    <input type="hidden" name="id_pac" value="<?php echo $_SESSION["id_pac"] ?>">
                                    <input type="hidden" name="id_pacotetri" value="<?php echo $consulta["id_pacotetri"] ?>">
                                    <button type="submit" class="btn-agendar">Agendar</button>
                                </form>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php else: ?>
                    <tr>
                        <td colspan="4" style="padding: 10px; text-align: center;">
                            Nenhum pacote disponível no momento.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Rodapé -->
    <?php include "footer.php" ?>
</body>

</html>