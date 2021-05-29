<?php

class Admin extends Controller{

    function __construct(){
        parent::__construct();
        //echo "<p>Nuevo controlador Admin</p>";
    }

    function render(){
        $this->view->render('admin/index');
    }

    function saludo(){
        echo "<p>Ejecutaste el método Saludo desde Admin</p>";
    }
    
}

?>