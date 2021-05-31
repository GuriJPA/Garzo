<?php

class Carta extends Controller{

    function __construct(){
        parent::__construct();
        //echo "<p>Nuevo controlador Carta</p>";
    }

    function render(){
        $this->view->render('carta/index');
    }

    function saludo(){
        echo "<p>Ejecutaste el método Saludo desde Carta</p>";
    }

    function cargar_carta($param){
        $this->loadModel('consulta_product');
        $productos = $this->model->get_productos($param[0]);
        $this->view->productos = $productos;
        $this->view->render('carta/producto/index');
    }


    function detalle_producto($param){
        $this->loadModel('consulta_product');
        $producto = $this->model->get_producto($param[0]);
        $this->view->producto = $producto;
        $this->view->render('carta/producto/detalle');
    }


    
    function cargar_pedido(){
        $producto_r = $_POST['array_p'];
        $matriz_pedidos[$_SESSION['id_matriz']][0]=($producto_r[0]);
        $matriz_pedidos[$_SESSION['id_matriz']][1]=($producto_r[1]);
        $_SESSION['id_matriz']=$_SESSION['id_matriz']+1;
    }

}

?>