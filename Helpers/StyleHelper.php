<?php
/**
 * Created by PhpStorm.
 * User: Wilson
 * Date: 13/02/2018
 * Time: 22:12
 */



class StyleHelper {
    public function loadCss(){

        //Bootstrap CSS

        /**Procura e lista todos os arquivos do diretório especificado com base na extensão do arquivo informado*/
        $path = CSS;
        $relative_css = glob("$path{*.min.*}", GLOB_BRACE);
        /** Joga todos os arquivos em somente 1 request para o navegador */
        foreach ($relative_css as $style) {

            // verifica se existe o existe para evitar erros
            if (file_exists($style)):
                $file = URI.$style;
                echo "<link href='$file' rel='stylesheet' type='text/css' />";
                echo PHP_EOL;
                //readfile(CSS.$style);
            else:
                echo '<pre>Arquivo .css não existe!</pre>';
            endif;
        }
        return $this;
    }

    public function loadJs(){

        /**Procura e lista todos os arquivos do diretório especificado com base na extensão do arquivo informado*/

        //jquery JS
        $path_JS_JQ =  JS_JQ;
        $relative_jsjq = glob("$path_JS_JQ{*.min.js}", GLOB_BRACE);

        /** Joga todos os arquivos em somente 1 request para o navegador */
        foreach ($relative_jsjq as $js) {
            // verifica se existe o existe para evitar erros
            if (file_exists($js)):
                $file = URI.$js;
                echo "<script src='$file'></script>";
                echo PHP_EOL;
            else:
                echo '<pre>Arquivo .js não existe!</pre>';
            endif;
        }

        //Bootstrap JS
        $path_JS =  JS;
        $relative_js = glob("$path_JS{*.min.*}", GLOB_BRACE);

        /** Joga todos os arquivos em somente 1 request para o navegador */
        foreach ($relative_js as $js) {
            // verifica se existe o existe para evitar erros
            if (file_exists($js)):
                $file = URI.$js;
                echo "<script src='$file'></script>";
                echo PHP_EOL;
            else:
                echo '<pre>Arquivo .js não existe!</pre>';
            endif;
        }

        return $this;
    }
}
