<?php

include_once 'models/producto.php';

class Pedidos extends Controller{

    function __construct(){
        parent::__construct();
        //echo "<p>Nuevo controlador Pedidos</p>";

    }

    function render(){

        $this->consultar_productos();

        //$this->view->$mensaje = $_SESSION ['matriz_pedidos'];

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

        if(isset($_SESSION ['matriz_pedidos'])){
            $i=0;
            $j=0;
            $productos_a = $_SESSION ['matriz_pedidos'];
            $producto_aux = $_SESSION ['matriz_pedidos'];
            $this->loadModel('consulta_product');
            while($i < sizeof($producto_aux)){
                while(!(isset($producto_aux[$j]))){
                    $j++;
                }
                //array_push($productos_a, $this->model->get_producto($producto_aux[$j][0]));
                $productos_a[$j][0] = $this->model->get_producto($producto_aux[$j][0]);
                $j++;
                $i++;
            }
            $this->view->productos = $productos_a;
        }
        
        
    }


    function eliminar_prod_pedido($param){
        //var_dump($_SESSION ['matriz_pedidos']);
        foreach($param as $item){
            error_log($item);
            unset( $_SESSION ['matriz_pedidos'][$item]);
        }

        //unset( $_SESSION ['matriz_pedidos'][$param[0]]);
        $this->consultar_productos();
        //echo "<br>";
        //var_dump($_SESSION ['matriz_pedidos']);
        //echo "<br>";
        $this->view->render('pedidos/tabla_pedidos');
    }


    function hacer_pedido(){
        $this->loadModel('consulta_pedido');
        $subpedido = $this->model->get_subpedido($_SESSION['mesa']);
        $i=0;
        $j=0;
        while($i < sizeof($_SESSION ['matriz_pedidos'])){
            
            while(!(isset($_SESSION ['matriz_pedidos'][$j]))){
                $j++;
            }

            $this->model->add_pedidos($_SESSION ['matriz_pedidos'][$j][0],$_SESSION ['matriz_pedidos'][$j][1],$_SESSION['mesa'],$subpedido);

            $j++;
            $i++;
        }

        //vaciar variable SESSION
        unset($_SESSION ['matriz_pedidos']);
        unset($_SESSION['id_matriz']);

        //error_log('tamano SESSION productos: '.sizeof($_SESSION ['matriz_pedidos']));

        

        $this->consultar_productos();
        $this->view->render('pedidos/tabla_pedidos');


    }

}

?>