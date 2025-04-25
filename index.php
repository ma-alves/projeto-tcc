<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Clínica Equilíbrio Mental</title>
    <link rel="stylesheet" href="./assets/styles/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baskervville&display=swap" rel="stylesheet">
</head>

<body>
<header>

    <!-- Cabeçalho -->
    <header>
        <nav class="topo">
            <div class="logo">
                <img src="./assets/imagens/Logo_semfundo.png-branca2.png">
            </div>
            <div class="menu">
                <ul>
                    <li><a href="#inicio" class="link-btn">Início</a></li>
                    <li><a href="#pacotes" class="link-btn">Pacotes</a></li>
                    <li><a href="#agendamento" class="link-btn">Agendamento</a></li>
                    <li><a href="#login" class="link-btn">Login</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Hero -->
    <section id="inicio" class="hero">
        <div class="overlay">
            <div class="container">
                <h2>Bem-vindo à Clínica Equilíbrio Mental</h2>
                <p>Cuidado psicológico com empatia, acolhimento e profissionalismo</p>
                <a href="#agendamento" class="btn">Agendar Consulta</a>
            </div>
        </div>
    </section>

    <!-- Pacotes -->
    <section id="pacotes" class="pacotes">
        <div class="container">
            <h3>Pacotes de Atendimento</h3>
            <div class="pacotes-grid">
                <div class="pacote">
                    <img src="https://images.unsplash.com/photo-1588776814546-ec70c0b1fe49" alt="Consulta individual">
                    <h4>Consulta Individual</h4>
                    <p>Atendimento único, ideal para avaliação ou suporte pontual.</p>
                    <span class="preco">R$ 150,00</span>
                </div>
                <div class="pacote">
                    <img src="https://images.unsplash.com/photo-1526256262350-7da7584cf5eb" alt="Pacote mensal">
                    <h4>Pacote Mensal (4 Sessões)</h4>
                    <p>Acompanhamento contínuo com sessões semanais.</p>
                    <span class="preco">R$ 520,00</span>
                </div>
                <div class="pacote">
                    <img src="https://images.unsplash.com/photo-1573497019400-0427f2f5d3b2" alt="Terapia de casal">
                    <h4>Terapia de Casal</h4>
                    <p>Atendimento conjunto com foco em relacionamento saudável.</p>
                    <span class="preco">R$ 200,00 por sessão</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Agendamento -->
    <section id="agendamento" class="agendamento-form">
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
    </section>

    <!-- Login -->
    <section id="login" class="login-form">
        <div class="container">
            <h3>Área do Paciente</h3>
            <form action="processa_login_pac.php" method="POST">
                <label for="email_pac">Email</label>
                <input type="email" id="email_pac" name="email_pac" required />

                <label for="senha_pac">Senha</label>
                <input type="password" id="senha_pac" name="senha_pac" required />

                <button type="submit">Entrar</button>
            </form>
            <p class="cadastro-msg">Ainda não tem uma conta? <a href="cadastra_pac.php">Cadastre-se aqui</a></p>
            <p class="cadastro-msg"><a href="login_psi.php">Área do Profissional</a></p>
        </div>
    </section>

    <!-- Rodapé -->
    <footer>
        <div class="container">
            <p>&copy; 2025 Clínica Equilíbrio Mental – Todos os direitos reservados.</p>
        </div>
    </footer>
    <script src="script.js"></script>
</body>

</html>