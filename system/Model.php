<?php
/**
 * Created by PhpStorm.
 * User: Wilson
 * Date: 10/02/2018
 * Time: 01:11
 */

/*
 * inserimos o arquivo de configuração (config.php) para que tenhamos acesso a algumas constantes que criamos
 * este é o único arquivo referente ao banco de dados que deve ser alterado.
 */

require_once('system/config.php');

class Model {

    /*
     * criamos uma variável protegida que será utilizada na conexão ao banco de dados através do PDO
     * esta variável armazenará todos os dados referente ao PDO.
     * Ex.: query, callback, cond, entre outras
     */
    protected  $db;
    public $_table;
    public function __construct(){
        /*
         * criamos a conexão com o banco de dados utilizando o PDO
         */
        try {
        $this->db = new PDO(DRIVER .':host=' .HOST .';dbname='.DB_NAME , USER, PASSW);
        } catch(PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }

    }

    /*
     * criamos um método para inserir dados no banco, referente ao (C) CREATE do CRUD
     */

    public function insert(array $data){

         /*
         *após o tratamento, as nossas variaveis já estão prontas para serem inseridas no banco de dados
         *
         * inserimos a ", " para separar os campos ($f = $field)
         */
        $f = implode(", ", array_keys($data));

        /*
        *inserimos as "', '" para separar o conteúdo de cada campo ($c = $content)
        *repare que antes e depois do implode foram inseridas aspas simples e entre os conteúdos foram inseridas
        *aspas simples e vírgula para delimitar os VALUES da query
        */
        $c = "'" . implode("', '", array_values($data)) . "'";

        /*
         * efetuamos a inserção no banco de dados através da query - $this->db->query()
         *
         * estaremos posteriormente efetuando algumas validações antes de inserir os dados no banco
         */

        $i = $this->db->query("INSERT INTO `{$this->_table}` ({$f}) VALUES ({$c})"); //$i = insert

        /*
         * efetuamos uma verificação básica, se a query for executada corretamente retorna true para o controller
         * caso contrário retorna false, outros tratamentos devem ser executados, tais como validações de campos
         * caso não queira um registro duplicado no banco de dados.
         */
        if ($i):
            return true;
        else:
            return false;
        endif;
    }

    /*
    * criamos um método para ler os dados do banco, referente ao (R) READ do CRUD
    */
    public function read($where = null, $orderby = null, $limit = null, $offset = null){

         /*
         * criamos uma condição $where com valor null, se digitado algo ele inclui na consulta, caso não seja digitado nada
         * el retorna uma pesquisa global na tabela especificada em $table
         *
         * efetuamos uma vlidação básica na variável $where
         */
        $where = ($where != null ? "WHERE {$where}" : "");
        $limit = ($limit != null ? "LIMIT {$limit}" : "");
        $offset = ($offset != null ? "OFFSET {$offset}" : "");
        $orderby = ($orderby != null ? "ORDER BY {$orderby}" : "");

        /*
         * criamos uma variável para armazenar a consulta
         */
        $query = $this->db->query("SELECT * FROM `{$this->_table}` {$where} {$orderby} {$limit} {$offset}");

        /*
         * convertemos a queqy para modo associativo
         */
        $query->setFetchMode(PDO::FETCH_OBJ);

        /*
         * retorna os valores para o controller
         */
        return $query->fetchAll();
    }

    /*
   * criamos um método para atualizar os dados do banco, referente ao (U) UPDATE do CRUD
   */
    public function update(array $data, $where){
        if ($this->read($where)):

        /*
        * efetuamos o tratamento dos dados recebidos através do array $data
        */
        foreach ($data as $field => $content) {
        $fc[] = "{$field} = '{$content}'";
        }

        /*
         *após o tratamento, as nossas variaveis já estão prontas para serem inseridas no banco de dados
         *
         * inserimos a ", " para delimitar cada entrada de atualização semparando o campo/conteudo respectivamente, ex.: campo1 = 'conteudo1', campo2 = 'conteudo2'
         * enquanto houver campo para atualizar ele vai separando por vírgula
         */
        $fc = implode(", ", $fc); //$fc = field, content
        $u = $this->db->query("UPDATE `{$this->_table}` SET {$fc} WHERE {$where}"); //$u = update

        /*
         * efetuamos uma verificação básica, se a query for executada corretamente retorna true para o controller
         * caso contrário retorna false
         */
            return true;
        else:
            return false;
        endif;
    }

    /*
   * criamos um método para apagar os dados do banco, referente ao (D) DELETE do CRUD
   */
    public function delete($where){
        /*
         * aqui estamos dizendo a query que queremos deletar o registro da tabela ($table) que tenha corresponda à condição
         * que especificamos em ($where)
        */

        /*
        * efetuamos uma verificação básica utilizando o método já criado, read() para verificar se o registro existe no banco de dados
         * caso exista, executa a query e deleta o registro e retorna true, caso não exista ele retorna false
        */

        if ($this->read($where)==true):

        $d = $this->db->query("DELETE FROM `{$this->_table}` WHERE {$where}");
            return true;
        else:
            return false;
        endif;
    }
}