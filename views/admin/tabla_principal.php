<thead>
                <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>DESCRIPCION</th>
                <th>PRECIO</th>
                <th>FOTO</th>                
                <th>STOCK</th>
                <th>CATEGORIA</th>
                <th></th>
                <th></th>
                </tr>
            </thead>            
            <tbody id='productos'>
                <?php
                include_once 'models/producto.php';
                foreach($this->productos as $row){
                    $producto = new Producto();
                    $producto = $row; 
                    echo "<tr>
                        <td>$producto->id_producto</td>
                        <td>$producto->nombre</td>
                        <td>$producto->descripcion</td>                        
                        <td>$producto->precio</td>
                        <td>$producto->foto</td>
                        <td>$producto->stock</td>
                        <td>$producto->categoria</td>
                        
                        <td><input type='button' onclick='fun_detalle_producto($producto->id_producto)' value='Editar'/></td>
                        <td><input type='button' onclick='fun_confirmacion($producto->id_producto)' value='Eliminar'/></td>
                        </tr>";

                } 
                
                
                ?>
            </tbody>