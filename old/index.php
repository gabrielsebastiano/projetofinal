<?php
include 'conexao.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style>
            body{
                background-color: #1abc9c;
                color: white;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#"><img src="img/logo.png" style="height: 25px;align-content: center;"></a>
                </div>
                <ul class="nav navbar-nav">
                    <li><a href="pagina1.php">Início</a></li>
                    <li class="active"><a href="../pagina2.php">Empresa</a></li>
                    <li><a href="pagina3.php">Contato</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Sair</a></li>

                </ul>
            </div>
        </nav>

        <div class="container">
            <div class="container">
                <div class="row">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">Data</th>
                                <th scope="col">Tamanho</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Seeds</th>
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
                                    if ($resultado = $mysqli->query("SELECT tamanho,dataInsercao,tipo,seeds,nomeEnviado,nomeArquivo FROM torrent")) {
                                        foreach ($resultado as $usuario) {
                                            ?>
                                        <tr>
                                            <td><a href="upload/<?php echo $usuario['nomeArquivo']; ?>"><?php echo $usuario['nomeEnviado']; ?></a></td>
                                            <td><?php echo $usuario['dataInsercao']; ?></td>
                                            <td><?php echo $usuario['tamanho']; ?></td>
                                            <td><?php echo $usuario['tipo']; ?></td>
                                            <td><?php echo $usuario['seeds']; ?></td>
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
                </div>
            </div>
        </div>
    </body>
</html>
