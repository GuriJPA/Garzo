<?php

use PHPUnit\Framework\TestCase;
require_once 'config/config.php';

class Consulta_ProductModelTest extends TestCase
{

    private $cp;

    public function setup(): void
    {
        $this->cp = new Consulta_ProductModel();
    }

    public function test_get_producto()
    {

        $items = [];
        
            $item = new Producto();
            $item->id_producto = 5;
            $item->nombre    = 'hamburguesa premium';
            $item->descripcion  = 'descripcion premium';
            $item->precio = 500;
            $item->foto    = '../../public/img/carta/burger/burger_3.jpg';
            $item->stock  = 5;
            $item->categoria  = 'hamburguesa';

            array_push($items, $item);
        
        $this->assertEquals($items, $this->cp->get_producto(5));
    }    

}
