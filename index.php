<?php
session_start();
require "db.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cautria Santos - Agendamento de Consultas Psicológicas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="./assets/styles/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baskervville&display=swap" rel="stylesheet">
</head>

<body>
    <?php include "menu.php" ?>

    <section id="inicio" class="hero">
        <div class="hero-content">
            <div class="hero-main">
                <h2>Bem-vindo!</h2>
                <p>Cuidado psicológico com empatia, acolhimento e profissionalismo</p>
                <a href="agenda_consulta.php" class="btn" title="Agendar Consulta">Agendar Consulta</a>
            </div>

            <div class="diferenciais">
                <div class="diferenciais-container">
                    <div class="diferencial-card">
                        <div class="diferencial-icon">
                            <i class="fas fa-lock"></i>
                        </div>
                        <h3>100% Confidencial</h3>
                        <p>Todas as suas sessões e informações são protegidas com sigilo absoluto.</p>
                    </div>
                    <div class="diferencial-card">
                        <div class="diferencial-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <h3>Agendamento 24h</h3>
                        <p>Disponível a qualquer momento para sua conveniência.</p>
                    </div>
                    <div class="diferencial-card">
                        <div class="diferencial-icon">
                            <i class="fas fa-laptop-house"></i>
                        </div>
                        <h3>Sessões On-line ou Presenciais</h3>
                        <p>Escolha o formato que melhor se adapta às suas necessidades.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pacotes -->
    <section id="pacotes" class="pacotes">
        <div class="container">
            <h3>Nossos Planos de Atendimento</h3>
            <div class="pacotes-grid">
                <div class="pacote">
                    <h4>Consulta Avulsa</h4>
                    <p>Sessão única para avaliação inicial ou orientação pontual, com duração de 50 minutos.</p>
                    <span class="preco">R$90,00</span>
                    <a href="agenda_consulta.php" class="btn-pacote">Agendar</a>
                </div>

                <div class="pacote">
                    <div class="destaque">Mais Popular</div>
                    <h4>Pacote Mensal</h4>
                    <p>4 sessões com 10% de desconto, acompanhamento contínuo para desenvolvimento pessoal.</p>
                    <span class="preco">R$320,00</span>
                    <a href="agenda_consulta.php" class="btn-pacote">Contratar</a>
                </div>

                <div class="pacote">
                    <h4>Pacote Trimestral</h4>
                    <p>12 sessões com 15% de desconto, ideal para psicoterapia breve com objetivos definidos.</p>
                    <span class="preco">R$910,00</span>
                    <a href="agenda_consulta.php" class="btn-pacote">Contratar</a>
                </div>
            </div>
        </div>
    </section>

    <section class="como-funciona">
        <h2 class="section-title">Como Funciona</h2>
        <div class="passos-container">
            <div class="passo">
                <div class="passo-numero">1</div>
                <h3>Selecione o horário</h3>
                <p>Veja a disponibilidade em tempo real e marque seu horário.</p>
            </div>
            <div class="passo">
                <div class="passo-numero">2</div>
                <h3>Pague online</h3>
                <p>Pagamento seguro via pix.</p>
            </div>
            <div class="passo">
                <div class="passo-numero">3</div>
                <h3>Receba o link da sessão</h3>
                <p>Para consultas online, você receberá o link por WhatsApp.</p>
            </div>
        </div>
    </section>

    <!-- Login -->
    <?php
    if (!isset($_SESSION["id_pac"]) && !isset($_SESSION["id_psi"])) {
    echo
        '<section id="login" class="login-form">
            <div class="login-container">
                <h3>Acesse sua Conta</h3>
                <form action="processa_login_pac.php" method="POST">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="Digite seu email" required />
                    </div>

                    <div class="form-group">
                        <label for="senha">Senha</label>
                        <input type="password" id="senha" name="senha" placeholder="Digite sua senha" required />
                    </div>

                    <button type="submit">Entrar</button>
                </form>

                <div class="form-footer">
                    <p>Ainda não tem uma conta? <a href="cadastra_pac.php" class="important-link">Cadastre-se aqui</a></p>
                    <!-- <p><a href="recupera_senha.php">Esqueceu sua senha?</a></p> -->
                    <p><a href="login_psi.php">Sou profissional</a></p>
                </div>
            </div>
        </section>';
    }
    ?>

    <!-- Rodapé -->
    <?php include "footer.php" ?>

</body>

</html>