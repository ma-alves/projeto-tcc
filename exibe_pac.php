<?php
session_start();
require "db.php";
require "valida_login.php"
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
    <?php
    include "menu.php";

    $id = $_GET["id"];

    if ($_SESSION["admin"] || $_SESSION["id_pac"] == $_GET["id"]) {
        $stmt = $pdo->prepare('SELECT * FROM pacientes WHERE id = ?');
        $stmt->execute([$id]);
        $user = $stmt->fetch();
    ?>
        <div class="profile-container">
            <!-- Seção de Informações de Perfil -->
            <div class="profile-info">
                <div class="profile-header">
                    <img src="./assets/imagens/profile-pictures/paciente.jpg" alt="Avatar" class="profile-avatar">
                    <h2 class="profile-name"><?= htmlspecialchars($user[1]) ?></h2>
                </div>

                <div class="profile-details">
                    <div class="profile-detail">
                        <i class="fas fa-mobile-alt input-icon"></i>
                        <span><?= htmlspecialchars($user[2]) ?></span>
                    </div>
                    <div class="profile-detail">
                        <i class="fas fa-envelope input-icon"></i>
                        <span><?= htmlspecialchars($user[3]) ?></span>
                    </div>
                </div>
                <div class="profile-actions">
                    <a href='altera_pac.php?id=<?= $id ?>' class="profile-btn btn-edit">
                        <i class="fas fa-edit"></i> Editar Perfil
                    </a>
                    <a href='agenda_consulta.php' class="profile-btn btn-add">
                        <i class="fas fa-plus"></i> Agendar Consulta ou Pacote
                    </a>
                    <a href='logout.php' class="profile-btn btn-logout">
                        <i class="fas fa-sign-out-alt"></i> Sair
                    </a>
                </div>
            </div>

            <!-- Seção de Consultas -->
            <div class="consultas-section">
                <h3 class="section-title">Consultas Marcadas</h3>

                <?php
                $stmt = $pdo->prepare(
                    "SELECT * FROM consultas c JOIN psicologos p ON psicologos_id = p.id WHERE pacientes_id = $id ORDER BY c.data"
                );
                $stmt->execute();
                $consultas = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if (count($consultas) > 0): ?>
                    <table class="consultas-table">
                        <thead>
                            <tr>
                                <th>Data</th>
                                <th>Hora</th>
                                <th>Psicólogo</th>
                                <th>CRP</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($consultas as $consulta): ?>
                                <tr>
                                    <td><?= date('d/m/Y', strtotime($consulta['data'])) ?></td>
                                    <td><?= substr($consulta['hora'], 0, 5) ?></td>
                                    <td><?= htmlspecialchars($consulta['nome']) ?> </td>
                                    <td><?= htmlspecialchars($consulta['crp']) ?></td>
                                    <td>
                                        <a href="processa_desmarca_consulta.php?id=<?php echo $consulta['id_consulta'] ?>"
                                            class="action-btn btn-delete">
                                            <i class="fas fa-trash-alt"></i> Desmarcar
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p class="no-consultas">Nenhuma consulta marcada no momento.</p>
                <?php endif; ?>
            </div>
        </div>
    <?php } else {
        echo "<script>alert('Acesso restrito.')</script>";
        echo "<script>location.href = ('index.php')</script>";
    }
    ?>
    <?php include "footer.php" ?>
</body>

</html>