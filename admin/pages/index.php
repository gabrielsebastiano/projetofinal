<!DOCTYPE html>
<?php
include_once('../../conexao.php');
require_once '../autentica.php';
?>
<html lang="pt-br">
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Torrents Info</title>
        <!-- Bootstrap Core CSS -->
        <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand text-center" href="index.php"><img style="height: 30px;" src="../../img/logo.png"
                                                                              alt=""></a>

                </div>
                <!-- /.navbar-header -->

                <ul class="nav navbar-top-links navbar-right">

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="../../logout.php"><span class="glyphicon glyphicon-log-in"></span> Sair</a></li>

                    </ul>
                    <!-- /.dropdown -->
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">

                            <li>
                                <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Inicio</a>
                            </li>
                            <li>
                                <a href="../../old/tabelaUsuarios.php"><i class="fa fa-table fa-fw"></i> Tabela Usuários</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Dashboard</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Inserir Tipo de arquivos
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <form method="POST" action="index.php">
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <input type="text" class="form-control" name="nome" placeholder="Tipo">
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <textarea type="textarea" class="form-control" name="descricao" placeholder="Descrição"></textarea>
                                        </div>
                                        <input type="submit" name="salvar" value="Enviar" class="btn btn-default">
                                    </form>

                                    <?php
                                    if (@$_POST) {

                                        $tipo = $_POST['nome'];
                                        $descricao = $_POST['descricao'];

                                        $mysqli = new mysqli($host, $usuario, $senha, $nomeBanco);
                                        if (mysqli_connect_errno()) {
                                            echo 'Erro de conexão' . mysqli_connect_error();
                                            exit;
                                        } else {
                                            @$sql = "INSERT INTO tipo (nome,descricao) VALUES ('$tipo','$descricao')";
                                            if ($mysqli->query($sql)) {
                                                echo('<script>window.alert("Tipo cadastrado com sucesso!\n(Agora realize seu login).");window.location="index.php";</script>');
                                            } else {

                                                echo "
                                <div class='alert alert-danger col-md-4' >
                                <strong>erro: " . $sql . "<br>" . $mysqli->error . "</strong>
                                </div>";
                                            }
                                        }
                                        $mysqli->close();
                                    }
                                    ?>

                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Tipos cadastrados
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <table class="table table-sm">
                                        <thead>
                                            <tr>
                                                <th scope="col">Tipo</th>
                                                <th scope="col">Descrição</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <?php
                                                $mysqli = new mysqli($host, $usuario, $senha, $nomeBanco);
                                                if (mysqli_connect_errno()) {
                                                    echo 'Erro de conexão' . mysqli_connect_error();
                                                    exit;
                                                } else {
                                                    if ($resultado = $mysqli->query("SELECT * FROM tipo")) {
                                                        foreach ($resultado

                                                        as $usuario) {
                                                            ?>
                                                        <tr>
                                                            <td><?php echo $usuario['nome']; ?></td>
                                                            <td><?php echo $usuario['descricao']; ?></td>
                                                            <td><a href="deleta.php?id=<?php echo $usuario['idTipo']; ?>"><i
                                                                        class="fa fa-trash"></i></a></td>
                                                        </tr>
                                                        <?php
                                                    }
                                                } else {
                                                    echo 'Erro no comando SQL: ' . $mysqli->error;
                                                }
                                            }
                                            ?>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Atribuir administrador
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <form action="addAdm.php" method="POST">
                                        <div class="form-group">
                                            <label>Nome</label>
                                            <select class="form-control" name="id">
                                                <?php
                                                if (mysqli_connect_errno()) {
                                                    echo 'Erro de conexão' . mysqli_connect_error();
                                                    exit;
                                                } else {
                                                    if ($resultado = $mysqli->query("SELECT * FROM usuario")) {
                                                        while ($row = $resultado->fetch_assoc()) {
                                                            echo '<option value="' . $row["idUsuario"] . '">' . $row["nome"] . '</option>';
                                                        }
                                                    } else {
                                                        echo 'Erro no comando SQL: ' . $mysqli->error;
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <input type="submit" name="salvar" value="Enviar" class="btn btn-default">
                                    </form>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Usuários cadastrados
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <table class="table table-sm">
                                        <thead>
                                            <tr>
                                                <th scope="col">Nome</th>
                                                <th scope="col">Login</th>
                                                <th scope="col">ADM S/N</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <?php
                                                if (mysqli_connect_errno()) {
                                                    echo 'Erro de conexão' . mysqli_connect_error();
                                                    exit;
                                                } else {
                                                    if ($resultado = $mysqli->query("SELECT * FROM usuario")) {
                                                        foreach ($resultado

                                                        as $usuario) {
                                                            ?>
                                                        <tr>
                                                            <td><?php echo $usuario['nome']; ?></td>
                                                            <td><?php echo $usuario['login']; ?></td>
                                                            <td><?php echo $usuario['adm']; ?></td>
                                                            <td><a href="deleta.php?id=<?php echo $usuario['idTipo']; ?>"><i
                                                                        class="fa fa-trash"></i></a></td>
                                                        </tr>
                                                        <?php
                                                    }
                                                } else {
                                                    echo 'Erro no comando SQL: ' . $mysqli->error;
                                                }
                                            }
                                            ?>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Remover adiministrador
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <form action="deletaAdmin.php" method="POST">
                                        <div class="form-group">
                                            <label>Nome</label>
                                            <select class="form-control" name="id">
                                                <?php
                                                if (mysqli_connect_errno()) {
                                                    echo 'Erro de conexão' . mysqli_connect_error();
                                                    exit;
                                                } else {
                                                    if ($resultado = $mysqli->query("SELECT * FROM usuario")) {
                                                        while ($row = $resultado->fetch_assoc()) {
                                                            echo '<option value="' . $row["idUsuario"] . '">' . $row["nome"] . '</option>';
                                                        }
                                                    } else {
                                                        echo 'Erro no comando SQL: ' . $mysqli->error;
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <input type="submit" name="salvar" value="Enviar" class="btn btn-default">
                                    </form>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Sistema em números
                            </div>

                            <div class="panel-body">
                                <?php
                                if (mysqli_connect_errno()) {
                                    echo 'Erro de conexão' . mysqli_connect_error();
                                    exit;
                                } else {
                                    if ($qtdusuario = $mysqli->query("SELECT * FROM usuario") and $qtdArquivo = $mysqli->query("SELECT * FROM torrent")) {
                                        $qtdusuarioR = mysqli_num_rows($qtdusuario);
                                        $qtdArquivoR = mysqli_num_rows($qtdArquivo);
                                        ?>
                                        <div class="alert alert-success" role="alert">
                                            Estão cadastrados <strong><?php echo $qtdusuarioR; ?></strong> usuários
                                        </div>
                                        <div class="alert alert-success" role="alert">
                                            Estão cadastrados <strong><?php echo $qtdArquivoR; ?></strong> arquivos
                                        </div>
                                        <?php
                                    } else {
                                        echo 'Erro no comando SQL: ' . $mysqli->error;
                                    }
                                }
                                ?>


                            </div>
                        </div>
                    </div>


                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Arquivos cadastrados
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <table class="table table-sm">
                                        <thead>
                                            <tr>
                                                <th scope="col">Nome</th>
                                                <th scope="col">Tipo</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <?php
                                                if (mysqli_connect_errno()) {
                                                    echo 'Erro de conexão' . mysqli_connect_error();
                                                    exit;
                                                } else {
                                                    if ($resultado = $mysqli->query("SELECT * FROM torrent")) {
                                                        foreach ($resultado

                                                        as $usuario) {
                                                            ?>
                                                        <tr>
                                                            <td><?php echo $usuario['nomeEnviado']; ?></td>
                                                            <td><?php echo $usuario['tipo']; ?></td>
                                                            <td><a href="deletaArq.php?id=<?php echo $usuario['idTorrent']; ?>"><i
                                                                        class="fa fa-trash"></i></a></td>
                                                        </tr>
                                                        <?php
                                                    }
                                                } else {
                                                    echo 'Erro no comando SQL: ' . $mysqli->error;
                                                }
                                            }
                                            ?>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>
</html>
