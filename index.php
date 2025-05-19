<?php
session_start();
require "db.php";
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

    <!-- Hero -->
    <section id="inicio" class="hero">
        <div class="overlay">
            <div class="container">
                <h2>Bem-vindo!!</h2>
                <p>Cuidado psicológico com empatia, acolhimento e profissionalismo</p>
                <a href="agenda_consulta.php" class="btn" id="agenda-con" title="deixe de ser lelé da cuca!">Agendar Consulta</a>
            </div>
        </div>
    </section>

    <!-- Pacotes -->
    <section id="pacotes" class="pacotes">
        <div class="container">
            <h3>Pacotes de Atendimento</h3>
            <div class="pacotes-grid">
                <div class="pacote">
                    <h4>Consulta Individual</h4>
                    <p>Atendimento único, ideal para avaliação ou suporte pontual.</p>
                    <span class="preco">R$ ?</span>
                </div>
                <div class="pacote">
                    <h4>Pacote Mensal (4 Sessões)</h4>
                    <p>Acompanhamento contínuo com sessões semanais.</p>
                    <span class="preco">R$ ?</span>
                </div>
                <div class="pacote">
                    <h4>Pacote de 3 Meses (12 Sessões)</h4>
                    <p>Atendimento de psicoterapia breve.</p>
                    <span class="preco">R$ ?</span>
                </div>
            </div>
        </div>
    </section>
    <hr>

    <!-- Agendamento -->
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

    <!-- Login -->
    <section id="login" class="login-form">
        <div class="container">
            <h3>Área do Paciente</h3>
            <form action="processa_login_pac.php" method="POST">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required />

                <label for="senha">Senha</label>
                <input type="password" id="senha" name="senha" required />

                <button type="submit">Entrar</button>
            </form>
            <p class="cadastro-msg">Ainda não tem uma conta? <a href="cadastra_pac.php">Cadastre-se aqui</a></p>
            <p class="cadastro-msg"><a href="">Esqueceu a senha?</a></p>
            <p class="cadastro-msg"><a href="login_psi.php">Área do Profissional</a></p>
        </div>
    </section>

    <!-- Rodapé -->
    <footer>
        <div class="container">
            <p>&copy; 2025 Cautria Santos – Todos os direitos reservados.</p>
        </div>
    </footer>
    <script src="./bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>