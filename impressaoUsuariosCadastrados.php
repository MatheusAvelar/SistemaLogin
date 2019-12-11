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
        <center><h1 style="border:2px solid DodgerBlue;">Lista de Usuarios Cadastrados</h1></center>
        <a href="painel.php" style="padding-left:1px;"><button>Painel</button></a>
        <br>
        <br>
        <?php
        imprimeUsuariosCadastrados($conexao);
        ?>
        <input type="button" value="Voltar" onClick="history.go(-1)">
    </body>
</html>