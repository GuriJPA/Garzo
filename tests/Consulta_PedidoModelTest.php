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
                $item->id_pedido = 5;
                $item->id_subpedido = 2;
                $item->id_producto = 4;
                $item->cantidad  = 7;
                $item->fecha='';
                $item->id_mesa = 2;
                $item->id_restaurante = 1;
                $item->id_estado  = 3;
                array_push($items, $item);
                $this->assertEquals($items, $this->cp->get_pedidos(2));
            }
            
    public function test_set_estado_finalizado(){

        $MesaPrin=[];
        $MesaPrin =new Pedido();
        //guardo los pedidos de la mesa 2
        $MesaPrin=$this->cp->get_pedidos(2);
        //modifico el pedido con el id 5 que esta en la mesa 2
        $this->cp->set_estado_pidio_cuenta(5);
        $this->cp->set_estado_finalizado(2);
        $MesaPrueb=[];
        $MesaPrueb =new Pedido();
        $MesaPrueb=$this->cp->get_pedidos(1);
        
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

        

}

?>