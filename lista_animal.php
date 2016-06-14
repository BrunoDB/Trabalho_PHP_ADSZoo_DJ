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

$selectAnimal = "SELECT a.id, a.nome, e.nome as especie, o.origem as origem, gz.nomeGrupo as grupo
                    FROM animal a
                        LEFT JOIN especie e 
                        ON a.especie = e.id 
                            LEFT JOIN origem o 
                            ON a.origem = o.id 
                                LEFT JOIN grupoZoo gz
                                ON a.grupoZoo = gz.id;";
$query = $bd->query($selectAnimal);
$listaAnimal = $query->fetchAll();
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
                <h4 class="subtitulo">Manutenção Animal:</h4>
                <div class="c02">
                    <table class="tabelas">
                        <thead>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Especie</th>
                        <th>Origem</th>
                        <th>GrupoZoo</th>
                        <th>Editar</th>
                        <th>Excluir</th>
                        </thead>
                        <tbody>
                            <?php foreach ($listaAnimal as $linha) { ?>
                                <tr>
                                    <td><?= $linha['id']; ?></td>
                                    <td><?= $linha['nome']; ?></td><!--nome-->
                                    <td><?= $linha['especie']; ?></td> <!--especie-->
                                    <td><?= $linha['origem']; ?></td><!--origem-->
                                    <td><?= $linha['grupo']; ?></td><!--grupoZoo-->
                                    <td><a href="crud_animal.php?acao=editar&id=<?php echo $linha['id']; ?>">Editar</a></td>
                                    <td><a href="crud_animal.php?acao=excluir&id=<?php echo $linha['id']; ?>">Excluir</a></td>
                                </tr>

                            <?php } ?>
                        </tbody>
                    </table>

                </div>
                <div class="outro">
                    <a href="form_animal.php">Cadastro Animal</a>    |
                    <a href="index.php">Outras Opções</a>
                </div>
            </div>
        </div>
    </body>
</html>