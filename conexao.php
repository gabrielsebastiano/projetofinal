<?php
$host = 'localhost';
$usuario = 'root';
$senha = '131425Ga@';
$nomeBanco = 'projetoweb';


// CRIA A CONEXÃO
//$conexao = new mysqli($host, $usuario, $senha, $nomeBanco);

// VERIFICA CONEXÃO
if (@$conexao->connect_error) {
    die("ERRO DE CONEXÃO " . $conexao->connect_error);
}
?>
