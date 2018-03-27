<?php
/**
 * Created by PhpStorm.
 * User: Wilson
 * Date: 10/02/2018
 * Time: 00:07
 */


class Controller extends System {

    public function init(){

    }

    protected function view($controller, $view, $vars = null){
        if (is_array ($vars) && count ($vars) > 0)
            extract($vars, EXTR_PREFIX_ALL, 'view');
        $file = VIEWS . $controller . '/' . $view . '.phtml';

        if(!file_exists($file)):
            require_once (VIEWS .'start-end/header.phtml');
            echo "<div class='center orange-text'><h5>Houve um erro, a view não existe!</h5></div>";
            echo "<meta HTTP-EQUIV='refresh' CONTENT='3;URL=/' >";
            require_once (VIEWS .'start-end/footer.phtml');
            exit;
        else:
            require_once (VIEWS .'start-end/header.phtml');
            require_once($file);
            require_once (VIEWS .'start-end/footer.phtml');
        endif;

    }

    /*
     * HELPERS
     */
    public function redirector(){
        $var = new RedirectorHelper();
         return $var;
    }
     /*
     * END HELPERS
     */

}