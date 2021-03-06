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

$selectGrupoZoo = "SELECT id, nomeGrupo as nome FROM grupoZoo";
$query = $bd->query($selectGrupoZoo);
$listaGrupoZoo = $query->fetchAll();
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
                <h4 class="subtitulo">Manutenção GrupoZoo:</h4>
                <div class="c02">
                        
                    <table class="tabelas">
            <thead>
            <th>#</th>
            <th>Grupo</th>
            <th>Editar</th>
            <th>Excluir</th>
        </thead>
        <tbody>
            <?php foreach ($listaGrupoZoo as $linha) { ?>
                <tr>
                    <td><?= $linha['id']; ?></td>
                    <td><?= $linha['nome']; ?></td><!--nome-->
                    <td><a href="crud_grupoZoo.php?acao=editar&id=<?php echo $linha['id']; ?>">Editar</a></td>
                    <td><a href="crud_grupoZoo.php?acao=excluir&id=<?php echo $linha['id']; ?>">Excluir</a></td>
                </tr>

            <?php } ?>
        </tbody>
    </table>
        <div class="outro">
                    <a href="form_grupoZoo.php">Cadastro GrupoZoo</a>    |
                    <a href="index.php">Outras Opções</a>
                </div>
</body>
</html>