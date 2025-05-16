<header>
    <nav class="topo">
        <div class="logo">
            <a href="index.php#inicio"><img src="./assets/imagens/Logo_semfundo.png-branca2.png"></a>
        </div>
        <div class="menu">
            <ul>
                <li class="nav-item"><a href="index.php#inicio" class="nav-link" id="menu-link">Início</a></li>
                <li><a href="index.php#pacotes" id="menu-link">Pacotes</a></li>
                <li><a href="agenda_consulta.php#agendamento" id="menu-link">Agendamento</a></li>
                <?php
                if (isset($_SESSION["id_pac"])) {
                    echo '<li><a href="exibe_pac.php?id=' . $_SESSION['id_pac'] . '" class="link-btn">Perfil</a></li>';
                } elseif (isset($_SESSION["id_psi"])) {
                    echo '<li><a href="exibe_psi.php?id=' . $_SESSION['id_psi'] . '" class="link-btn">Perfil</a></li>';
                } else {
                    echo '<li><a href="index.php#login" class="link-btn">Login</a></li>';
                }
                ?>
            </ul>
        </div>
    </nav>
</header>