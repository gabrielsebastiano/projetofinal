<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Torrents Info</title>
        <link href="css/estiloTelaIniCad.css" rel="stylesheet" type="text/css"/>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->
    </head>
    <body id="LoginForm">
        <div class="container">
            <div class="login-form">
                <div class="main-div">
                    <div class="panel">
                        <p><img src="img/" style="height: 75px;align-content: center;" alt="logo"></p>
                        <h2>Registre-se</h2>
                        <p>Por favor, realize o seu cadastro.  </p>
                    </div>
                    <form id="Login" method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control"  placeholder="Nome" required="">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="E-mail" required="">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Login" required="">
                        </div>
                        <div class="form-group">
                            <input type="date" class="form-control" placeholder="Data de Nascimento" required="">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Senha" required="" >
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Confirmar senha" required="">
                        </div>



                        <div class="mb-2 mr-sm-2">
                            <input class="btn btn-primary mb-2" type="submit" value="Cadastrar" />
                        </div>
                        <div class="mb-2 mr-sm-2">
                            <a href="./index.php">Login</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
