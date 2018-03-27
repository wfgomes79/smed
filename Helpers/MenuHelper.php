<?php
/**
 * Created by PhpStorm.
 * User: Wilson
 * Date: 23/02/2018
 * Time: 18:09
 * Base Bootstrap 4
 */

class MenuHelper {

    public function menuNavbarH($background = null, array $icons = null, array $data = null){

        $arr = array_merge(array_combine($data,$icons));
        print_r($arr);

        echo "<nav>";
        echo "<div class='{$background} nav-wrapper'>";
        echo "<a href='#' data-activates='mobile' class='button-collapse right'><i class='material-icons'>menu</i></a>";
        echo "<ul class='right hide-on-med-and-down'>";

        foreach($data as $key => $value) {

            echo "<li><a href='$value'>";
            foreach (array_combine($data,$icons) as $k => $v){
            echo "<i class='material-icons left'>$v</i>";
            }
            echo "$key</a></li>";

        }

        echo "</ul>";

        echo "<ul class='{$background} side-nav' id='mobile'>";
        echo 'menu';
        echo "</ul>";
        echo "</div>";
        echo "</nav>";

    }

    public function menuNavbarFixTopH($background = null, array $data = null) {
        //fixed-top
        $background = (isset($background) ? " bg-".$background : "");
        $style = ($background==null ? " style='background:#41B2BF;'" : "");

        echo "<nav class='navbar navbar-expand-lg fixed-top navbar-dark{$background}'{$style} role='navigation'> ";
        echo "<button class='navbar-toggler navbar-toggler-right' type='button' data-toggle='collapse' data-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>";
        echo "<span class='navbar-toggler-icon'></span>";
        echo "</button>";
        echo "<a class='navbar-brand' href='index'>Denis Sena</a>";
        echo "<div class='collapse navbar-collapse' id='navbarSupportedContent'>";
        if ($data == null):
            echo " <ul class='navbar-nav'>";
            echo "<li class='nav-item text-lg-right'>";
            echo "Defina seu menu";
            echo "</li>";
            echo "</ul>";
        else:
            foreach($data as $key => $value)
            {
                echo " <ul class='navbar-nav'>";
                echo "<li class='nav-item'>";
                echo "<a class='nav-link' href='$value'>$key</a>";
                echo "</li>";
                echo "</ul>";
            }
            echo "</div>";
            echo "</nav>";
        endif;
    }

    public function menuNavbarFixBottomH($background = null, array $data = null) {
        //fixed-bottom
        $background = (isset($background) ? " bg-".$background : "");
        $style = ($background==null ? " style='background:#41B2BF;'" : "");

        echo "<nav class='navbar navbar-expand-lg fixed-bottom navbar-dark {$background}'{$style} role='navigation'>";
        echo "<button class='navbar-toggler navbar-toggler-right' type='button' data-toggle='collapse' data-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>";
        echo "<span class='navbar-toggler-icon'></span>";
        echo "</button>";
        echo "<a class='navbar-brand' href='index'>Denis Sena</a>";
        echo "<div class='collapse navbar-collapse' id='navbarSupportedContent'>";
        echo "<a class='navbar-brand' href='index'>Denis Sena</a>";
        if ($data == null):
            echo " <ul class='navbar-nav'>";
            echo "<li class='nav-item'>";
            echo "Defina seu menu";
            echo "</li>";
            echo "</ul>";
        else:
            foreach($data as $key => $value)
            {
                echo " <ul class='navbar-nav'>";
                echo "<li class='nav-item'>";
                echo "<a class='nav-link' href='$value'>$key</a>";
                echo "</li>";
                echo "</ul>";
            }
            echo "</div>";
            echo "</nav>";
        endif;
    }

}