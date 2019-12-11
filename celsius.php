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
            <h1 style="border:2px solid DodgerBlue;">Conversao Temperatura</h1></center>
        <a href="painel.php" style="padding-left:1px;"><button>Painel</button></a>
        <br>
        <br>
        <form action="celsius.php" method="get">
            Temperatura em Graus Celsius:
        <input type="text" name="temperaturaCelsius">
        <input type="submit" value="Calcular">
        </form>
        <?php
            if(isset($_GET["temperaturaCelsius"])){
                $_GET["temperaturaCelsius"] = 0;
            }
            if(isset($_GET["temperaturaCelsius"])){
            $celsius = $_GET["temperaturaCelsius"];
            $kelvin = $celsius + 273.15;
            $fahrenheit = $celsius*9/5+32;
            echo "Celsius é de $celsius";
            echo "</br>";  
            echo "Kelvin é de $kelvin";
            echo "</br>";
            echo "Fahrenheit é de $fahrenheit";    
            echo "</br>";
            }
        ?>
        <br>
        <input type="button" value="Voltar" onClick="history.go(-1)">
    </body>
</html>