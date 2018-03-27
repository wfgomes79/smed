<?php
/**
 * Created by PhpStorm.
 * User: Wilson
 * Date: 10/02/2018
 * Time: 21:51
 */

class System {
    private $_url;
    private $_explode;
    public $_controller;
    public $_action;
    public $_params;

    public function __construct(){
    $this->setUrl();
    $this->setExplode();
    $this->setController();
    $this->setAction();
    $this->setParams();

    }

    private function setUrl(){
        $_GET['url'] = (isset($_GET['url']) ? $_GET['url'] : 'index/index');
        $this->_url = $_GET['url'];
    }

    private function setExplode(){
        $this->_explode = explode('/', $this->_url);
    }

    private function setController(){
        $this->_controller = strtolower($this->_explode[0]);
    }

    private function setAction(){
        $ac = (!isset($this->_explode[1]) || $this->_explode[1] == null || $this->_explode[1] == "index" ? "index": $this->_explode[1]);
        $this->_action = strtolower($ac.'Action');

    }

    private function setParams(){

        unset($this->_explode[0], $this->_explode[1]);
        if(end($this->_explode)== null)
            array_pop($this->_explode);
        $i = 0;
        if (!empty($this->_explode)):
            foreach ($this->_explode as $val) :
               if($i % 2 == 0):
               $ind[] = $val;
               else:
               $value[] = $val;
               endif;
               $i++;
            endforeach;
            else:
            $ind = array();
            $value = array();
        endif;
        if(count($ind) == count($value) && !empty($ind) && !empty($value)):
            $this->_params = array_combine($ind, $value);
        else:
            $this->_params = array();
        endif;
    }

    public function getParams($name = null){
        if($name != null):
                return $this->_params[$name];
            else:
                return $this->_params;
        endif;
    }

    public function run(){
        $controller_path = CONTROLLERS . $this->_controller .'Controller.php';
        if (!file_exists($controller_path)):
		$utf8 = strtoupper(substr(PHP_OS, 0, 3)) === 'WIN' ? "" : utf8_decode;

            require_once (VIEWS .'start-end/header.phtml');
            echo $utf8 . "<div class='center orange-text'>
            <h3>ERROR 404 - PAGE NOT FOUND</h3>
            <p><h4>Página não encontrada</h4>
            <p><h5>Desculpe, esta página não existe!</h5>
            </center></div>";
            echo "<meta HTTP-EQUIV='refresh' CONTENT='3;URL=/' >";
            echo "<br>";
            echo "<div class='progress'>
                        <div class='indeterminate'></div>
                       </div>";
            require_once (VIEWS .'start-end/footer.phtml');

        else:
            require_once($controller_path);
            $app = new $this->_controller();
            $utf8 = strtoupper(substr(PHP_OS, 0, 3)) === 'WIN' ? "" : utf8_decode;
            if (!method_exists($app, $this->_action)):
                require_once (VIEWS .'start-end/header.phtml');
                echo $utf8 . ('<div class="center orange-text"><h5>Houve um erro, a action não existe!</h5></div>');
                echo "<meta HTTP-EQUIV='refresh' CONTENT='3;URL=/' >";
                echo "<br>";
                echo "<div class='progress'>
                        <div class='indeterminate'></div>
                       </div>";
                require_once (VIEWS .'start-end/footer.phtml');
                exit;
            else:
            $action = $this->_action;
            $app->$action();
        endif;
            endif;

    }
}