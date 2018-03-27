<?php
/**
 * Created by PhpStorm.
 * User: Wilson
 * Date: 09/02/2018
 * Time: 23:51
 */


class Index extends Controller {

    public function indexAction(){
        $data = array(
            //array para enviar alguns parâmetros para a view
        );
        $this->view('index','index',$data);
    }

    public function listFeedback(){
        $indexModel = new indexModel();
        return $indexModel->listFeedbackBlock();

    }
}