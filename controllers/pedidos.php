<?php

include_once 'models/producto.php';

class Pedidos extends Controller{

    function __construct(){
        parent::__construct();
        //echo "<p>Nuevo controlador Pedidos</p>";

    }

    function render(){

        $this->consultar_productos();

        //$this->view->$mensaje = $_SESSION['productos'];

        $this->view->render('pedidos/index');
    }

    function saludo(){
        echo "<p>Ejecutaste el método Saludo desde Pedidos</p>";
    }

    function consultar_productos(){
        
    
        $this->loadModel('consulta_pedido');

        

        $pedidos = [];

        $pedidos = $this->model->get_pedidos_u($_SESSION['mesa']);

        if(!(sizeof($pedidos) == 0)){
            $this->view->pedidos = $pedidos;
            //echo "Hay pedidos";
        }

        if(isset($_SESSION['productos'])){
            $i=0;
            $j=0;
            $productos_a = [];
            $producto_aux = $_SESSION['productos'];
            $this->loadModel('consulta_product');
            while($i < sizeof($producto_aux)){
                while(!(isset($producto_aux[$j]))){
                    $j++;
                }
                array_push($productos_a, $this->model->get_producto($producto_aux[$j][0]));
                $j++;
                $i++;
            }
            $this->view->productos = $productos_a;
        }
        
        
    }


    function eliminar_prod_pedido($param){
        //var_dump($_SESSION['productos']);
        unset( $_SESSION['productos'][$param[0]]);
        $this->consultar_productos();
        //echo "<br>";
        //var_dump($_SESSION['productos']);
        //echo "<br>";
        $this->view->render('pedidos/tabla_pedidos');
    }


    function hacer_pedido(){
        $this->loadModel('consulta_pedido');
        $subpedido = $this->model->get_subpedido($_SESSION['mesa']);
        $i=0;
        $j=0;
        while($i < sizeof($_SESSION['productos'])){
            
            while(!(isset($_SESSION['productos'][$j]))){
                $j++;
            }

            $this->model->add_pedidos($_SESSION['productos'][$j][0],$_SESSION['productos'][$j][1],$_SESSION['mesa'],$subpedido);

            $j++;
            $i++;
        }

        //vaciar variable SESSION
        unset($_SESSION['productos']);

        //error_log('tamano SESSION productos: '.sizeof($_SESSION['productos']));

        

        $this->consultar_productos();
        $this->view->render('pedidos/tabla_pedidos');


    }

}

?>