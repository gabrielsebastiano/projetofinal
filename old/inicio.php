<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <a style="float:right;" href="../logout.php">Logout</a><br>
        <a href="livros.php">Listagem de livros</a><br>
        <?php
        require_once './autentica.php';
        if ($_SESSION) {
            echo ' Olá ' . @$_SESSION['nomeUsuario'];
            echo '<br> E-mail: ' . @$_SESSION['email'];
            echo @$_SESSION['imagem'];
        }
        ?>
    </body>
</html>