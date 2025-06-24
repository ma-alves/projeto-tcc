<footer>
    <div class="footer-container">
        <div class="footer-col">
            <div class="footer-logo">
                <a href="index.php#inicio"><img src="./assets/imagens/Logo_semfundo.png-branca2.png" alt="Logo PsyAgenda"></a>
            </div>
            <p>Ajudo você a ter autoestima, autoconhecimento e equilíbrio.</p>
        </div>
        <div class="footer-col">
            <h3>Contato</h3>
            <div class="footer-contato">
                <p><i class="fas fa-phone"></i> (61) 8540-3292</p>
                <p><i class="fas fa-envelope"></i> cautria@gmail.com</p>
                <p><i class="fas fa-map-marker-alt"></i> Brasília, DF</p>
            </div>
        </div>
        <div class="footer-col">
            <h3>Links Úteis</h3>
            <ul class="footer-links">
                <li><a href="index.php#inicio">Início</a></li>
                <li><a href="index.php#pacotes">Pacotes</a></li>
                <li><a href="agenda_consulta.php#agendamento">Agendamento</a></li>
                <?php
                if (isset($_SESSION["id_pac"])) {
                    echo '<li><a href="exibe_pac.php?id=' . $_SESSION['id_pac'] . '">Perfil</a></li>';
                    echo '<li><a href="logout.php" class="link-btn" title="Logout"><i class="fa-solid fa-arrow-right-from-bracket"></i></a></li>';
                } elseif (isset($_SESSION["id_psi"])) {
                    echo '<li><a href="exibe_psi.php?id=' . $_SESSION['id_psi'] . '">Perfil</a></li>';
                    echo '<a href="logout.php" title="Logout"><i class="fa-solid fa-arrow-right-from-bracket"></i></a>';
                } else {
                    echo '<li><a href="index.php#login">Login</a></li>';
                } ?>
            </ul>
        </div>
        <div class="footer-col">
            <h3>Redes Sociais</h3>
            <div class="social-icons">
                <a href="https://api.whatsapp.com/send?phone=556185403292&text=ol%C3%A1%2C+tenho+interesse+em+uma+consulta"><i class="fab fa-whatsapp"></i></a>
                <a href="https://www.instagram.com/psicautriasantos/"><i class="fab fa-instagram"></i></a>
                <a href="https://www.facebook.com/PsiCautriasantos/"><i class="fab fa-facebook-f"></i></a>
                <a href="https://www.linkedin.com/in/cautria-santos-4a4365202/"><i class="fab fa-linkedin-in"></i></a>
                <a href="https://www.threads.com/@psicautriasantos?xmt=AQF08I11tLo30j4Q2Gu_Z4P7XNZS6KshMiRdf4ssWctJDro"><i class="fab fa-threads"></i></a>
            </div>
        </div>
    </div>
    <div class="copyright">
        <p>&copy; 2025 TCC - Escola Técnica de Brasília | Todos os direitos reservados.</p>
    </div>
</footer>
<script src="./bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>