<?php

class Login extends Controller{

    function __construct(){
        parent::__construct();
        //echo "<p>Nuevo controlador Login</p>";
    }

    function render(){
        $this->view->render('admin/login/index');
    }

    function saludo(){
        echo "<p>Ejecutaste el método Saludo desde Login</p>";
    }

    function iniciar(){
        $this->loadModel('iniciar');
        $var_iniciar = $this->model->query_logueo();
        if($var_iniciar == TRUE){
            $_SESSION["logueado"] = TRUE;
            $this->view->render('admin/index');
        }else{
            $mensaje = "Usuario y / o Contraseña erroneos. Intentelo de nuevo.";
            $this->view->mensaje = $mensaje;
            $this->view->render('admin/login/index');
        }
        
    }

    function finalizar(){
        @session_start();
	    session_destroy();
        $this->view->render('admin/login/index');
    }
}

?>