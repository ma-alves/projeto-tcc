<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="assets/styles/layout.css">
    <title>Cautria Santos</title>
</head>

<body>
    <div class="login-container">
        <h2>Login Paciente</h2>
        <form action="processa_login_pac.php" method="POST">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="senha" placeholder="Senha" required>
            <input type='submit' value='Entrar'>
        </form>
    </div>
</body>

</html>