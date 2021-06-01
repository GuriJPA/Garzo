<?php //var_dump($this->$productos);
//echo "<br>";
?>
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
                        while(!(isset($_SESSION['productos'][$j]))){
                            $j++;
                        }
                        echo "<td>".$_SESSION['productos'][$j][1]."</td>";
                        echo "<td>".$this->productos[$i][0]->nombre."</td>";
                        echo "<td>$".$this->productos[$i][0]->precio."</td>";
                        echo "<td></td>";
                        echo "<td><button onclick='eliminar_prod_pedido($j)'>Eliminar</button></td>";
                        echo "</tr>";
                        $total = $total + ($this->productos[$i][0]->precio)*($_SESSION['productos'][$j][1]);
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