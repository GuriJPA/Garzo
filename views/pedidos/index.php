<?php include_once 'models/producto.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/default.css">
    <style type="text/css">
        .table_1{border: 1px solid black;}
        table{border-collapse: collapse;}
        .table_2{border: 0px;width: 75%;}
    </style>
</head>
<body>
    <div id="main">
        <div id="tabla_pedidos">
            <table class="table_1" align="center">
                <tr>
                    <th class="table_1">Cantidad</th>
                    <th class="table_1">Descripcion</th>
                    <th class="table_1">Precio Unitario</th>
                    <th class="table_1"></th>
                    <th class="table_1"></th>
                </tr>
                <?php 
                $total =0;
                $i=0;

                if (isset($this->pedidos)){
                    foreach($this->pedidos as $row){
                        $producto = new Producto();
                        $producto = $row;
                        echo"<tr>";
                        echo "<td>".$producto->cantidad."</td>";
                        echo "<td>".$producto->nombre."</td>";
                        echo "<td>$".$producto->precio."</td>";
                        echo "<td>✓</td>";
                        echo "<td></td>";
                        echo "</tr>";
                        $total = $total + ($producto->precio)*($producto->cantidad);
                        $i++;
                    } 
                }

                $i=0;
                $j=0;
                if(isset($this->productos)){
                    while($i < sizeof($this->productos)){
                        echo"<tr>";
                        while(!(isset($this->productos[$j]))){
                            $j++;
                        }
                        echo "<td>".$this->productos[$j][1]."</td>";
                        $item = $this->productos[$j][0];
                        echo "<td>".$item[0]->nombre."</td>";
                        echo "<td>$".$item[0]->precio."</td>";
                        echo "<td></td>";
                        echo "<td><button onclick='eliminar_prod_pedido($j)'>Eliminar</button></td>";
                        echo "</tr>";
                        $total = $total + ($item[0]->precio)*($this->productos[$j][1]);
                        $j++;
                        $i++;
                    }
                }

                ?>
            </table>
            <table class="table_2" style="">
                <tr>
                    <td><p align="right">Total: $<?php echo $total;?></p></td>
                </tr>
                <tr>
                    <td><p align="right"><button onclick="hacer_pedido()">Hacer Pedido</button></p></td>
                </tr>
                <tr>
                    <td><p align="right"><a href="<?php echo constant('URL'); ?>pedir_cuenta"><input type="button" value="Pedir Cuenta"/></a></p></td>
                </tr>
            </table>
        </div>
        <br>
        <br>
    </div>
    <script src="<?php echo constant('URL'); ?>public/js/main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
    <?php require 'views/static_menu.php'; ?>
    <?php require 'views/footer.php'; ?>
</body>
</html>