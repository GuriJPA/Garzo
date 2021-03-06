<?php

use PHPUnit\Framework\TestCase;
require_once 'config/config.php';

class Consulta_PedidoModelTest extends TestCase
{

    private $cp;

    public function setup(): void
    {
        $this->cp = new Consulta_PedidoModel();
    }

    public function test_get_pedidos()
    {

        $items = [];
        
    
            
                $item = new Pedido();
                $item->id_pedido = 1;
                $item->id_subpedido = 1;
                $item->id_producto = 1;
                $item->cantidad  = 5;
                $item->fecha='';
                $item->id_mesa = 3;
                $item->id_restaurante = 1;
                $item->id_estado  = 3;
                array_push($items, $item);
                $this->assertEquals($items, $this->cp->get_pedidos(3));
            }
            
    public function test_set_estado_finalizado(){

        $MesaPrin=[];
        $MesaPrin =new Pedido();
        //guardo los pedidos de la mesa 2
        $MesaPrin=$this->cp->get_pedidos(3);
        //modifico el pedido con el id 5 que esta en la mesa 2
        //$this->cp->set_estado_pidio_cuenta(5);
        $this->cp->set_estado_finalizado(3);
        $MesaPrueb=[];
        $MesaPrueb =new Pedido();
        $MesaPrueb=$this->cp->get_pedidos(3);
        
        //Vuelvo al estado anterior del pedido modificado en este test "PRECAUCION DE QUE EL ESTADO ANTERIOR A MODIFICAR NO ESTE EN EL ESTADO 1 (PENDIENTE A TOMAR)"//////// 
        foreach( $MesaPrin as $row){
            $mesa1 = new Pedido();
            $mesa1 = $row;
            if($mesa1->id_estado==2){
            $this->cp->set_estado_en_preparacion($mesa1->id_pedido);}
            if($mesa1->id_estado==3){
                $this->cp->set_estado_listo($mesa1->id_pedido);}
                if($mesa1->id_estado==4){
                    $this->cp->set_estado_pidio_cuenta($mesa1->id_pedido);}
        }
        /////////////////////////////////////////////////////////////////////
        
        //Aca prueba el test/////////////////////////////////////////////////////
        foreach($MesaPrueb as $row){
            $mesa = new Pedido();
            $mesa = $row;
            $this->assertEquals(5,$mesa->id_estado);}
        }
        ////////////////////////////////////////////////////////////////////////


        public function test_add_pedidos(){      
     
            $this->assertEquals(true, $this->cp->add_pedidos(1,2,2,2));
    
        }
        
        public function test_get_subpedido(){
            $this->cp->add_pedidos(1,2,2,2);
            $this->assertEquals(1, $this->cp->get_subpedido(2));
        }

        public function test_set_estado_en_preparacion(){
       
        $this->assertEquals(true, $this->cp->set_estado_en_preparacion(1));
        $this->cp->set_estado_listo(1);
        }

        public function test_set_estado_listo(){
       
            $this->assertEquals(true, $this->cp->set_estado_listo(1));
            
            }

        public function test_set_estado_pidio_cuenta(){
       
            $this->assertEquals(true, $this->cp->set_estado_pidio_cuenta(1));
            $this->cp->set_estado_listo(1);
        }

        public function test_update_estado_pedidos(){
            $this->assertEquals(true, $this->cp->update_estado_pedidos(3));
            $this->cp->set_estado_listo(1);

        }

        public function test_get_pedidos_u(){
                 $items=[];
                 $item = new Producto();
                 $item->id_producto = 1;
                 $item->nombre = 'Cerveza Ipa';
                 $item->precio = 150;
                 $item->cantidad = 5;
                 array_push($items, $item);
                 $this->assertEquals($items, $this->cp->get_pedidos_u(3));
        }

        public function test_get_cuenta(){
            $items=[];
            $cuenta = new Cuenta();
            $item = new Producto();
            $item->id_producto = 1;
            $item->nombre = 'Cerveza Ipa';
            $item->precio = 150;
            $item->cantidad = 5;
            array_push($items, $item);
            $cuenta->productos = $items;
            $cuenta->fecha = date('j-m-y h:i:s');
            $cuenta->mesa = 3;
            $cuenta->nombre_restaurante = 'Antares';
            $this->assertEquals($cuenta, $this->cp->get_cuenta(3));

        }



}

?>