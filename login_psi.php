<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="./assets/styles/style-login-psi.css">
    <link rel="stylesheet" href="./assets/styles/style.css">
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baskervville&display=swap" rel="stylesheet">
    <title>Cautria Santos - Área do Profissional</title>
</head>

<body>
    <div class="login-container">
        <a href="javascript:history.back()" class="btn-voltar">
            <i class="fas fa-arrow-left"></i> Voltar
        </a>
        <h2 class="login-title">Área do Profissional</h2>
        <form action="processa_login_psi.php" method="POST">
            <div class="form-group with-icon">
                <label for="email">E-mail Profissional</label>
                <div class="input-container">
                    <i class="fas fa-envelope input-icon"></i>
                    <input type="email" class="form-control" id="email" name="email" required placeholder="seu@email.com">
                </div>
            </div>
            <div class="form-group with-icon">
                <label for="senha">Senha</label>
                <div class="input-container">
                    <i class="fas fa-lock input-icon"></i>
                    <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite sua senha" required>
                </div>
            </div>
            <button type="submit" class="btn-login">Acessar Plataforma</button>

            <div class="login-footer">
                <a href="recuperar_senha.php"><i class="fas fa-key"></i> Recuperar Senha</a>
            </div>
        </form>
    </div>
</body>

</html>

</html>

</html>