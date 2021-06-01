<?php

include_once 'models/cuenta.php';

include_once 'models/producto.php';

class Pedir_Cuenta extends Controller{

    function __construct(){
        parent::__construct();
        //echo "<p>Nuevo controlador Pedir_Cuenta</p>";

        $this->pedir_cuenta();
        $this->num_comprobante();

    }

    function render(){
        $this->view->render('pedir_cuenta/index');
    }

    function saludo(){
        echo "<p>Ejecutaste el método Saludo desde Pedir_Cuenta</p>";
    }

    function pedir_cuenta(){
        //$cuenta;
        //LIMPIAR VARIABLE SESSION QUE CONTIENE LOS PRODUCTOS AGREGADOS DESDE LA VISTA 4
        $this->loadModel('consulta_pedido');
        $this->model->update_estado_pedidos($_SESSION['mesa']);
        //$cuenta = $this->model->get_cuenta($_SESSION['mesa']);
        //$this->view->cuenta = $cuenta;
    }

    function num_comprobante(){
        $this->view->num_comprobante = date('h-i-s_j-m-y_').rand(1000, 9999);
    }

    function cuenta_pdf($num_comprobante){
        $this->view->num_comprobante = $num_comprobante[0];    
        $cuenta;
        $this->loadModel('consulta_pedido');
        $cuenta = $this->model->get_cuenta($_SESSION['mesa']);
        $this->view->cuenta = $cuenta;
        $this->view->render('pedir_cuenta/comprobante');

    }

    
}

?>