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
            $item->nombre    = 'Hamburguesa Premium';
            $item->descripcion  = 'descripcion premium';
            $item->precio = 500;
            $item->foto    = '../../public/img/carta/burger/burger_3.jpg';
            $item->stock  = 5;
            $item->categoria  = 'hamburguesa';

            array_push($items, $item);
        
        $this->assertEquals($items, $this->cp->get_producto(5));
    }

    public function test_get_productos()
    {

        $items = [];
        
            $item =  new Producto();
            $item2 = new Producto();
            $item3 = new Producto();
            $item4 = new Producto();
            
            
            $item->id_producto = 3;
            $item->nombre    = 'Hamburguesa Doble';
            $item->descripcion  = 'Descripcion: 2 medallones, queso, pan';
            $item->precio = 349;
            $item->foto    = '../../public/img/carta/burger/burger_1.jpg';
            $item->stock  = 10;
            $item->categoria  = 'hamburguesa';
            $item->cantidad  = null;
            array_push($items, $item);
            
            $item2->id_producto = 4;
            $item2->nombre    = 'Hamburguesa Triple';
            $item2->descripcion  = 'Descripcion: 3 medallones, queso, pan';
            $item2->precio = 400;
            $item2->foto    = '../../public/img/carta/burger/burger_2.jpg';
            $item2->stock  = 11;
            $item2->categoria  = 'hamburguesa';
            $item->cantidad  = null;
            array_push($items, $item2);


            $item3->id_producto = 5;
            $item3->nombre    = 'Hamburguesa Premium';
            $item3->descripcion  = 'descripcion premium';
            $item3->precio = 500;
            $item3->foto    = '../../public/img/carta/burger/burger_3.jpg';
            $item3->stock  = 5;
            $item3->categoria  = 'hamburguesa';
            $item->cantidad  = null;
            array_push($items, $item3);
           
            $item4->id_producto = 6;
            $item4->nombre    = 'Hamburguesa Garzon';
            $item4->descripcion  = 'descripcion de garzon';
            $item4->precio = 400;
            $item4->foto    = '../../public/img/carta/burger/burger_4.jpg';
            $item4->stock  = 7;
            $item4->categoria  = 'hamburguesa';
            $item->cantidad  = null;
            array_push($items, $item4);
        

        
        $this->assertEquals($items, $this->cp->get_productos('hamburguesa'));
    }

    
    
    public function test_update()
    {
            $item[0] =10;
      
            $item[1]  = 'Flan';
            $item[2]   = 'Vainilla';
            $item[3] = 151;
            $item[4]  = '../../public/img/carta/postre/flan_vainilla.jpg';
            $item[5] = 10;
            $item[6] = 'postre';

         //   array_push($items, $item);
        
        $this->assertEquals(true, $this->cp->update([   
        'id_producto'=> $item[0],    
        'nombre'      => $item[1],
        'descripcion' => $item[2],
        'precio'      => $item[3], 
        'foto'        => $item[4], 
        'stock'       => $item[5], 
        'categoria'   => $item[6]
])) ;
    }

    
    public function test_add()
    {
          //  $item[0] =12;
      
            $item[1]  = 'Flan2';
            $item[2]   = 'Vainilla2';
            $item[3] = 151;
            $item[4]  = '../../public/img/carta/postre/flan_vainilla.jpg';
            $item[5] = 10;
            $item[6] = 'postre';


            
         //   array_push($items, $item);
        
        $this->assertEquals(true, $this->cp->add([   'nombre'      => $item[1],
        'descripcion' => $item[2],
        'precio'      => $item[3], 
        'foto'        => $item[4], 
        'stock'       => $item[5], 
        'categoria'   => $item[6]
                ]));
        }

        function test_delete_producto(){
            $item[1]  = 'Flan2';
            $item[2]   = 'Vainilla2';
            $item[3] = 151;
            $item[4]  = '../../public/img/carta/postre/flan_vainilla.jpg';
            $item[5] = 10;
            $item[6] = 'postre';
           
            $this->cp->add([   'nombre'      => $item[1],
                 'descripcion' => $item[2],
                 'precio'      => $item[3], 
                  'foto'        => $item[4], 
                 'stock'       => $item[5], 
                 'categoria'   => $item[6]
        ]);
    
        $this->assertEquals(true, $this->cp->delete_producto(12));
        }    


        
}