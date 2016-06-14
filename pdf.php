<?php
include 'pdf/mpdf.php';
require_once './conexao.php';

//$idteste = "1";
//$result_carnes = "select * from carnes where idcarnes = '$idteste'";
//$resultado_carnes = $bd->prepare($result_carnes);
//$resultado_carnes->execute(array('idcarnes'=>$_GET['idcarnes']));
//$log = $resultado_carnes->fetch();

$select = "SELECT a.id as id, a.nome as nome, e.nome as especie, o.origem as origem, gz.nomeGrupo as grupo
            FROM animal a
                        LEFT JOIN especie e 
                        ON a.especie = e.id 
                            LEFT JOIN origem o 
                            ON a.origem = o.id 
                                LEFT JOIN grupoZoo gz
                                ON a.grupoZoo = gz.id;";
        $query = $bd->query($select);
        $lista = $query->fetchAll();
        
$saida = 
        "<html>
            <body><h1>Lista de Animais</h1>";
foreach ($lista as $item){
    $saida.="
                
                Id: ".$item['id']."<br>
                Nome: ".$item['nome']."<br>
                Especie: ".$item['especie']."<br>
                Origem: ".$item['origem']."<br>
                Grupo: ".$item['grupo']."<br>"
            . "------------------------------<br>";
}
$saida.="
            </body>
        </html>
        ";

$arquivo = "PDF001.pdf";

$mpdf = new mPDF();
$mpdf->WriteHTML($saida);

/*
 * F - salva o arquivo
 * I - abre no navegador
 * D - chama o prompt
 */

$mpdf->Output($arquivo, 'I');

echo "PDF Gerado com Sucesso";

?>