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
        <center>
            <h1 style="border:2px solid DodgerBlue;">Redefinição de Senha</h1></center>
            <a href="painel.php" style="padding-left:1px;"><button>Painel</button></a>
            <form name="signup" method="POST" action="redefineSenha.php">
                <br />
                <br /> Email:
                <input type="text" name="email" />
                <br />
                <br /> Nova Senha:
                <input type="password" name="novaSenha" />
                <br />
                <br />
                <input type="submit" value="Redefinir" />
                <br />
                <br />
                <?php
            if(isset($_POST['novaSenha']) && isset($_POST['email'])){
                verificaUsuario($conexao);
            } 
            ?>
            </form>
            <br />
            <br />
            <input type="button" value="Voltar" onClick="history.go(-1)">
    </body>

    </html>