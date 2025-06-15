<?php
session_start();
require "valida_permissao.php";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cautria Santos - Agendamento de Consultas Psicológicas</title>
    <link rel="stylesheet" href="./assets/styles/style-cadastra-user.css">
    <link rel="stylesheet" href="./assets/styles/style.css">
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baskervville&display=swap" rel="stylesheet">

    <!-- Validador de senha -->
    <script>
        var myInput = document.getElementById("psw");
        var letter = document.getElementById("letter");
        var capital = document.getElementById("capital");
        var number = document.getElementById("number");
        var length = document.getElementById("length");

        // When the user clicks on the password field, show the message box
        myInput.onfocus = function() {
            document.getElementById("message").style.display = "block";
        }

        // When the user clicks outside of the password field, hide the message box
        myInput.onblur = function() {
            document.getElementById("message").style.display = "none";
        }

        // When the user starts to type something inside the password field
        myInput.onkeyup = function() {
            // Validate lowercase letters
            var lowerCaseLetters = /[a-z]/g;
            if (myInput.value.match(lowerCaseLetters)) {
                letter.classList.remove("invalid");
                letter.classList.add("valid");
            } else {
                letter.classList.remove("valid");
                letter.classList.add("invalid");
            }

            // Validate capital letters
            var upperCaseLetters = /[A-Z]/g;
            if (myInput.value.match(upperCaseLetters)) {
                capital.classList.remove("invalid");
                capital.classList.add("valid");
            } else {
                capital.classList.remove("valid");
                capital.classList.add("invalid");
            }

            // Validate numbers
            var numbers = /[0-9]/g;
            if (myInput.value.match(numbers)) {
                number.classList.remove("invalid");
                number.classList.add("valid");
            } else {
                number.classList.remove("valid");
                number.classList.add("invalid");
            }

            // Validate length
            if (myInput.value.length >= 8) {
                length.classList.remove("invalid");
                length.classList.add("valid");
            } else {
                length.classList.remove("valid");
                length.classList.add("invalid");
            }
        }
    </script>
    <script>
        function validarConfirmacaoSenha() {
            const senha = document.getElementById('senha').value;
            const confirmarSenha = document.getElementById('confirmar_senha').value;
            const errorElement = document.getElementById('senhaError');

            if (senha && confirmarSenha && senha !== confirmarSenha) {
                errorElement.style.display = 'block';
                document.getElementById('confirmar_senha').setCustomValidity("As senhas não coincidem");
            } else {
                errorElement.style.display = 'none';
                document.getElementById('confirmar_senha').setCustomValidity("");
            }
        }

        // Adicionando validação ao enviar o formulário
        document.querySelector('form').addEventListener('submit', function(e) {
            validarConfirmacaoSenha();
            if (document.getElementById('confirmar_senha').validity.customError) {
                e.preventDefault();
            }
        });
    </script>
</head>

<body>
    <?php include "menu.php"; ?>
    <section id="agendamento" class="agendamento-form">
        <div class="container">
            <a href="javascript:history.back()" class="btn-voltar">
                <i class="fas fa-arrow-left"></i> Voltar
            </a>
            <h3>Cadastro</h3>
            <form method="post" action="processa_cadastra_psi.php">

                <div class="form-group with-icon">
                    <label for="nome">Nome Completo</label>
                    <div class="input-container">
                        <i class="fas fa-user input-icon"></i>
                        <input type="text" name="nome" id="nome" class="form-control" required
                            placeholder="Digite o nome do profissional">
                    </div>
                </div>

                <div class="form-group with-icon">
                    <label for="crp">CRP</label>
                    <div class="input-container">
                        <i class="fa-solid fa-hand-holding-heart input-icon"></i>
                        <input type="text" name="crp" maxlength="8" minlength="7" class="form-control" required
                            placeholder="Digite o CRP do profissional">
                    </div>
                </div>

                <div class="form-group with-icon">
                    <label for="email">E-mail</label>
                    <div class="input-container">
                        <i class="fas fa-envelope input-icon"></i>
                        <input type="email" name="email" id="email" class="form-control" required
                            placeholder="Digite o e-mail do profissional">
                    </div>
                </div>

                <div class="form-group with-icon">
                    <label for="senha">Senha</label>
                    <div class="input-container">
                        <i class="fas fa-lock input-icon"></i>
                        <input type="password" class="form-control" id="senha" name="senha" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                            title="A senha deve conter pelo menos um número, uma letra maiúscula, uma letra mínuscula e no mínimo 8 caracteres."
                            placeholder="Digite uma senha temporária" required>
                    </div>
                </div>
                <div class="form-group with-icon">
                    <label for="confirmar_senha">Confirmar Senha</label>
                    <div class="input-container">
                        <i class="fas fa-lock input-icon"></i>
                        <input type="password" class="form-control" id="confirmar_senha" name="confirmar_senha" required
                            placeholder="Digite a senha novamente" oninput="validarConfirmacaoSenha()">
                    </div>
                    <small id="senhaError" class="text-danger" style="display:none;">As senhas não coincidem!</small>
                </div>
                <input type="submit" class="btn-submit" value="Cadastrar">
            </form>
        </div>
    </section>
    <?php include "footer.php" ?>
</body>

</html>