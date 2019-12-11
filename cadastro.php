<?php
    include "include_Functions.php";
    include "include_Layout.php";
    include "include_ConexaoBanco.php";
?>
<html>
<head>
    <link rel="shortcut icon" href="https://cdn.icon-icons.com/icons2/2075/PNG/512/athletic_exercise_game_sport_tennis_training_icon_127157.png" type="image/x-icon" />
</head>
<body>
<center><h1 style="border:2px solid DodgerBlue;">Cadastro</h1></center>
<form name="signup" method="post" action="cadastro.php">
        <br />
        <br /> Nome:
        <input type="text" name="nome" placeholder="Digite seu Nome Completo" required/>
        <br />
        <br /> Data Nascimento:
        <input type="date" name="dataNasc" placeholder="Somente numeros" required/>
        <br />
        <br /> CPF:
        <input type="text" name="cpfFuncionario" placeholder="Digite o CPF" required/>
        <br />
        <br /> Sexo: <select name="sexo" required>
            <option value="Por favor, selecione...">Por favor, selecione...</option>
            <option value="Masculino">Masculino</option>
            <option value="Feminino">Feminino</option>
            </select>
        <br />
        <br /> Telefone Fixo:
        <input type="text" name="telefoneFixo" placeholder="Digite o Telefone Fixo" required/>
        <br />
        <br /> Telefone Celular:
        <input type="text" name="telefoneCelular" placeholder="Digite o Telefone Celular" required/>
        <br />
        <br /> Email:
        <input type="text" name="email" placeholder="Digite o Email" required/>
        <br />
        <br /> CEP:
        <input type="text" name="cep" placeholder="Digite o CEP" required/>
        <br />
        <br /> Rua:
        <input type="text" name="rua" placeholder="Digite a Rua" required/>
        <br />
        <br /> Numero:
        <input type="text" name="numero" placeholder="Digite o Numero" required/>
        <br />
        <br /> Bairro:
        <input type="text" name="bairro" placeholder="Digite o Bairro" required/>
        <br />
        <br /> Cidade:
        <input type="text" name="cidade" placeholder="Digite a Cidade" required/>
        <br />
        <br /> Estado:
        <input type="text" name="uf" placeholder="Digite o Estado" required/>
        <br />
        <br /> Estado Civil: <select name="estadoCivil" required>
            <option value="Por favor, selecione...">Por favor, selecione...</option>
            <option value="Solteiro(a)">Solteiro(a)</option>
            <option value="Casado(a)">Casado(a)</option>
            <option value="Viuvo(a)">Viuvo(a)</option>
            </select>
        <br />
        <br /> Usuario:
        <input type="text" name="usuario" placeholder="Digite um Usuario" required/>
        <br />
        <br /> Senha:
        <input type="password" name="senha" placeholder="Digite uma Senha" required/>
        <br />
        <br /> 
        <input type="submit" value="Cadastrar" />
        <br />
        <br /> 
        <?php
        if(isset($_POST['usuario']) && isset($_POST['senha'])){
            cadastraFuncionario($conexao);
        }
        ?>
    <br />
    <br />    
    <input type="button" value="Voltar" onClick="history.go(-1)">
</form>
</body>

</html>