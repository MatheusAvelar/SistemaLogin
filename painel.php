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
        <div>
        <center><h1 style="border:2px solid DodgerBlue;">Painel</h1></center>
        <?php testaConexaoBanco($conexao); ?>
        <a href="logout.php" style="padding-left:95%;">
            <button>Logout</button></a>
        <br />
        <br />
        <a href="impressaoUsuariosCadastrados.php">
            <button>Usuarios Cadastrados</button></a>
        <br />
        <br />
        <a href="verificaToken.php">
            <button>Envia Confirmação de Email</button>
        </a>
        <br />
        <br />
        <a href="confirmaToken.php">
            <button>Confirma Token</button></a>
        <br />
        <br />
        <a href="redefineSenha.php">
            <button>Redefinir Senha</button></a>
        <br />
        <br />
        <a href="validaEmailCpf.php">
            <button>Validação CPF e Email</button></a>
        <br />
        <br />
        <a href="celsius.php">
            <button>Conversão em Celsius</button></a>
        <br />
        <br />
        <a href="kelvin.php">
            <button>Conversão em Kelvin</button></a>
        <br />
        <br />
        <a href="fahrenheit.php">
            <button>Conversão em Fahrenheit</button></a>
        <br />
        <br />
        
        </div>
    </body>
</html>