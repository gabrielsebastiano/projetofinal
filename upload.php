<?php
require_once './autentica.php';
include 'conexao.php';
?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Torrents Info</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    </head>
    <body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#"><img src="img/logo.png" style="height: 25px;align-content: center;"></a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="upload.php">Início</a></li>
                <li><a href="pagina2.php">Contato</a></li>
                <li><a href="index.php">Torrents disponíveis</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Sair</a></li>

            </ul>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header branco"><?php
                    if ($_SESSION) {
                        echo 'Seja bem vindo(a): ' . @$_SESSION['nome'];
                    }
                    ?></h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Inserir Arquivos
                        </div>


                        <div class="panel-body">
                            <form action="#" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Nome do Arquivo</label>
                                    <input type="text" class="form-control" name="nome"
                                           placeholder="Nome do arquivo ex(Meu malvado favorito)">
                                    <small id="emailHelp" class="form-text text-muted">Coloque um nome que faça sentido com
                                        o conteúdo no qual você está inserindo.
                                    </small>
                                </div>
                                <!-- VEZES QUE VOCÊ BAIXOU -->
                                <div class="form-group">
                                    <label>Seeds</label>
                                    <input type="number" class="form-control" name="seeds" placeholder="Seeds">
                                </div>
                                <div class="form-group">
                                    <label>Selecione o arquivo</label>
                                    <input type="file" class="form-control-file" name="fileUpload">
                                </div>
                                <div class="form-group">
                                    <label>Tipo</label>
                                    <select class="form-control" name="tipo">
                                        <?php
                                        $mysqli = new mysqli($host, $usuario, $senha, $nomeBanco);
                                        if (mysqli_connect_errno()) {
                                            echo 'Erro de conexão' . mysqli_connect_error();
                                            exit;
                                        } else {
                                            if ($resultado = $mysqli->query("SELECT idTipo, nome FROM tipo")) {
                                                while ($row = $resultado->fetch_assoc()) {
                                                    echo '<option value="' . $row["idTipo"] . '">' . $row["nome"] . '</option>';
                                                }
                                            } else {
                                                echo 'Erro no comando SQL: ' . $mysqli->error;
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <input type="submit" class="btn btn-primary" value="Enviar">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col-lg-12 -->
        </div>
    </div>
    </body>
    </html>

<?php
if (isset($_FILES['fileUpload'])) {

    $nomeArquivo = $_POST['nome'];
    $tipo = $_POST['tipo'];
    $seeds = $_POST['seeds'];

    date_default_timezone_set("Brazil/East"); //Definindo timezone padrão
    $nomeS_E = strtolower(str_replace(" ", "_", $nomeArquivo)); //retira os espaços do nome que foi enviado via post S_E = SEM ESPAÇO e coloca minuscula

    $ext = strtolower(substr($_FILES['fileUpload']['name'], -4)); //Pegando extensão do arquivo

    $nomeNovo = $nomeS_E . "_" . date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo (nome enviado/data/hora/extenção)

    $dataHora = date("Y.m.d-H.i.s"); //SETA A DATA

    $dir = 'upload/'; //Diretório para uploads

    $tamanho = $_FILES['fileUpload']['size']; //tamanho

    $tamanhoNovo = $tamanho * 0.000001; //de kbtes para mb

    move_uploaded_file($_FILES['fileUpload']['tmp_name'], $dir . $nomeNovo); //Fazer upload do arquivo (AQUI ENVIA PARA PASTA)

    $mysqli = new mysqli($host, $usuario, $senha, $nomeBanco);
    if (mysqli_connect_errno()) {
        echo 'Erro de conexão' . mysqli_connect_error();
        exit;
    } else {
        mysqli_set_charset($mysqli, "utf8");
        @$sql = "INSERT INTO torrent (nomeArquivo,tamanho,dataInsercao,tipo,seeds,nomeEnviado) VALUES ('$nomeNovo',$tamanhoNovo,'$dataHora',$tipo,$seeds,'$nomeArquivo')";  //(AQUI ENVIA PARA O BANCO DADOS DO ARQUIVO)
        if ($mysqli->query($sql)) {
            echo('<script>window.alert("Arquivo enviado com sucesso!");window.location="upload.php";</script>');
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