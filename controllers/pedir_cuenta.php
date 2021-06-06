<?php

class Pedir_Cuenta extends Controller{

    function __construct(){
        parent::__construct();
        //echo "<p>Nuevo controlador Pedir_Cuenta</p>";
    }

    function render(){
        $this->view->render('pedir_cuenta/index');
    }

    function saludo(){
        echo "<p>Ejecutaste el método Saludo desde Pedir_Cuenta</p>";
    }

    
}

?>