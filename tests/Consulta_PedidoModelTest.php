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
                $item->id_estado  = 5;
                array_push($items, $item);
                $this->assertEquals($items, $this->cp->get_pedidos(2));
            }
            
            
        

}

?>