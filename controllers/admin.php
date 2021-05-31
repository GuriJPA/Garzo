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
    
    function adm_pedido(){
        $this->loadModel('consulta_pedido');
        $pedidos = $this->model->get_pedidos('');
        $this->view->pedidos = $pedidos;

        $this->loadModel('consulta_product');
        $productos = $this->model->get_productos('');
        $this->view->productos = $productos;

        $this->loadModel('consulta_mesa');
        $mesas = $this->model->get_mesas('');
        $this->view->mesas = $mesas;

        $this->loadModel('consulta_estado');
        $estados = $this->model->get_estados();
        $this->view->estados = $estados;

        
        $this->view->render('admin/adm_pedido');
    }

    function tomar_pedido(){
        //echo "<p>Entrando</p>";
        $IdPed = $_POST['id_pedido'];
        //echo  $producto_r[0];
        $this->loadModel('consulta_pedido');
        $this->model->set_estado_en_preparacion($IdPed);
    }

    function esta_listo(){
        $listo = $_POST['array_id_es'];
        $this->loadModel('consulta_pedido');
        if($listo[1]==2){
        $this->model->set_estado_listo($listo[0]);}
        if($listo[1]==3){
        $this->model->set_estado_en_preparacion($listo[0]);}
    }

    function adm_product(){
        $this->loadModel('consulta_product');
        $productos = $this->model->get_productos('');
        $this->view->productos = $productos;
        $this->view->render('admin/adm_product');
    }
   

    
}

?>