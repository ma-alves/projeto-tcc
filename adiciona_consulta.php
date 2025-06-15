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
    <link rel="stylesheet" href="./assets/styles/style-cadastra-user.css">
    <link rel="stylesheet" href="./assets/styles/style.css">
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baskervville&display=swap" rel="stylesheet">
    <title>Cautria Santos - Agendamento de Consultas Psicológicas</title>
</head>

<body>
    <?php include "menu.php"; ?>
    <section id="agendamento" class="agendamento-form">
        <div class="container">
            <a href="javascript:history.back()" class="btn-voltar">
                <i class="fas fa-arrow-left"></i> Voltar
            </a>
            <!-- Consulta Avulsa -->
            <h3>Adicionar Consulta</h3>
            <form method="post" action="processa_adiciona_consulta.php">

                <div class="form-group with-icon">
                    <label for="data">Data</label>
                    <div class="input-container">
                        <input type="date" name="data" id="data" class="form-control" required>
                    </div>
                </div>

                <div class="form-group with-icon">
                    <label for="hora">Hora</label>
                    <div class="input-container">
                        <input type="time" name="hora" id="hora" class="form-control" required>
                    </div>
                </div>

                <div class="form-group with-icon">
                    <label for="valor">Valor</label>
                    <div class="input-container">
                        <i class="fa-solid fa-dollar-sign input-icon"></i>
                        <input type="number" name="valor" id="valor" value="90" class="form-control" required>
                    </div>
                </div>
                <input type="submit" class="btn-submit" value="Adicionar">
            </form>
        </div>
    </section>

    <!-- Pacote Mensal -->
    <section id="agendamento" class="agendamento-form">
        <div class="container">
            <h3>Adicionar Pacote Mensal</h3>
            <form method="post" action="processa_adiciona_pacote_mensal.php">

                <div class="form-group with-icon">
                    <label for="data">Data</label>
                    <div class="input-container">
                        <input type="date" name="data1" id="data1" class="form-control" required>
                    </div>
                </div>
                <div class="form-group with-icon">
                    <label for="data">Data</label>
                    <div class="input-container">
                        <input type="date" name="data2" id="data2" class="form-control" required>
                    </div>
                </div>
                <div class="form-group with-icon">
                    <label for="data">Data</label>
                    <div class="input-container">
                        <input type="date" name="data3" id="data3" class="form-control" required>
                    </div>
                </div>
                <div class="form-group with-icon">
                    <label for="data">Data</label>
                    <div class="input-container">
                        <input type="date" name="data4" id="data4" class="form-control" required>
                    </div>
                </div>

                <div class="form-group with-icon">
                    <label for="hora">Hora</label>
                    <div class="input-container">
                        <input type="time" name="hora" id="hora" class="form-control" required>
                    </div>
                </div>

                <div class="form-group with-icon">
                    <label for="valor">Valor</label>
                    <div class="input-container">
                        <i class="fa-solid fa-dollar-sign input-icon"></i>
                        <input type="number" name="valor" id="valor" value="320" class="form-control" required>
                    </div>
                </div>
                <input type="submit" class="btn-submit" value="Adicionar">
            </form>
        </div>
    </section>
    
    <!-- Pacote Trimestral -->
    <section id="agendamento" class="agendamento-form">
        <div class="container">
            <h3>Adicionar Pacote Trimestral</h3>
            <form method="post" action="processa_adiciona_pacote_trimestral.php">
                
                <div class="form-group with-icon">
                    <label for="data">Data</label>
                    <div class="input-container">
                        <input type="date" name="data1" id="data1" class="form-control" required>
                    </div>
                </div>

                <div class="form-group with-icon">
                    <label for="data">Data</label>
                    <div class="input-container">
                        <input type="date" name="data2" id="data2" class="form-control" required>
                    </div>
                </div>

                <div class="form-group with-icon">
                    <label for="data">Data</label>
                    <div class="input-container">
                        <input type="date" name="data3" id="data3" class="form-control" required>
                    </div>
                </div>

                <div class="form-group with-icon">
                    <label for="data">Data</label>
                    <div class="input-container">
                        <input type="date" name="data4" id="data4" class="form-control" required>
                    </div>
                </div>

                <div class="form-group with-icon">
                    <label for="data">Data</label>
                    <div class="input-container">
                        <input type="date" name="data5" id="data5" class="form-control" required>
                    </div>
                </div>

                <div class="form-group with-icon">
                    <label for="data">Data</label>
                    <div class="input-container">
                        <input type="date" name="data6" id="data6" class="form-control" required>
                    </div>
                </div>

                <div class="form-group with-icon">
                    <label for="data">Data</label>
                    <div class="input-container">
                        <input type="date" name="data7" id="data7" class="form-control" required>
                    </div>
                </div>

                <div class="form-group with-icon">
                    <label for="data">Data</label>
                    <div class="input-container">
                        <input type="date" name="data8" id="data8" class="form-control" required>
                    </div>
                </div>

                <div class="form-group with-icon">
                    <label for="data">Data</label>
                    <div class="input-container">
                        <input type="date" name="data9" id="data9" class="form-control" required>
                    </div>
                </div>

                <div class="form-group with-icon">
                    <label for="data">Data</label>
                    <div class="input-container">
                        <input type="date" name="data10" id="data10" class="form-control" required>
                    </div>
                </div>

                <div class="form-group with-icon">
                    <label for="data">Data</label>
                    <div class="input-container">
                        <input type="date" name="data11" id="data11" class="form-control" required>
                    </div>
                </div>

                <div class="form-group with-icon">
                    <label for="data">Data</label>
                    <div class="input-container">
                        <input type="date" name="data12" id="data12" class="form-control" required>
                    </div>
                </div>

                <div class="form-group with-icon">
                    <label for="hora">Hora</label>
                    <div class="input-container">
                        <input type="time" name="hora" id="hora" class="form-control" required>
                    </div>
                </div>

                <div class="form-group with-icon">
                    <label for="valor">Valor</label>
                    <div class="input-container">
                        <i class="fa-solid fa-dollar-sign input-icon"></i>
                        <input type="number" name="valor" id="valor" value="910" class="form-control" required>
                    </div>
                </div>
                <input type="submit" class="btn-submit" value="Adicionar">
            </form>
        </div>
    </section>
    <?php include "footer.php" ?>
</body>

</html>