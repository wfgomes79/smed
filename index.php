<?php
/**
 * Created by PhpStorm.
 * User: Wilson
 * Date: 10/02/2018
 * Time: 21:45
 */

session_start();
include_once ('./system/config.php');
define ('CONTROLLERS','app/controllers/');
define ('VIEWS','app/views/');
define ('MODELS','app/models/');
define ('HELPERS','Helpers/');
define ('URI', PROJECT_NAME); //nome do projeto
define ('CSS', 'web_files/materialize/css/');
define ('JS','web_files/materialize/js/');
define ('ROBOTO','web_files/materialize/fonts/');
define ('JS_JQ','web_files/jquery/');
define ('IMAGE','web_files/img/');

require_once('system/System.php');
require_once('system/Controller.php');
require_once('system/Model.php');

$start = new System();
$start->run();


/**
 * @param $file
 */
        
       

function __autoload ($file){
    if(file_exists(  MODELS . $file . '.php')):
        require_once(MODELS . $file . '.php');
    elseif (file_exists(HELPERS . $file . '.php')):
        require_once(HELPERS . $file . '.php');
    else:
        require_once (VIEWS .'start-end/header.phtml');
        echo ("<div class='center orange-text'><h5>Model ou Helper não encontrado!</h5></div>");
        echo "<meta HTTP-EQUIV='refresh' CONTENT='3;URL=/' >";
        require_once (VIEWS .'start-end/footer.phtml');
        exit;
    endif;
}


