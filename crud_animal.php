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
    $sql = "INSERT INTO animal (nome, especie, origem, grupoZoo) "
            . " VALUES(:nome, :especie, :origem, :grupoZoo);";
    $query = $bd->prepare($sql);
    if ($query->execute($_POST))
        header('Location: lista_animal.php');
    else
        print_r($query->errorInfo());
} else if ($acao == "excluir") {
    $sql = "DELETE FROM animal WHERE id=:id";
    $query = $bd->prepare($sql);
    $query->execute(array('id' => $_GET['id']));
    header('Location: crud_animal.php');
} else if ($acao == "listar") {
    $sql = "SELECT a.id, a.nome, e.nome, o.origem, gz.nomeGrupo
            FROM animal a
                        LEFT JOIN especie e 
                        ON a.especie = e.id 
                            LEFT JOIN origem o 
                            ON a.origem = o.id 
                                LEFT JOIN grupoZoo gz
                                ON a.grupoZoo = gz.id;";
    $query = $bd->query($sql);
    $lista_animal = $query->fetchAll();
    require './lista_animal.php';
} else if ($acao == "buscar") {
    $sql = "SELECT * FROM animal WHERE id=:id";
    $query = $bd->prepare($sql);
    $query->execute(array('id' => $_GET['id']));
    $listaAnimal = $query->fetch();
    $action = "crud_animal.php?acao=editar&id=" . $_GET['id'];
    require './form_animal.php';
} else if ($acao == "editar") {
    $select = "UPDATE animal "
            . "set nome = :nome,  nome = :nome, origem = :origem, grupoZoo = :grupoZoo "
            . "WHERE id = :id";
        $query = $bd->prepare($select);
        $_POST['id'] = $_GET['id'];
        if($query->execute(array(
            'id' => $_POST['id'], 
            'nome' => $_POST['nome'],                       
            'nome' => $_POST['especie'],
            'origem' => $_POST['origem'],                       
            'grupoZoo' => $_POST['grupoZoo'],
            
            )))
            header('Location: crud_animal.php');
        else 
            print_r($query->errorInfo());
}