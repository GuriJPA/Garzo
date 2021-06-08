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
    //recibe un ID y consulta con el mismo  en la base de datos y retorna un vector 
    function verProducto($param = null){
        $idProducto = $param[0];
        $producto = $this->model->getById($idProducto);

        session_start();
        $_SESSION['id_verProducto'] = $producto->id_producto;
        $this->view->producto = $producto;
        $this->view->mensaje = "";
        $this->view->render('admin/login/adm_product'); //ver!!!!!!!!!
    }
    
    function detalle_producto($param){
        $this->loadModel('consulta_product');//ver!!!!
        $producto = $this->model->get_producto($param[0]);
        $this->view->producto = $producto;
        $this->view->render('admin/login/editar');
    }

    function actualizar_producto(){
        $Producto = $_POST['ProductoArray'];//lo que recibe del .ajax el array con los datos del producto
        $this->loadModel('consulta_product');
        $this->model->update(['id_producto' => $Producto[0],//
                              'nombre'      => $Producto[1],
                              'descripcion' => $Producto[2],
                              'precio'      => $Producto[3], 
                              'foto'        => $Producto[4], 
                              'stock'       => $Producto[5], 
                              'categoria'   => $Producto[6]
        ]);
    }

    function confirmacion($param){
        $this->loadModel('consulta_product');
        $producto = $this->model->get_producto($param[0]);
        $this->view->producto = $producto;
        $this->view->render('admin/login/eliminar');
    }

    function eliminar_producto($param){
        echo "<p>Ejecutaste el método eliminar_producto</p>";
        $this->loadModel('consulta_product');
        $this->model->delete_producto($param[0]);
    }

    function agregar_producto(){
        $Producto = $_POST['ProductoArray'];//lo que recibe del .ajax el array con los datos del producto
        $this->loadModel('consulta_product');
        $this->model->add(['id_producto' => $Producto[0],//
                              'nombre'      => $Producto[1],
                              'descripcion' => $Producto[2],
                              'precio'      => $Producto[3], 
                              'foto'        => $Producto[4], 
                              'stock'       => $Producto[5], 
                              'categoria'   => $Producto[6]
        ]);
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

    function cobrar_mesa(){
        $IDMesa = $_POST['IdMesa'];
        $this->loadModel('consulta_pedido');
        $this->model->set_estado_finalizado($IDMesa);}



    function adm_pedido_detalle(){
        $data = json_decode($_POST['array']);
        
        $this->loadModel('consulta_pedido');
        $pedidos = $this->model->get_pedidos('');//traigo los pedidos que tengan el id_mesa pasado
        $this->view->pedidos = $pedidos;

        $this->loadModel('consulta_product');
        $productos = $this->model->get_productos('');
        $this->view->productos = $productos;
        $this->view->subPedido=$data[0];
        $this->view->mesa = $data[1];
        
        
        //var_dump($data);
        
        
            
            $this->view->render('admin/detalle_pedido');
        }


}

