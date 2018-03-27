<?php
/**
 * Created by PhpStorm.
 * User: Wilson
 * Date: 10/02/2018
 * Time: 01:18
 */

class searchModel extends Model {
    
    
public $_table = 'schools';

public function listSchools(){

        return $this->read("status='ATIVO'",'','','');
        /* retorna os dados da tabela feedback que tenham o status ATIVO ordenado pela data em ordem decrescente
        *  com um limite de 6 registro para exibição, offset não determinei por não haver necessidade no momento
        */

    }

}