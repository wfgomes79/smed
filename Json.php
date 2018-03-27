<?php
/**
 * Created by PhpStorm.
 * User: Wilson
 * Date: 19/03/2018
 * Time: 15:15
 */

define ("USUARIO"        ,         "smed");
define ("SENHA"       ,         "bA@CRJWFGPL");


    header('Content-type: text/html; charset=UTF-8');

    $pdo = new PDO('mysql:host=localhost;dbname=db_schools; charset=utf8;', USUARIO, SENHA);

    //retorna a pesquisa da unidade em json concatenando o código e o nome
    $return = $pdo->prepare("SELECT concat (code, ' - ', name) escola /*apelido da querie*/ FROM schools");

    $return->execute();

    echo json_encode($return->fetchAll(PDO::FETCH_ASSOC));
?>