<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style type="text/css">
	table, td, th {border: 1px solid black;}
    table {border-collapse: collapse;}
    </style>
    <link rel="stylesheet" type="text/css" href="<?php echo constant('URL'); ?>public/css/style.css">
    
    <script src="<?php echo constant('URL'); ?>public/js/main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
</head>
<body onLoad="redireccionar()">
   
    <br>
    <br>
    <div>
    <table id='tabla_mesas' style="border: 0px solid black; cellspacing : 50px; ">
            
    <tbody id='mesas' style="cellspacing : 20px;">
      <?php
                include_once 'models/mesa.php';
                include_once 'models/pedido.php';
                include_once 'models/producto.php';
                include_once 'models/estado.php';
               
                echo"   <div>
                        <tr>
                        <td>Lista de Productos</td>
                        <td>Cantidad</td>
                        <td>Sub Total</td>
                        </tr></div>";
                        

                        foreach($this->pedidos as $row){
                              $pedido = new Pedido();
                              $pedido = $row;
                              //echo $this->subPedido;
                              if($this->subPedido==$pedido->id_subpedido && $pedido->id_mesa==$this->mesa){
                              //recorro todos los producto hasta que encuentro el que tiene la misma id                
                                    foreach($this->productos as $row){
                                    $producto = new Producto();
                                    $producto = $row;
                                  
                                          if($producto->id_producto == $pedido->id_producto ){
                                                $Subtotal= $pedido->cantidad*$producto->precio;
                                                echo "<div>
                                                      <tr>
                                                      <td>$producto->nombre</td>
                                                      <td>$pedido->cantidad</td>
                                                      <td> $Subtotal</td>
                                                      </tr>
                                                      </div>";
                                                      
                                          }
                                    }
                              }
                        }

      ?>
      </tbody>
      </table>
                
      </div>
      </br>
      </br>
      </body>
</html>  