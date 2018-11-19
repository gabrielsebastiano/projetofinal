<?php
require_once './autentica.php';
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
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="pagina1.php">Início</a></li>
                        <li><a href="../pagina2.php">Empresa</a></li>
                        <li><a href="pagina3.php">Contato</a></li>
                    </ul>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Sair</a></li>

                </ul>
            </div>
        </nav>

        <div class="container">
            <?php
            if ($_SESSION) {
                echo '<h3>Seja bem vindo(a): ' . @$_SESSION['nome'] . '<h3>';
            }
            ?>
            <h3>Inserir Arquivos</h3>

            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <form action="#" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Nome do Arquivo</label>
                                <input type="text" class="form-control" name="nome" placeholder="Nome do arquivo ex(Meu malvado favorito)">
                                <small id="emailHelp" class="form-text text-muted">Coloque um nome que faça sentido com o conteúdo no qual você está inserindo.</small>
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
    </body>
</html>

<?php
if (isset($_FILES['fileUpload'])) {
    $nome = $_POST['nome'];
    $tipo = $_POST['tipo'];
    $seeds = $_POST['seeds'];
    date_default_timezone_set("Brazil/East"); //Definindo timezone padrão

    $ext = strtolower(substr($_FILES['fileUpload']['name'], -4)); //Pegando extensão do arquivo
    $new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
   
    $dir = 'upload/'; //Diretório para uploads
    $tamanho = $_FILES['fileUpload']['size']; //tamanho
    $tamanhoNovo = $tamanho / 1048576; //de kbtes para mb
    move_uploaded_file($_FILES['fileUpload']['tmp_name'], $dir . $new_name); //Fazer upload do arquivo

    $mysqli = new mysqli($host, $usuario, $senha, $nomeBanco);
    if (mysqli_connect_errno()) {
        echo 'Erro de conexão' . mysqli_connect_error();
        exit;
    } else {
        @$sql = "INSERT INTO torrent (nomeArquivo,tamanho,dataInsercao,tipo,seeds,nomeEnviado) VALUES ('$new_name',$tamanhoNovo,NOW(),$tipo,$seeds,'$nome')";
        if ($mysqli->query($sql)) {
            echo('<script>window.alert("Arquivo enviado com sucesso!");window.location="pagina1.php";</script>');
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