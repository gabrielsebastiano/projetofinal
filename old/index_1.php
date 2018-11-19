<html>
    <head>
        <link href="css/estiloTelaIniCad.css" rel="stylesheet" type="text/css"/>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    <body id="LoginForm">
        <div class="container">
            <div class="login-form">
                <div class="main-div">
                    <div class="panel">
                        <p><img src="img/" style="height: 75px;align-content: center;" alt="logo"></p>
                        <h2>Login</h2>
                        <p>Por favor, realize o Login. </p>
                    </div>
                    <form id="Login" method="POST">
                        <div class="form-group">
                            <input type="email" class="form-control"  placeholder="Email" required="" name="email" value="" >
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Senha" required="" name="senha" value="">
                        </div>
                        <div class="mb-2 mr-sm-2">
                            <input type="checkbox" value="sim" name="lembrar">
                            <label> Lembrar-me nesse computador?</label>
                        </div>
                        <div class="mb-2 mr-sm-2">
                            <input class="btn btn-primary mb-2" type="reset" value="Limpar campos">
                        </div>
                        <div class="mb-2 mr-sm-2">
                            <input class="btn btn-primary mb-2" type="submit" value="Logar">
                        </div>
                        <div class="mb-2 mr-sm-2">
                            <a href="./registro.php">Registre-se</a>
                        </div>
                        <?php
                        if (@$_POST) {

                            $email = $_POST['email'];
                            $senha = $_POST['senha'];


                            require_once './dadosUsuario.php';
                            foreach ($dadosUsuario as $usuario) {
                                if ($email == $usuario['email'] && md5($senha) == $usuario['senha']) {
                                    var_dump($email);
                                    //se o user marcar lembrar...
                                    if (isset($_POST['lembrar'])) {
                                        if ($_POST['lembrar'] == 'sim') {
                                            setcookie('meuEmail', $email, time() + 7200);
                                        }
                                    } else {
                                        //se existir o cookie email....
                                        if (isset($_COOKIE['meuEmail'])) {
                                            //seta o valor dele para vazio
                                            setcookie('meuEmail', '', -1);
                                            //destroi o dito cujo.
                                            unset($_COOKIE['meuEmail']);
                                        }
                                    }
                                    //delimita o tempo de vida da sessão
                                    session_cache_expire(600);
                                    //avisa o server que irei utilizar sessões
                                    //ativa as sessoes do servidor
                                    @session_start();
                                    //em uma sessão posso armazenar:
                                    //variáveis
                                    $_SESSION['email'] = $email;
                                    $_SESSION['nome'] = $usuario['nome'];

                                    //redireciona para a página
                                    header('location:pagina1.php');
                                } //fim if....
                            }
                        }
                        if ($_REQUEST) {
                            if (@$_REQUEST['msg'] == md5('expirou')) {
                                echo 'Seu login expirou';
                            }
                            if (@$_REQUEST['msg'] == md5('logout')) {
                                echo '<div class="alert alert-info">
                                        <strong>Tchau!!</strong> 
                                    </div>';
                            }
                        }
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
<table border="1px">
                <tr>
                    <th>Usuários</th>
                    <th>E-mail</th>
                </tr>
                <?php
                require_once './dadosUsuario.php';
                foreach (@$dadosUsuario as $usuario) {
                    ?>
                    <tr>
                        <td><?php echo $usuario['nome']; ?></td>
                        <td><?php echo $usuario['email']; ?></td>
                    </tr>
                <?php } ?>
            </table>