<?php
    include "include_Functions.php";
    iniciaSessao();
    include "include_Layout.php";
    include "include_ConexaoBanco.php";
?>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <head>
        <link rel="shortcut icon" href="https://cdn.icon-icons.com/icons2/2075/PNG/512/athletic_exercise_game_sport_tennis_training_icon_127157.png" type="image/x-icon" />
    </head>
    <body>
        <div id="login">
            <h3 class="text-center text-white pt-5">Tela de Acesso</h3>
            <div class="container">
                <div id="login-row" class="row justify-content-center align-items-center">
                    <div id="login-column" class="col-md-6">
                        <div id="login-box" class="col-md-12">
                            <form id="login-form" class="form" action="index.php" method="post">
                                <h3 class="text-center text-info">Acesso</h3>
                                <div class="form-group">
                                    <label for="username" class="text-info">Usuario:</label>
                                    <br>
                                    <input type="text" name="usuario" id="usuario" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="password" class="text-info">Senha:</label>
                                    <br>
                                    <input type="password" name="senha" id="senha" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="enviar" class="btn btn-info btn-md" value="Entrar">
                                </div>
                                <div id="register-link" class="text-left">
                                    <a href="cadastro.php" class="text-info">Cadastrar</a>
                                </div>
                                <div id="register-link" class="text-left">
                                    <a href="esqueceuSenha.php" class="text-info">Esqueceu sua senha ?</a>
                                </div>
                            </form>
                            <?php
                    if(isset($_POST['usuario']) && isset($_POST['senha'])){
                        autenticaUsuario($conexao);
                    }
                    ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>