<!-- ------------------------------------ --
Universidade de Passo Fundo       
 Desenvolvimento para Web
      ADS - Nível III
  Djessyca Louise Saraiva
      150105@upf.br
---------------------------------------- -->
<!DOCTYPE HTML>
<?php
session_start();
if (!$_SESSION['logado'])
    header('Location: login.php');
require_once './conexao.php';
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link  type="text/css" rel="stylesheet"  href="estilo.css"></link>
        <title>ADSZoo</title>
    </head>
    <body>
        <div class="body">
            <div class="c01">
                <!--                <h1 class="titulo">ADSZoo</h1>-->
                <img src="titulo_4.png">
                <h4 class="subtitulo">Cadastros</h4>
                <div class="c02">
                    <div><center>
                            <br><a href="form_animal.php">Cadastro Animal</a>
                            <br><a href="form_origem.php">Cadastro Origem</a>
                            <br><a href="form_especie.php">Cadastro Especie</a>
                            <br><a href="form_grupoZoo.php">Cadastro GrupoZoo</a>
                        </center></div>
                </div>
                <h4 class="subtitulo">Manutenções</h4>
                <div class="c02">
                    <div><center>
                            <br><a href="lista_animal.php">Manutenção Animal</a>
                            <br><a href="lista_especie.php">Manutenção Especie</a>
                            <br><a href="lista_origem.php">Manutenção Origem</a>
                            <br><a href="lista_grupoZoo.php">Manutenção GrupoZoo</a>
                        </center></div>


                </div>
                <a class="btn btn-lg btn-primary" href="pdf.php" role="button">Gerar PDF com usuario &raquo;</a>
                <div style="text-align:right;">
                    <a href="valida.php?acao=sair" >
                        <i class="glyphicon glyphicon-off"></i> Sair 
                    </a>
                </div>
                </body>
                <footer>
                    <div style="padding-bottom: 10px;">
                        <center >UPF | 150105 - Djessyca Louise Saraiva</center>
                    </div>
                </footer>
                </html>
