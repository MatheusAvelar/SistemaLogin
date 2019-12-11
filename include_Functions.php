<?php
function enviaEmail($email, $assunto, $texto, $tipo, $conexao) {
    $query = "INSERT INTO FALECONOSCO (email,assunto,texto,tipoAssunto) VALUES('$email','$assunto','$texto','$tipo')";
    $sql = mysqli_query($conexao, $query);
    mysqli_insert_id($conexao);
    if (!mysqli_insert_id($conexao)) {
        ini_set('display_errors', 1);
        error_reporting(E_ALL);
        /*$emailDestino = "suporte@ligaprojetos.ml";*/
        $emailDestino = "matheus_valladao@hotmail.com"; //Email Destinatario
        $headers = "from:.$email"; //Email Remetente
        mail($emailDestino, $assunto.' - '.$tipo, $texto, $headers);
        /*echo "<b>Email enviado !</b><br />";*/
    } else {
        echo "<b>Dados Incorretos !</b><br />";
    }
}

function imprimeUsuariosCadastrados($conexao) {
    $query = mysqli_query($conexao,"SELECT * FROM FUNCIONARIO");
  
    while($aux = mysqli_fetch_assoc($query)) { 
        echo "-----------------------------------------<br />"; 
        echo "Função: ".$aux["idFuncao"]."<br />"; 
        echo "Nome: ".$aux["nome"]."<br />"; 
        echo "Sexo: ".$aux["sexo"]."<br />"; 
        echo "Cidade: ".$aux["telefoneCelular"]."<br />";
        echo "Estado: ".$aux["telefoneFixo"]."<br />";
        echo "Email: ".$aux["email"]."<br />";
        echo "Cidade: ".$aux["cidade"]."<br />";
        echo "Estado: ".$aux["uf"]."<br /><br />";
    }
}

function validaConexao($conexao) {
    $usuario=$_POST['nome'];
    $senha=$_POST['senha'];
    $query = mysqli_query($conexao,"SELECT * FROM FUNCIONARIO WHERE nome = '$usuario' and senha = '$senha'");
    $row = mysqli_num_rows($query);
    if($row>0){
        $_SESSION['nome']=$_POST['nome'];
        $_SESSION['senha']=$_POST['senha'];

        echo "<center><b><p>Você foi autenticado com sucesso! Aguarde um instante.</p></b></center>";
        redirecionaPainel();      
    } else {
        echo "<center><b><p>Nome de usuario ou senha invalidos!</p></b></center>";
        redirecionaAcesso();
    }
}

function testaConexaoBanco($conexao) {
    ?>
    <script type="text/javascript">
    function redirecionaPainel() {
        setTimeout("window.location='painel.php'", 2000);
    }
    </script><?php
    if (!$conexao) {
        echo "<left><b>Banco de Dados - Desconectado !</b></left><br />";
        echo "<br />Erro na Conexão !". PHP_EOL;
        echo "<br />Erro Code: ". mysqli_connect_errno().PHP_EOL;
        echo "<br />Error: Description".mysqli_connect_error().PHP_EOL;
    } else {
        echo "<left><b>Banco de Dados - Conectado !</b></left><br />";
        /*echo "<script>redirecionaPainel()</script>";*/
    }
}

function autenticaUsuario($conexao) {
    ?>
    <script type="text/javascript">
    function redirecionaPainel() {
        setTimeout("window.location='painel.php'", 1500);
    }
    function redirecionaIndex() {
        setTimeout("window.location='index.php'", 1500);
    }
    </script>
    <?php
    $usuario = $_POST['usuario'];
    $senha   = md5($_POST['senha']);
    $query   = mysqli_query($conexao,"SELECT * FROM FUNCIONARIO WHERE usuario = '$usuario' and senha = '$senha'");
    $row     = mysqli_num_rows($query);
    
    if($row>0){
        $_SESSION['usuario'] = $usuario;
        $_SESSION['senha']   = $senha;
        ?>
        <div class="alert alert-success" role="alert">
        <center>Autenticado com sucesso!</center>
        </div> 
        <?php
        echo "<script>redirecionaPainel()</script>";      
    } else {
        ?>
        <div class="alert alert-danger" role="alert">
        <center>Usuario ou Senha invalidos !</center>
        </div> 
        <?php
        echo "<script>redirecionaIndex()</script>"; 
    }
}

function logout() {?>
    <script type="text/javascript">
    function usuariodesconectado() {
        setTimeout("window.location='index.php'", 2000);
    }
    </script><?php
    session_destroy();  
    echo "<center><h3><b>Você foi Desconectado !</b></h3></center><br><br>";
    echo "<script>usuariodesconectado()</script>";
}

function iniciaSessao() {
    session_start();
}

function cadastraCliente($conexao) {
    $nome = $_POST['nome'];
    $cpfCliente = $_POST['cpfCliente'];
    $dataNasc = $_POST['dataNasc'];
    $sexo = $_POST['sexo'];
    $telefoneFixo = $_POST['telefoneFixo'];
    $telefoneCelular = $_POST['telefoneCelular'];
    $email = $_POST['email'];
    $cep = $_POST['cep'];
    $rua = $_POST['rua'];
    $numero = $_POST['numero'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $uf = $_POST['uf'];
    $estadoCivil = $_POST['estadoCivil'];
    $filhos = $_POST['filhos'];
    $escolaridade = $_POST['escolaridade'];
    $profissao = $_POST['profissao'];
    $observacao = $_POST['observacao'];
    $indicacao = $_POST['indicacao'];

    $query = "INSERT INTO CLIENTE(nome, cpfCliente, dataNasc, sexo, telefoneFixo, telefoneCelular, email, cep, rua, numero, bairro, cidade, uf, estadoCivil, filhos, escolaridade, profissao, observacao, indicacao) VALUES('$nome', '$cpfCliente', '$dataNasc', '$sexo', '$telefoneFixo', '$telefoneCelular', '$email', '$cep', '$rua', '$numero', '$bairro', '$cidade', '$uf', '$estadoCivil', '$filhos', '$escolaridade', '$profissao', '$observacao', '$indicacao')";
    $sql = mysqli_query($conexao,$query);
    if(mysqli_insert_id($conexao)){
        ?>
        <div class="alert alert-success" role="alert">
        <center>Cadastrado concluido !</center>
        </div> 
        <?php
    }
}

function cadastraFuncionario($conexao){
    $nome            = $_POST['nome'];
    $cpfFuncionario  = $_POST['cpfFuncionario'];
    $dataNasc        = $_POST['dataNasc'];
    $sexo            = $_POST['sexo'];
    $telefoneFixo    = $_POST['telefoneFixo'];
    $telefoneCelular = $_POST['telefoneCelular'];
    $email           = $_POST['email'];
    $cep             = $_POST['cep'];
    $rua             = $_POST['rua'];
    $numero          = $_POST['numero'];
    $bairro          = $_POST['bairro'];
    $cidade          = $_POST['cidade'];
    $uf              = $_POST['uf'];
    $estadoCivil     = $_POST['estadoCivil'];
    $usuario         = $_POST['usuario'];
    $senha           = MD5($_POST['senha']);

    $query = "INSERT INTO FUNCIONARIO(nome, cpfFuncionario, dataNasc, sexo, telefoneFixo, telefoneCelular, email, cep, rua, numero, bairro, cidade, uf, estadoCivil, usuario, senha, emailConfirmacao) VALUES('$nome','$cpfFuncionario','$dataNasc','$sexo','$telefoneFixo','$telefoneCelular','$email','$cep','$rua','$numero','$bairro','$cidade','$uf','$estadoCivil','$usuario','$senha','Invalido')";
    if(mysqli_query($conexao,$query)){
        echo "<b>Usuario criado !</b><br />";
    } else {
        echo "<b>Usuario não criado !</b><br />";
    }
}

function cadastraToken($conexao,$codigo,$email,$usuario){
    $query = mysqli_query($conexao,"INSERT INTO TOKEN (usuario,email,token) VALUES ('$usuario','$email','$codigo')");
    if(!$query){
        echo "<b>Token não cadastrado !</b><br />";
    }/* else {
        echo "<b>Cadastrado!</b>";
    }*/
}

function cadastraFuncao($conexao) {
    $nomeFuncao = $_POST['nomeFuncao'];
    $setorFuncao = $_POST['setorFuncao'];

    $query = "INSERT INTO FUNCAO(nomeFuncao, setorFuncao) VALUES('$nomeFuncao', '$setorFuncao')";
    if(mysqli_query($conexao,$query)){
        ?>
        <div class="alert alert-success" role="alert">
        <center>Cadastrado concluido !</center>
        </div> 
        <?php
    }
}

function cadastraProcedimento($conexao) {
    $cpfFuncionario = $_POST['cpfFuncionario'];
    $nomeProcedimento = $_POST['nomeProcedimento'];
    $valorProcedimento = $_POST['valorProcedimento'];

    $query = "INSERT INTO PROCEDIMENTO (cpfFuncionario, nomeProcedimento, valorProcedimento) VALUES ('$cpfFuncionario', '$nomeProcedimento', '$valorProcedimento')";
    if(mysqli_query($conexao,$query)){
        ?>
        <div class="alert alert-success" role="alert">
        <center>Cadastrado concluido !</center>
        </div> 
        <?php
    }
}

function validaCPFApenasNumeros($cpf) {
    $mult1 = $cpf[0]*10+$cpf[1]*9+$cpf[2]*8+$cpf[3]*7+$cpf[4]*6+$cpf[5]*5+$cpf[6]*4+$cpf[7]*3+$cpf[8]*2;
    $resto1 = ($mult1%11);
    if($resto1>=2){
        $num1=11-$resto1;
    } else{	
        $num1=0;
    }
    //Conta para o Decimo Primeiro Digito
    $mult2 = $cpf[0]*11+$cpf[1]*10+$cpf[2]*9+$cpf[3]*8+$cpf[4]*7+$cpf[5]*6+$cpf[6]*5+$cpf[7]*4+$cpf[8]*3+$num1*2;
    $resto2 = ($mult2%11);

    if($resto2>=2) {
        $num2=11-$resto2;
    } else {	
        $num2=0;
    }	
    if($cpf[9]==$num1) {
        if($cpf[10]==$num2){
        echo "\tValido";
        echo "</br>";
        } else {
        echo "\tInvalido";
        echo "</br>";
        }
    } else {
        echo "\tInvalido";
        echo "</br>";
    }
}

function validaCPFHifenPonto($cpf) {
    
    //Conta para o Decimo Digito
    $quebra  = explode(".", $cpf);
    $quebra2 = explode("-", $quebra[2]);
    $junta   = $quebra[0].$quebra[1].$quebra2[0].$quebra2[1];
    $mult1   = $junta[0]*10+$junta[1]*9+$junta[2]*8+$junta[3]*7+$junta[4]*6+$junta[5]*5+$junta[6]*4+$junta[7]*3+$junta[8]*2;
    $resto1  = ($mult1%11);
    
    if($resto1>=2){
        $num1=11-$resto1;
    } else{	
        $num1=0;
    }
    //Conta para o Decimo Primeiro Digito
    $mult2 = $junta[0]*11+$junta[1]*10+$junta[2]*9+$junta[3]*8+$junta[4]*7+$junta[5]*6+$junta[6]*5+$junta[7]*4+$junta[8]*3+$num1*2;
    $resto2 = ($mult2%11);

    if($resto2>=2){
        $num2=11-$resto2;
    } else{	
        $num2=0;
    }	

    if($junta[9]==$num1){
        if($junta[10]==$num2){
        echo "\tValido";
        echo "</br>";
        } else{
        echo "\tInvalido";
        echo "</br>";
        }
    } else{
        echo "\tInvalido";
        echo "</br>";
    }
}

function validaCPFPontoHifen($cpf) {
    if (preg_match('/^[0-9]{3}\.[0-9]{3}\.[0-9]{3}\-([0-9]{2})$/', $cpf, $partes)){
        $digito_verificador = $partes[1];
        $teste = $partes[0];
        $mult1   = $cpf[0] * 10 + $cpf[1] * 9 + $cpf[2] * 8 + $cpf[4] * 7 + $cpf[5] * 6 + $cpf[6] * 5 + $cpf[8] * 4 + $cpf[9] * 3 + $cpf[10] * 2;
        $resto1  = ($mult1 % 11);
        
        if($resto1 >= 2){
            $num1 = 11 - $resto1;
        } else{	
            $num1 = 0;
        }	
        
        $mult2 = $cpf[0] * 11 + $cpf[1] * 10 + $cpf[2] * 9 + $cpf[4] * 8 + $cpf[5] * 7 + $cpf[6] * 6 + $cpf[8] * 5 + $cpf[9] * 4 + $cpf[10] * 3 + $num1 * 2;
        $resto2 = ($mult2 % 11);

        if($resto2 >= 2){
            $num2 = 11 - $resto2;
        } else{	
            $num2 = 0;
        }
        if($digito_verificador == $num1.$num2){
            echo "<b>Valido</b>";
            echo "</br></br>";
        } else {
            echo "<b>Invalido</b>";
            echo "</br></br>";
        }
    }
}

function validaEmail($email){
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<b>Invalido</b>"; 
        echo "</br></br>";
    } else {
        echo "<b>Valido</b>";
        echo "</br></br>";
    }
}

function geraToken() {
    $qtDigitos = 4;
    $codigo = null;
	for($i = 0; $i < $qtDigitos; $i++) {
		$codigo .= rand(0, 9);
	}
    return $codigo;
}

function redefineSenha($conexao) {
    $usuario = $_SESSION['usuario'];
    $novaSenha = $_POST['novaSenha'];
    $senha = MD5($novaSenha);
    $query = "UPDATE FUNCIONARIO SET senha = '$senha' WHERE usuario = '$usuario'";
    if(mysqli_query($conexao, $query)){
        echo "<br /><b>Senha Alterada !</b><br />";
    }/* else {
        echo "<br /><b>Email invalido !</b><br />";
    }*/
} 

function verificaUsuario($conexao) {
    $usuario = $_SESSION['usuario'];
    $email = $_POST['email'];

    $query = mysqli_query($conexao,"SELECT * FROM FUNCIONARIO WHERE usuario = '$usuario' and email = '$email'");
    $row   = mysqli_num_rows($query);
    
    if($row>0){
        redefineSenha($conexao);/*
        echo "<br /><b>Dados Corretos !</b><br />";*/
    } else {
        echo "<br /><b>Dados Incorretos !</b><br />";
    }
}

function enviaTokenAleatorio($conexao,$email,$usuario){
    $codigo = geraToken();
    $query = mysqli_query($conexao,"SELECT * FROM FUNCIONARIO WHERE email = '$email' and usuario = '$usuario'");
    $row   = mysqli_num_rows($query);
    if($row > 0){
        cadastraToken($conexao,$codigo,$email,$usuario);
        enviaEmail($email, "Token", $codigo, $conexao);
        echo "<b>Foi enviado um email com o Numero de Verificação !</b><br />";
    } else {
        echo "<b>Dados incorretos !</b><br />";
    }
}

function alteraStatusEmail($conexao,$usuario) {

    $query = mysqli_query($conexao,"UPDATE FUNCIONARIO SET emailConfirmacao = 'Valido' WHERE usuario = '$usuario'");
    if($query){
        echo "<b>Email confirmado !</b><br />";
    }
}

function confirmaToken($conexao) {
    $codigo = $_POST['token'];
    $usuario = $_SESSION['usuario'];

    $query = mysqli_query($conexao,"SELECT * FROM TOKEN WHERE usuario = '$usuario' and token = '$codigo'");
    $row   = mysqli_num_rows($query);
    if($row > 0){
        alteraStatusEmail($conexao,$usuario);/*
        echo "<b>Confirmado !</b><br />";*/
    } else {
        echo "<b>Dados incorretos !</b><br />";
    }
}

function esqueceuSenha($conexao,$email){
    $codigo = geraToken();
    $senha = MD5($codigo);
    $tipo = "";

    $query = mysqli_query($conexao,"SELECT * FROM FUNCIONARIO WHERE email = '$email'");
    $row   = mysqli_num_rows($query);
    if($row > 0){
        mysqli_query($conexao,"UPDATE FUNCIONARIO SET senha = '$senha' where email = '$email'");
        enviaEmail($email, "Esqueci a Senha", $codigo,$tipo, $conexao);
        echo "<b>Foi enviada uma nova senha para o email cadastrado !</b><br />";
    } else {
        echo "<b>Dados incorretos !</b><br />";
    }
}