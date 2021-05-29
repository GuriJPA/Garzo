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

    function adm_product(){
        $this->loadModel('consulta_product');
        $productos = $this->model->get_productos('');
        $this->view->productos = $productos;
        $this->view->render('admin/adm_product');
    }
    //nuevo nuevo nuevo nuevo
    function adm_pedido(){
        $this->loadModel('consulta_pedido');
        $pedidos = $this->model->get_pedidos('');
        $this->view->pedidos = $pedidos;
        $this->view->render('admin/adm_pedido');
    }

    
}

?>