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

if (isset($_GET['acao']))
    $acao = $_GET['acao'];
else
    $acao = 'listar';

if ($acao == "inserir") {
    $sql = "INSERT INTO origem (origem) "
            . " VALUES(:nome);";
    $query = $bd->prepare($sql);
    if ($query->execute($_POST))
        header('Location: lista_origem.php');
    else
        print_r($query->errorInfo());
} else if ($acao == "excluir") {
    $sql = "DELETE FROM origem WHERE id=:id";
    $query = $bd->prepare($sql);
    // falta fazer o if para exclusao
    $query->execute(array('id' => $_GET['id']));
    header('Location: crud_origem.php');
} else if ($acao == "listar") {
    $sql = "SELECT id, origem FROM origem;";
    $query = $bd->query($sql);
    $lista_origem = $query->fetchAll();
    require './lista_origem.php';
} else if ($acao == "buscar") {
    $sql = "SELECT * FROM origem WHERE id=:id";
    $query = $bd->prepare($sql);
    $query->execute(array('id' => $_GET['id']));
    $listaAnimal = $query->fetch();
    $action = "crud_origem.php?acao=atualizar&id=" . $_GET['id'];
    require './form_origem.php';
} else if ($acao == "editar") {
    $select = "update origem set id = :id";
    $query = $bd->prepare($select);
    $_POST['id'] = $_GET['id'];
    if ($query->execute($_POST))
        header('Location: form_origem.php');
    else
        print_r($query->errorInfo());
}