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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js" type="text/javascript"></script>
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
                include_once 'models/estado.php';
                $total = 0;
                $subtotal = 0;
                $totales = [];
                $ValidarCobro=array();
                
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

                    echo "<tr>
                        <td>N MESA $mesa->id_mesa</td>                     
                        <td><input type='button' onclick=CobrarMesa($mesa->id_mesa) value='COBRAR MESA'/></td>
                        <td><input type='button' value='SE SOLICITA MOZO'/></td>
                    
                        </tr>";
                    echo "<tr>
                        <td>N PEDIDO</td>                     
                        <td>ESTADO</td>
                        <td>PRECIO UNIT</td>
                        <td>CANTIDAD</td>
                        <td>SUBTOTAL</td>
                        <td>TOTAL</td>
                        <td>TOMAR PEDIDO</td>
                        <td>ESTA LISTO?</td>
                        <td>FECHA Y HORA</td>
                        </tr>";
                            
                        foreach($this->pedidos as $row){
                            $pedido = new Pedido();
                            $pedido = $row;
                            $Id=$pedido->id_pedido;  
                            $es=$pedido->id_estado;
                           
                           

                            //calcula el monto total de los productos que estan en el mismo pedido                
                            foreach($this->productos as $row){
                                $producto = new Producto();
                                $producto = $row;
                                
                                if($producto->id_producto == $pedido->id_producto ){
                                    $precio = $producto->precio;
                                    $subtotal= $precio*$pedido->cantidad;
                                    
                                }
                            }
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
                                    $total = $total + $subtotal;                              
                                    echo "<tr>
                                    <td>$pedido->id_subpedido</td>
                                    <td>$estadoPedido</td>
                                    <td>$ $precio</td>
                                    <td>$pedido->cantidad</td>
                                    <td>$ $subtotal</td>
                                    <td>$ $total</td>                        
                                    <td><input type='button' onclick= TomarPedido(id,$es) id= $Id value='Tomar Pedido'/></td>
                                    <td><input type='button' onclick= EstaListoSiNo(id,$es) id=$Id value='Si/No'/></td>
                                    <td>$pedido->fecha</td>
                                    <td><input type='button' onclick= id='Detalle' value='Detalle'/></td>
                                    </tr>";

                                    
                                   
                                }
                                else{
                                    $contador++;
                                    array_push($totales, $total);
                                    $total = $subtotal;
                                    echo "<tr>
                                    <td>$pedido->id_subpedido</td>
                                    <td>$estadoPedido</td>
                                    <td>$ $precio</td>
                                    <td>$pedido->cantidad</td>
                                    <td>$ $subtotal</td>
                                    <td>$ $total</td>                        
                                    <td><input type='button' onclick= TomarPedido(id,$es) id= $Id value='Tomar Pedido'/></td>
                                    <td><input type='button' onclick= EstaListoSiNo(id,$es) id=$Id value='Si/No'/></td>
                                    <td>$pedido->fecha</td>
                                    <td><input type='button' onclick= id='Detalle' value='Detalle'/></td>
                                    </tr>";

                                    
                                }   
                            }
                        }
                        $total = 0;        
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


<script type="text/javascript">

function TomarPedido(id,es){

    
    //alert(es);
    if(es==1){
        $.ajax({
                type: "POST",
                 url: "../admin/tomar_pedido",
                data: {id_pedido : id},
                dataType: "html",
                beforeSend: function(){},
                error: function(){
                alert("error petición ajax");
                                     },
                success: function(data){
                alert("Se tomo el pedido");}
                            });

    location.reload(true);
    
        }
    location.reload(true);    
}


function EstaListoSiNo(id,es){
    let datos=[id, es];
    if (es==2){
    $.ajax({
            type: "POST",
             url: "../admin/esta_listo",
            data: {array_id_es : datos},
            dataType: "html",
            beforeSend: function(){},
            error: function(){
            alert("error petición ajax");
                                 },
            success: function(data){
            //alert("Se tomo el pedido");
            }
                        });

location.reload(true);}
location.reload(true);
}

function CobrarMesa(idmesa){
    let AR=<?php echo $ValidarcobroJSON; ?>;    
    if(AR[idmesa]==1){
        $.ajax({
            type: "POST",
             url: "../admin/cobrar_mesa",
            data: {IdMesa : idmesa},
            dataType: "html",
            beforeSend: function(){},
            error: function(){
            alert("error petición ajax");
                                 },
            success: function(data){
            alert("Se cobro la Mesa "+idmesa);
            }
        });
        location.reload(true);
    }
}


</script>