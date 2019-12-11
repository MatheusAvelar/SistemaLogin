<?php
    include "include_Functions.php";
    include "include_Layout.php";
?>
<html>
    <head>
        <link rel="shortcut icon" href="https://cdn.icon-icons.com/icons2/2075/PNG/512/athletic_exercise_game_sport_tennis_training_icon_127157.png" type="image/x-icon" />
    </head>
    <body>
    <center><h1 style="border:2px solid DodgerBlue;">Confirmação de Email</h1></center>
    <fieldset>
    <form name="confirmacao" method="POST" action="enviaEmailConfirmacao.php">
        <br />
        <br /> Email:
        <input type="text" name="emailDestino"/>
        <br />
        <br />
        <input type="submit" value="Enviar" />
        <?php
        if(isset($_POST['emailDestino'])){
            $emailDestino = $_POST['emailDestino'];
            confirmacaoEmail($emailDestino);
        }
        ?>
    </form>
    <br />
    <br />
    <a href="index.php" style="padding-left:1px;"><button>Login</button></a>
    </fieldset>
    </body>
</html>
