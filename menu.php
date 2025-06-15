<header>
    <nav class="navbar">
        <div class="logo">
            <a href="index.php#inicio"><img src="./assets/imagens/Logo_semfundo.png-branca2.png" alt="Logo Cautria Santos"></a>
        </div>
        <div class="menu">
            <ul>
                <li><a href="index.php#inicio" class="menu-link">Início</a></li>
                <li><a href="index.php#pacotes" class="menu-link">Pacotes</a></li>
                <li><a href="agenda_consulta.php#agendamento" class="menu-link">Agendamento</a></li>
                <?php
                if (isset($_SESSION["id_pac"])) {
                    echo '<li><a href="exibe_pac.php?id=' . $_SESSION['id_pac'] . '" class="link-btn">Perfil</a></li>';
                    echo '<li><a href="logout.php" class="link-btn" title="Logout"><i class="fa-solid fa-arrow-right-from-bracket"></i></a></li>';
                } elseif (isset($_SESSION["id_psi"])) {
                    echo '<li><a href="exibe_psi.php?id=' . $_SESSION['id_psi'] . '" class="link-btn">Perfil</a></li>';
                    echo '<li><a href="logout.php" class="link-btn" title="Logout"><i class="fa-solid fa-arrow-right-from-bracket"></i></a></li>';
                } else {
                    echo '<li><a href="index.php#login" class="link-btn" id="login-btn">Login</a></li>';
                }
                ?>
            </ul>
        </div>
    </nav>
</header>