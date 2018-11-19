<?php
include_once('../../conexao.php');
require_once '../autentica.php';


$id = $_GET["id"];


$mysqli = new mysqli($host, $usuario, $senha, $nomeBanco);
if (mysqli_connect_errno()) {
    echo 'Erro de conexão' . mysqli_connect_error();
    exit;
} else {
    @$sql = "DELETE FROM torrent WHERE idtorrent = $id";
    if ($mysqli->query($sql)) {
        echo('<script>window.alert("Tipo Deletado com sucesso!");window.location="index.php";</script>');
    } else {

        echo "
<div class='alert alert-danger col-md-4' >
<strong>erro: " . $sql . "<br>" . $mysqli->error . "</strong>
</div>";
echo('<script>window.alert("Arquivo removido com sucesso!");window.location="index.php";</script>');
    }
}
$mysqli->close();