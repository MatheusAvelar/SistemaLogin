<?php
    include "include_Functions.php";
    include "include_ConexaoBanco.php";
    include "include_Layout.php";
?>
<html>
<head>
<link rel="shortcut icon" href="https://cdn.icon-icons.com/icons2/2075/PNG/512/athletic_exercise_game_sport_tennis_training_icon_127157.png" type="image/x-icon" />
</head>
<body>
    <center><h1 style="border:2px solid DodgerBlue;">Esqueci a Senha !</h1></center>
    <a href="index.php" style="padding-left:1px;"><button>Login</button></a>
    <br>
    <br>
    <form name="signup" method="post" action="esqueceuSenha.php">
    Email:
    <input type="text" name="email" placeholder="Digite o Email" />
    <br />
    <br />
    <input type="submit" value="Enviar" />
    <br />
    <br />
    <?php
    if(isset($_POST["email"])){
        $email = $_POST['email'];
        esqueceuSenha($conexao,$email);
    }
    ?>
    <br />
    <br />
    <input type="button" value="Voltar" onClick="history.go(-1)">
</body>
</html>
