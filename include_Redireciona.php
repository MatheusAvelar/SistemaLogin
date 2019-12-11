<?php
//Verifica se a Sessao ainda esta ativa para continuar e poder acessar outras URLs
if (!isset($_SESSION["usuario"]) || !isset($_SESSION["senha"])) {
    header("Location:http://ligaprojetos.ml/");
    exit(0);
}
?>