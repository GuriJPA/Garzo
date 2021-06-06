<?php

class Pedidos extends Controller{

    function __construct(){
        parent::__construct();
        //echo "<p>Nuevo controlador Pedidos</p>";
    }

    function render(){
        $this->view->render('pedidos/index');
    }

    function saludo(){
        echo "<p>Ejecutaste el método Saludo desde Pedidos</p>";
    }

    
}

?>