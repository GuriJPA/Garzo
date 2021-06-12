<?php

use PHPUnit\Framework\TestCase;
require_once 'config/config.php';

class Consulta_EstadoModelTest extends TestCase
{

    private $ce;

    public function setup(): void
    {
        $this->cp = new Consulta_EstadoModel();
    }

    public function test_get_estados()
    {
        $items = [];
            
                $item = new Estado();
                $item->id_estado = 1;
                $item->nombre = 'Pendiente a Tomar';
                array_push($items, $item);

                $item1 = new Estado();
                $item1->id_estado = 2;
                $item1->nombre = 'En preparacion';
                array_push($items, $item1);

                $item2 = new Estado();
                $item2->id_estado = 3;
                $item2->nombre = 'Listo';
                array_push($items, $item2);

                $item3 = new Estado();
                $item3->id_estado = 4;
                $item3->nombre = 'Pidio Cuenta';
                array_push($items, $item3);

                $item4 = new Estado();
                $item4->id_estado = 5;
                $item4->nombre = 'Finalizado';
                array_push($items, $item4);

                $this->assertEquals($items, $this->cp->get_estados());
    }
            
        

}

?>