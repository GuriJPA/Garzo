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
    <a href="<?php echo constant('URL'); ?>admin"><input type="button" value="Volver"/></a>
    <br>
    <br>
    <div>
        <table id='tabla_mesas'>
            
            <tbody id='mesas'>
                <?php
                include_once 'models/mesa.php';
                include_once 'models/pedido.php';
                include_once 'models/producto.php';
                include_once 'models/estado.php';
                $total = 0;
                $subtotal = 0;
                $totales = [];
                $ValidarCobro=array();
                $indice= 0;
                
                foreach($this->mesas as $row){
                    $mesa = new Mesa();
                    $mesa = $row;
                    $contador = 1;


                    //Valida COBRAR MESA/////////////////////////////////////////////////////////////////////

                    $idMesa=$mesa->id_mesa;
                    $cont=0;
                    
                    foreach($this->pedidos as $row){
                        $pedido = new Pedido();
                        $pedido = $row;
                        $Id=$pedido->id_pedido;  
                        $es=$pedido->id_estado;    
                        if($pedido->id_mesa == $mesa->id_mesa){
                            if($es!=4){
                                $reemplazo=array($idMesa=>0);
                                $ValidarCobro=array_replace($ValidarCobro,$reemplazo);
                                $cont++;
                                }
                                if($es == 4 && $cont ==0 ){
                        
                                    $reemplazo=array($idMesa=>1);
                                    $ValidarCobro=array_replace($ValidarCobro,$reemplazo);

                                }                          
                            }                          
                    }
                        
                    
                    $ValidarcobroJSON = json_encode($ValidarCobro);
                    ///////////////////////////////////////////////////////////////////////////////////////

                        // recorro todos los pedidos
                        foreach($this->pedidos as $row){
                            $pedido = new Pedido();
                            $pedido = $row;
                            $Id=$pedido->id_pedido;  
                            $es=$pedido->id_estado;
                            //calcula el monto total del producto que esta en el pedido
                            //recorro todos los producto hasta que encuentro el que tiene la misma id                
                            foreach($this->productos as $row){
                                $producto = new Producto();
                                $producto = $row;
                                
                                if($producto->id_producto == $pedido->id_producto ){
                                    $precio = $producto->precio;
                                    $subtotal= $precio*$pedido->cantidad;   // cargo la variable subtotal con el precio * cantidad
                                }
                            }
                            //recorro todos los estados para comparar con estado del pedido y guardar el nombre del estado
                            /*foreach($this->estados as $row){
                                $estado = new Estado();
                                $estado = $row;
                                if($estado->id_estado == $pedido->id_estado){
                                    $estadoPedido = $estado->nombre;
                                }
                            }*/
                            
                            //imprime solamente los pedidos de la mesa
                            if($pedido->id_mesa == $mesa->id_mesa){

                                
                                if($pedido->id_subpedido == $contador){  
                                    $total = $total + $subtotal;                                                                 
                                }
                                else{
                                    $contador++;
                                    array_push($totales, $total);
                                    $total = $subtotal;
                                }
                            }
                        }
                        array_push($totales, $total); 
                        $total = 0;        
                } 
                ?>
            </tbody>  
        </table>
    </div>
    <br>
    <br>
    <div>
        <table id='tabla_mesas' style="border: 10px solid black; cellspacing : 100px; background: darkgray;">
            
            <tbody id='mesas' style="cellspacing : 20px;">
                <?php
                $totalesSinCero = [];
                foreach($totales as &$valor){
                    if($valor!=0)
                        array_push($totalesSinCero, $valor);
                        
                }
                unset($valor);
                

                // recorrro todas las mesas
                foreach($this->mesas as $row){
                    $mesa = new Mesa();
                    $mesa = $row;
                    $contador = 1;
                    //$pidioMozo = $mesa->pidioMozo;
                    
                    
                        
                    echo "<tr>
                        <td>N MESA $mesa->id_mesa</td>                     
                        <td><input type='button' onclick=CobrarMesa($mesa->id_mesa,$ValidarcobroJSON) value='COBRAR MESA'/></td>
                        <td><input type='button'  value='SE SOLICITA MOZO: '/></td>
                        </tr>";
                       
                    echo "<tr>
                        <td>N PEDIDO</td>                     
                        <td>ESTADO</td>
                        <td>TOTAL</td>
                        <td>TOMAR PEDIDO</td>
                        <td>ESTA LISTO?</td>
                        <td>FECHA Y HORA</td>
                        </tr>";
                        // recorro todos los pedidos
                        foreach($this->pedidos as $row){
                            $pedido = new Pedido();
                            $pedido = $row;
                            $Id=$pedido->id_pedido;  
                            $es=$pedido->id_estado;
                            
                            //calcula el monto total del producto que esta en el pedido
                            //recorro todos los producto hasta que encuentro el que tiene la misma id                
                            /*foreach($this->productos as $row){
                                $producto = new Producto();
                                $producto = $row;
                            }*/
                            //recorro todos los estados para comparar con estado del pedido y guardar el nombre del estado
                            foreach($this->estados as $row){
                                $estado = new Estado();
                                $estado = $row;
                                if($estado->id_estado == $pedido->id_estado){
                                    $estadoPedido = $estado->nombre;
                                }
                            }
                            
                            //imprime solamente los pedidos de la mesa
                            if($pedido->id_mesa == $mesa->id_mesa){
                                if($pedido->id_subpedido == $contador){
                                   
                                    echo "<tr>
                                    <td>$pedido->id_subpedido</td>
                                    <td>$estadoPedido</td>
                                    <td>$ $totalesSinCero[$indice]</td>                        
                                    <td><input type='button' onclick= TomarPedido(id,$es) id= $Id value='Tomar Pedido'/></td>
                                    <td><input type='button' onclick= EstaListoSiNo(id,$es) id=$Id value='Si/No'/></td>
                                    <td>$pedido->fecha</td>
                                    <td><input type='button' onclick= fun_detalle_pedido($pedido->id_subpedido,$mesa->id_mesa) id='Detalle' value='Detalle'/></td>
                                    </tr>";
                                    $contador++;
                                    $indice ++;
                                }                                
                            }
                            
                        }         
                }        
                ?>
            </tbody>  
        </table>
    </div>

    <div id='detalle' class='div_emergente'>
        <div id='datos' class='ventana_emergente'>
        <button  type='submit' onclick='cancelar_detalle_pedido()' class='btn_x' >X</button>
            <div id="detalle_aux" class='form-group' align='center'></div>
        </div>
    </div>

    
</body>
</html>
<script language="JavaScript">
  function redireccionar() {
    setTimeout("document.location.reload()", 30000);
  }
  </script>