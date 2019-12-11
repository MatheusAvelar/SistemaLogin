<?php
    include "include_Functions.php";
    iniciaSessao();
    include "include_Redireciona.php";
    include "include_Layout.php";
    include "include_ConexaoBanco.php";
?>
<html>
<head>
    <link rel="shortcut icon" href="https://cdn.icon-icons.com/icons2/2075/PNG/512/athletic_exercise_game_sport_tennis_training_icon_127157.png" type="image/x-icon" />
</head>
    <body>
    <center><h1 style="border:2px solid DodgerBlue;">Confirmação de Email</h1></center>
    <a href="painel.php" style="padding-left:1px;"><button>Painel</button></a>
    <form name="verificacao" method="POST" action="verificaToken.php">
        <br />
        <br /> Email:
        <input type="text" name="email"/>
        <br />
        <br />
        <input type="submit" value="Validar" />
        <br />
        <br />
        <?php
        if(isset($_POST['email'])){
            $email = $_POST['email'];
            $usuario = $_SESSION['usuario'];
            enviaTokenAleatorio($conexao,$email,$usuario);
        }
        ?>
    </form>
    <br />
    <br />
    <input type="button" value="Voltar" onClick="history.go(-1)">
    </body>
</html>
