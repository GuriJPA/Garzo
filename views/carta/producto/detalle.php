<?php 


include_once 'models/producto.php';
                    
                    foreach($this->producto as $row){
                        $producto = new Producto();
                        $producto = $row; 
                        echo "	<br>
                                <div>
                                <img style='width: 250px;' src='$producto->foto'>
                                <br>
                                <table>
                                    <tr>
                                    <td>$producto->nombre</td>
                                    </tr>
                                    <tr>
                                    <td><p align='right'>Precio: $producto->precio</p></td>
                                    </tr>
                                </table>

                                <p>Descripcion: $producto->descripcion</p>

                                <br>

                                <button onclick=''>Agregar al Pedido</button>

                                <br>
                                <br>

                                <table>
                                <tr>
                                <td><button onclick=''><p style='font-size:15px; width: 30px;'>-</p></button></td>
                                <td><p style='margin-left: 15px;margin-right: 15px;'>1</p></td>
                                <td><button onclick=''><p style='font-size:15px; width: 30px;'>+</p></button></td>
                                </tr>
                                </table>

                                </div>";
                    }

?>