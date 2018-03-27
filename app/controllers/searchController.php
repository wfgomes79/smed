<?php
/**
 * Created by PhpStorm.
 * User: Wilson
 * Date: 09/02/2018
 * Time: 23:51
 */


class Search extends Controller {

    public function indexAction(){

    $data = array(
    );
    
    $this->view('search','index',$data);

    }

    public function searchSchool($post){
        $data = new searchModel();
    if(isset($post)):
       return $data->read("code = $post",null,null,null);
    else:
        return false;
    endif;

    }
}