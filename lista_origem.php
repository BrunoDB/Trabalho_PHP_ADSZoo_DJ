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

$selectOrigem = "SELECT id, origem FROM origem";
$query = $bd->query($selectOrigem);
$listaOrigem = $query->fetchAll();
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
                <h4 class="subtitulo">Manutenção Origem:</h4>
                <div class="c02">

                    <table class="tabelas">
                        <thead>
                        <th>#</th>
                        <th>Origem</th>
                        <th>Editar</th>
                        <th>Excluir</th>
                        </thead>
                        <tbody>
                            <?php foreach ($listaOrigem as $linha) { ?>
                                <tr>
                                    <td><?= $linha['id']; ?></td>
                                    <td><?= $linha['origem']; ?></td><!--nome origem-->
                                    <td><a href="crud_origem.php?acao=editar&id=<?php echo $linha['id']; ?>">Editar</a></td>
                                    <td><a href="crud_origem.php?acao=excluir&id=<?php echo $linha['id']; ?>">Excluir</a></td>
                                </tr>

                            <?php } ?>
                        </tbody>
                    </table>
                    <div class="outro">
                        <a href="form_origem.php">Cadastro Origem</a>    |
                        <a href="index.php">Outras Opções</a>
                    </div>
                    </body>
                    </html>