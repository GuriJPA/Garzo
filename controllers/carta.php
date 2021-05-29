<?php

class Carta extends Controller{

    function __construct(){
        parent::__construct();
        //echo "<p>Nuevo controlador Carta</p>";
    }


    function detalle_producto($param){
        $this->loadModel('consulta_product');
        $producto = $this->model->get_producto($param[0]);
        $this->view->producto = $producto;
        $this->view->render('carta/producto/detalle');
    }
}

?>