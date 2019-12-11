<?php
    include "include_Functions.php";
    include "include_ConexaoBanco.php";
    include "include_Layout.php";
    
?>
<html>
    <head>
        <center><h1 style="border:2px solid DodgerBlue;">Fale Conosco<h1></center>
        <link rel="shortcut icon" href="https://cdn.icon-icons.com/icons2/2075/PNG/512/athletic_exercise_game_sport_tennis_training_icon_127157.png" type="image/x-icon" />
    </head>
    <a href="painel.php"style="padding-left:1px;"><button>Painel</button></a><br><br>
    <body>   
    <fieldset style = "width: 50%; margin: 5% auto;">
    <center><h1>Mensagem</h1>
            <form method="POST" action="faleConosco.php" type="text">
                <br /> 
                <br /> Tipo: <select name="select" style="width: 73.5%; height: 3.2%;" required>
                <option value="Por favor, selecione...">Por favor, selecione...</option>
                <option value="Sugestao">Sugestão</option>
                <option value="Critica">Crítica</option>
                <option value="Elogio">Elogio</option>
                </select>
                <br />
                <br /> Email:
                <input type="text" name="email" placeholder="Digite o Email" style="width:72.5%; height:3.2%;" required/>
                <br />
                <br /> Assunto:
                <input type="text" name="assunto" placeholder="Digite o Assunto" style="width:70%; height:3.2%;" required/>
                <br />
                <br />
                <textarea name="texto" placeholder="Digite a Mensagem" style="width:80%; height:15%;"></textarea>
                <br />
                <br />
    <center><input type="submit" value="Enviar" /> <input type="reset" value="Limpar Formulário" />
    <br />
    <?php 
    if (isset($_POST['email']) && isset($_POST['assunto']) && isset($_POST['texto'])) {
        enviaEmail($_POST['email'],$_POST['assunto'],$_POST['texto'],$_POST['select'],$conexao);
        echo "<center><b><br />Email enviado com sucesso !</b></center>";
    }
    ?>
    </center>
    </form>
    </center>
    </fieldset>
    <input type="button" value="Voltar" onClick="history.go(-1)">
    </body>
</html>