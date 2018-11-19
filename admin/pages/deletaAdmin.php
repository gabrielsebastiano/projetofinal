<?php
include_once('../../conexao.php');
require_once '../autentica.php';


$id = $_POST["id"];


$mysqli = new mysqli($host, $usuario, $senha, $nomeBanco);
if (mysqli_connect_errno()) {
    echo 'Erro de conexão' . mysqli_connect_error();
    exit;
} else {
    @$sql = "UPDATE usuario SET adm = NULL WHERE idUsuario = $id";
    if ($mysqli->query($sql)) {
        echo('<script>window.alert("Adiministrador removido com sucesso!");window.location="index.php";</script>');
    } else {

        echo "
<div class='alert alert-danger col-md-4' >
<strong>erro: " . $sql . "<br>" . $mysqli->error . "</strong>
</div>";

    }
}
$mysqli->close();