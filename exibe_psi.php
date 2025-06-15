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
    <link rel="stylesheet" href="./assets/styles/style-exibe-perfil.css">
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
    ?>

        <div class="profile-container">
            <!-- Seção de Informações do Perfil -->
            <div class="profile-info">
                <div class="profile-header">
                    <img src="./assets/imagens/profile-pictures/profile-totoro.jpeg" alt="Avatar" class="profile-avatar">
                    <h2 class="profile-name"><?= htmlspecialchars($user[1]) ?></h2>
                </div>

                <div class="profile-details">
                    <div class="profile-detail">
                        <i class="fa-solid fa-hand-holding-heart input-icon"></i>
                        <span> <?= htmlspecialchars($user[2]) ?></span>
                    </div>
                    <div class="profile-detail">
                        <i class="fas fa-envelope"></i>
                        <span> <?= htmlspecialchars($user[3]) ?></span>
                    </div>
                </div>
                <div class="profile-actions">
                    <a href='altera_psi.php?id=<?= $id ?>' class="profile-btn btn-edit">
                        <i class="fas fa-edit"></i> Editar Perfil
                    </a>
                    <a href='logout.php' class="profile-btn btn-logout">
                        <i class="fas fa-sign-out-alt"></i> Sair
                    </a>
                    <a href='adiciona_consulta.php' class="profile-btn btn-add">
                        <i class="fas fa-plus"></i> Adicionar Consulta ou Pacote
                    </a>
                    <a href='cadastra_psi.php' class="profile-btn btn-add">
                        <i class="fas fa-user-plus"></i> Cadastrar Psicólogo
                    </a>
                </div>
            </div>

            <!-- Seção de Consultas -->
            <div class="consultas-section">
                <h3 class="section-title">Consultas Marcadas</h3>

                <?php
                // Query de horários marcados
                $stmt = $pdo->prepare(
                    "SELECT * FROM consultas c JOIN pacientes p ON pacientes_id = p.id WHERE psicologos_id = $id ORDER BY c.data"
                );
                $stmt->execute();
                $consultas = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if (count($consultas) > 0): ?>
                    <table class="consultas-table">
                        <thead>
                            <tr>
                                <th>Data</th>
                                <th>Hora</th>
                                <th>Paciente</th>
                                <th>Telefone</th>
                                <th>Email</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($consultas as $consulta): ?>
                                <tr>
                                    <td><?= date('d/m/Y', strtotime($consulta['data'])) ?></td>
                                    <td><?= substr($consulta['hora'], 0, 5) ?></td>
                                    <td><?= htmlspecialchars($consulta['nome']) ?></td>
                                    <td><?= htmlspecialchars($consulta['telefone']) ?></td>
                                    <td><?= htmlspecialchars($consulta['email']) ?></td>
                                    <td>
                                        <a href="https://api.whatsapp.com/send?phone=55<?php echo $consulta['telefone'] ?>&text=Ol%C3%A1%2C%20podemos%20confirmar%20nossa%20consulta%20do%20dia%20<?php echo $consulta['data'] ?>%20%C3%A0s%20<?php echo $consulta['hora'] ?>%20horas%20e%20fechar%20o%20pagamento%3F"
                                            class="action-btn btn-confirm" target="_blank">
                                            <i class="fab fa-whatsapp"></i> Confirmar
                                        </a>
                                        <a href="processa_psi_desmarca_consulta.php?id=<?php echo $consulta['id_consulta'] ?>"
                                            class="action-btn btn-cancel">
                                            <i class="fas fa-times"></i> Cancelar
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p class="no-consultas">Nenhuma consulta marcada no momento.</p>
                <?php endif; ?>

                <h3 class="section-title">Horários Vagos</h3>

                <?php
                // Query de horários vagos
                $stmt = $pdo->prepare(
                    "SELECT c.id_consulta, c.data, c.hora, p.nome, p.crp FROM consultas c JOIN psicologos p ON c.psicologos_id = p.id
         WHERE pacientes_id IS NULL AND psicologos_id = $id ORDER BY c.data, c.hora"
                );
                $stmt->execute();
                $consultas = $stmt->fetchAll(PDO::FETCH_ASSOC);
                ?>

                <?php if (count($consultas) > 0): ?>
                    <table class="consultas-table">
                        <thead>
                            <tr>
                                <th>Data</th>
                                <th>Hora</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($consultas as $consulta): ?>
                                <tr>
                                    <td><?= date('d/m/Y', strtotime($consulta['data'])) ?></td>
                                    <td><?= substr($consulta['hora'], 0, 5) ?></td>
                                    <td>
                                        <a href="processa_apaga_consulta.php?id=<?php echo $consulta['id_consulta'] ?>"
                                            class="action-btn btn-delete">
                                            <i class="fas fa-trash-alt"></i> Apagar horário
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p class="no-consultas">Nenhum horário disponível no momento.</p>
                <?php endif; ?>
            </div>
        </div>
    <?php } ?>
    <?php include "footer.php" ?>
</body>

</html>