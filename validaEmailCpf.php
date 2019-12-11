<?php
    include "include_Functions.php";
    iniciaSessao();
    include "include_ConexaoBanco.php";
    include "include_Redireciona.php";
    include "include_Layout.php";
?>
<html>
<head>
    <link rel="shortcut icon" href="https://cdn.icon-icons.com/icons2/2075/PNG/512/athletic_exercise_game_sport_tennis_training_icon_127157.png" type="image/x-icon" />
</head>
    <body>
        <center><h1 style="border:2px solid DodgerBlue;">Validação Email/CPF</h1></center>
        <a href="painel.php" style="padding-left:1px;"><button>Painel</button></a>
        <br>
        <br>
        <form name="signup" method="post" action="validaEmailCpf.php">
        Email:
        <input type="text" name="email" placeholder="Digite o Email" />
        <br />
        <br />

        <?php
        if(isset($_POST["email"])){
            validaEmail($_POST["email"]);
        }
        ?>
        CPF (Com Pontos e Hifen):
        <input type="text" name="cpf" placeholder="Com Pontos e Hifen" size="14" maxlength="14"/>
        <br />
        <br />
        <?php
        if(isset($_POST["cpf"])){
            validaCPFPontoHifen($_POST["cpf"]);
        }
        ?>
        <br />
        <br />
        <input type="submit" value="Validar" />
        <br />
        <br />
        <input type="button" value="Voltar" onClick="history.go(-1)">
    </body>
</html>
