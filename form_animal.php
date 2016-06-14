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

$selectAnimal = "SELECT * FROM animal";
$query = $bd->query($selectAnimal);
$listaAnimal = $query->fetchAll();

$selectEspecie = "SELECT * FROM especie";
$query = $bd->query($selectEspecie);
$listaEspecie = $query->fetchAll();

$selectOrigem = "SELECT * FROM origem";
$query = $bd->query($selectOrigem);
$listaOrigem = $query->fetchAll();

$selectGrupoZoo = "SELECT * FROM grupoZoo";
$query = $bd->query($selectGrupoZoo);
$listaGrupoZoo = $query->fetchAll();

if (!isset($action))
    $action = "crud_animal.php?acao=inserir";
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
                <h4 class="subtitulo">Cadastro Animal:</h4>
                <div class="c02">
                    <form name="crud_animal" action="<?php echo $action; ?>" method="POST">
                        <div class="form-group">

                            <label for="nome">Nome*:</label>
                            <input type="text" class="form-control" name="nome" id="usr">
                        </div>

                        <div class="form-group">
                            <label>Especie*:</label>
                            <select name="especie">
                                <?php foreach ($listaEspecie as $especie): ?>
                                    <option value="<?php echo $especie['id']; ?>"
                                    <?php
                                    if (isset($especie) && $especie['id'] == $especie['id'])
                                        echo "selected";
                                    ?> >
                                            <?php echo $especie['nome']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div> 

                        <div class="form-group">
                            <label>Origem*:</label> 
                            <select name="origem">
                                <?php foreach ($listaOrigem as $origem): ?>
                                    <option value="<?php echo $origem['id']; ?>"
                                    <?php
                                    if (isset($origem) && $origem['id'] == $origem['id'])
                                        echo "selected";
                                    ?> >
                                            <?php echo $origem['origem']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div> 

                        <div class="form-group">
                            <label>GrupoZoo*:</label>
                            <select name="grupoZoo">
                                <?php foreach ($listaGrupoZoo as $grupoZoo): ?>
                                    <option value="<?php echo $grupoZoo['id']; ?>"
                                    <?php
                                    if (isset($grupoZoo) && $grupoZoo['id'] == $grupoZoo['id'])
                                        echo "selected";
                                    ?> >
                                            <?php echo $grupoZoo['nomegrupo']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div> 

                        <center><input type="submit" value="Cadastrar"></center>
                    </form>
                </div>
                <div class="outro">
                    <a href="lista_animal.php">Manutenção Animal</a> |
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
