<?php
session_start();
// require "valida_permissao.php";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cautria Santos - Agendamento de Consultas Psicológicas</title>
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
</head>

<body>
    <?php include "menu.php"; ?>
    <section id="agendamento" class="agendamento-form">
        <div class="container">
            <h3>Cadastro</h3>
            <form method="post" action="processa_cadastra_psi.php">
                <p>Nome: </p>
                <p><input type="text" name="nome" required></p>

                <p>CRP: </p>
                <p><input type="text" name="crp" maxlength="8" minlength="7"></p>

                <p>E-mail: </p>
                <p><input type="email" name="email" required></p>

                <p>Senha: </p>
                <p>
                    <input type="password" id="senha" name="senha" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                        title="A senha deve conter pelo menos um número, uma letra maiúscula, uma letra mínuscula e no mínimo 8 caracteres." required>
                </p>

                <p><input type="submit" value="Cadastrar"></p>
            </form>
        </div>
    </section>
    <?php include "footer.php" ?>
</body>

</html>