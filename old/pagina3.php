<?php
require_once './autentica.php';
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
                    <a class="navbar-brand" href="#"><img src="../img/logo.png" style="height: 25px;align-content: center;"></a>
                </div>
                <ul class="nav navbar-nav">
                    <li><a href="../upload.php">Início</a></li>
                    <li  class="active"><a href="pagina3.php">Contato</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="../logout.php"><span class="glyphicon glyphicon-log-in"></span> Sair</a></li>

                </ul>
            </div>
        </nav>

        <section class="slice bg-3">
            <div class="w-section inverse">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7">
                            <h3 class="section-title2">Envie sua mensagem para InfoTorrents</h3>
                            <p>
                                Entre em contato conosco, teremos o maior prazer em atende-lo da melhor maneira possivel e ajudá-lo a encontrar a solução ideal para sua empresa.<br>
                                <br>Campos com * são obrigatórios.
                            </p>
                            <div id="pnValidacao">
                                <div id="BoxValidacao">
                                    <div id="boxValidacao" style="color:Red;display:none;">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nome *</label>
                                <input name="txtNome" type="text" maxlength="50" id="txtNome" class="form-control" placeholder="Nome">
                                <span id="txtNome1" style="color:Red;display:none;">Informe o Nome</span>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email *</label>
                                        <input name="txtEmail" type="text" maxlength="50" id="txtEmail" class="form-control" placeholder="Email">
                                        <span id="txtEmail1" style="color:Red;display:none;">Informe o E-mail</span>
                                        <span id="txtEmail2" style="color:Red;display:none;">E-mail incorreto</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Empresa</label>
                                        <input name="txtEmpresa" type="text" maxlength="50" size="53" id="txtEmpresa" class="form-control" placeholder="Empresa">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Telefone com DDD</label>
                                        <input name="txtFone" type="text" maxlength="14" id="txtFone" class="form-control" placeholder="Telefone">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Celular com DDD</label>
                                        <input name="txtCelular" type="text" maxlength="14" id="txtCelular" class="form-control" placeholder="Celular">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Mensagem *</label>
                                <textarea name="txtMensagem" rows="2" cols="20" id="txtMensagem" class="form-control" placeholder="Sua mensagem aqui..." style="height:100px;"></textarea>
                                <span id="txtMensagem1" style="color:Red;display:none;">Informe a Mensagem</span>
                            </div>
                            <input type="submit" name="btEnviar" value="Enviar" class="btn btn-two">
                        </div>
                        <div class="col-md-5">
                            <div class="row">
                                <div class="col-sm-6">

                                    <div class="subsection">
                                        <h3 class="section-title2">Telefones</h3>
                                        <div class="contact-info">

                                            <h5>Telefone</h5>
                                            <p>+55 55 999497658<br>
                                                +55 55 99988454 - Vivo</p>
                                        </div>
                                    </div>
                                    <div class="subsection">
                                        <h3 class="section-title2">Email e Skype</h3>
                                        <div class="contact-info">
                                            <h5>Email e Skype</h5>
                                            <p><a href="mailto:contato@infotorrents.com">contato@infotorrents.com</a></p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>
