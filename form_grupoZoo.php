<!-- ------------------------------------ --
Universidade de Passo Fundo       
 Desenvolvimento para Web
      ADS - Nível III
  Djessyca Louise Saraiva
      150105@upf.br
---------------------------------------- -->
<?php
session_start();
if (!$_SESSION['logado'])
    header('Location: login.php');

require_once './conexao.php';

$selectEspecie = "SELECT * FROM grupoZoo";
$query = $bd->query($selectEspecie);
$listaEspecie = $query->fetchAll();

if (!isset($action))
    $action = "crud_grupoZoo.php?acao=inserir";
?>
<html>
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
                <h4 class="subtitulo">Cadastro GrupoZoo:</h4>
                <div class="c02">
                    <form name="crud_grupoZoo" action="<?php echo $action; ?>" method="POST">
                        <div class="form-group">

                            <label for="nome">Nome*:</label>
                            <input type="text" class="form-control" name="nome" id="usr">
                        </div>                       
                        <center><input type="submit" value="Cadastrar"></center>
                    </form>
                </div>
                <div class="outro">
                    <a href="lista_grupoZoo.php">Manutenção GrupoZoo</a> |
                    <a href="index.php">Outras Opções</a>
                </div>
            </div>
        </div>     

    </body>
    <footer>
        <div style="padding-bottom: 10px;">
            <center >UPF | 150105 - Djessyca Louise Saraiva</center>
        </div>
    </footer>
</html>
