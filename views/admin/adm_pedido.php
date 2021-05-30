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
</head>
<body>
    <a href="<?php echo constant('URL'); ?>admin"><input type="button" value="Volver"/></a>
    <br>
    <br>
    <div>
        <table id='tabla_mesas' style="border: 1px solid black;">
            
            <tbody id='mesas'>
                <?php
                include_once 'models/mesa.php';
                include_once 'models/pedido.php';
                include_once 'models/producto.php';

                foreach($this->mesas as $row){
                    $mesa = new Mesa();
                    $mesa = $row; 
                    echo "<tr>
                        <td>N MESA $mesa->id_mesa</td>                     
                        <td><input type='button' value='COBRAR MESA'/></td>
                        <td><input type='button' value='SE SOLICITA MOZO'/></td>

                        </tr>";
                    echo "<tr>
                        <td>N PEDIDO</td>                     
                        <td>ESTADO</td>
                        <td>TOTAL</td>
                        <td>TOMAR PEDIDO</td>
                        <td>ESTA LISTO?</td>
                        <td>FECHA Y HORA</td>
                        </tr>";
                        foreach($this->pedidos as $row){
                            $pedido = new Pedido();
                            $pedido = $row;       
                                               
                            foreach($this->productos as $row){
                                $producto = new Producto();
                                $producto = $row;
                                if($producto->id_producto == $pedido->id_producto ){
                                    $total += $producto->precio * $pedido->cantidad;
                                }
                            }
                            
                            
                            //$total = $pedido->id_producto->precio;
                            /*if($pedido->id_mesa == $mesa->id_mesa){
                                $total = ($pedido->id_producto->precio);
                            }*/
                            if($pedido->id_mesa == $mesa->id_mesa){
                                echo "<tr>
                                <td>$pedido->id_subpedido</td>
                                <td>$pedido->estado</td>
                                <td>$ $total</td>                        
                                <td><input type='button' value='Tomar Pedido'/></td>
                                <td><input type='button' value='Si/No'/></td>
                                <td>$pedido->fecha</td>
                                <td><input type='button' value='Detalle'/></td>
                                </tr>";
                            }
                        }        
                }        
                ?>
            </tbody>  
        </table>
    </div>
    <br>
    <br>
    <div>
        <table id='tabla_pedidos' style="border: 1px solid black;">
            <thead>
                <tr>
                <th>N PEDIDO</th>
                <th>ESTADO</th>
                <th>TOTAL</th>
                <th>TOMAR PEDIDO</th>
                <th>ESTA LISTO?</th>                
                <th>FECHA Y HORA</th>
                </tr>
            </thead>            
            <tbody id='pedidos'>
                <?php
                include_once 'models/pedido.php';
                foreach($this->pedidos as $row){
                    $pedido = new Pedido();
                    $pedido = $row; 
                    echo "<tr>
                        <td>$pedido->id_pedido</td>
                        <td>$pedido->estado</td>
                        <td>$pedido->cantidad</td>                        
                        <td><input type='button' value='Tomar Pedido'/></td>
                        <td><input type='button' value='Si/No'/></td>
                        <td>$pedido->fecha</td>
                        <td><input type='button' value='Detalle'/></td>
                        </tr>";
                }        
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>