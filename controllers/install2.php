<?php

class Install extends Controller{

    function __construct(){
        parent::__construct();
        //echo "<p>Nuevo controlador Install</p>";
    }

    function render(){
        $this->view->render('install/index');
    }

    function saludo(){
        echo "<p>Ejecutaste el método Saludo</p>";
    }

    function conectar(){
        $this->loadModel('install');
        $var_conectar = $this->model->conectar_mysql();
        if($var_conectar == TRUE){
            $var_create_db = $this->model->cargar_db();
            if($var_create_db == FALSE){
                $mensaje = "<br>Error al crear la base de datos<br>";
                $this->view->mensaje = $mensaje;
                $this->view->render('install/index');
            }else{
                $this->view->render('install/datos');
            }
        }else{
            $mensaje = "<br>Usuario y / o Contraseña erroneos. Intentelo de nuevo. <br>".$var_conectar;
            $this->view->mensaje = $mensaje;
            $this->view->render('install/index');
        }

    }

    function end_install(){
        $this->loadModel('install');
        $var_config = $this->model->config_admin();
        if($var_config == TRUE){
            unset($_SESSION['loginUsuario_mysql']);
            unset($_SESSION['loginPassword_mysql']);
            $this->view->render('install/success');
            unlink("controllers/install.php");
        }else{
            $mensaje = "<br>Error al crear la base de datos<br>";
            $this->view->mensaje = $mensaje;
            $this->view->render('install/datos');
        }

    }
}

?>