<?php
/**
 * Created by PhpStorm.
 * User: Wilson
 * Date: 19/03/2018
 * Time: 15:15
 */


    header('Content-type: text/html; charset=UTF-8');

//    $pdo = new PDO("mysql:host=localhost;dbname=db_schools; charset=utf8; ",'smed', 'bA@CRJWFGPL');
//
//    //retorna a pesquisa da unidade em json concatenando o código e o nome
//    $return = $pdo->prepare("SELECT concat (code, ' - ', name) escola /*apelido da querie*/ FROM schools");

$pdo = new PDO("mysql:host=localhost;dbname=lista_ip; charset=utf8; ",'smed', 'bA@CRJWFGPL');

//retorna a pesquisa da unidade em json concatenando o código e o nome
$return = $pdo->prepare("SELECT concat (codigo, ' - ', escola) escola /*apelido da querie*/ FROM escolas");


    $return->execute();

    echo json_encode($return->fetchAll(PDO::FETCH_ASSOC));
?>