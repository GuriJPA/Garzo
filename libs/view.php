<?php

class View{

    function __construct(){
        //echo "<p>Vista base</p>";
    }

    //vamos a renderizar o cargar la vista que le pidamos
    function render($nombre){
        require 'views/' . $nombre . '.php';

    }
}

?>