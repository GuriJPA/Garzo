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
    <button onclick="fun_emergente_agre()">Agregar Producto</button>
    <br>
    <br>
    <div>
        <table id='tabla_principal' style="border: 1px solid black;">
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
        </table>

    </div>

    <div id='agre_producto' class='div_emergente' >
        <div id='datos' class='ventana_emergente' >
            <button  type='submit' onclick='cancelar_agre()' class='btn_x' >X</button>
           
                  
            <div  class='form-group' align='center'>
                <h2>Agregar Producto</h2>
                <br>
                <a>Id</a>
                <input type="text" class="input" id="id_agre">
                <br>
                <a>Nombre</a>
                <input type="text" class="input" id="nombre_agre">
                <br>
                <br>
                <a>Descripcion</a>
                <input type="text" class="input" id="descripcion_agre">
                <br> 
                <br>
                <a>Precio</a>
                <input type="text" class="input" id="precio_agre">
                <br> 
                <br>
                <a>Foto</a>
                <input type="text" class="input" id="foto_agre">
                <br>
                <br> 
                <a>Stock</a>
                <input type="text" class="input" id="stock_agre">
                <br>
                <br> 
                <a>Categoria</a>
                <input type="text" class="input" id="categoria_agre">
                <br>
                <br>
                <button  type='submit' name='registro' onclick= 'fun_agreg_producto()' class='btn_aceptar' >Aceptar</button>

            </div>
        </div>
    </div> 

   
     
    <div id='modif_producto' class='div_emergente' >
        <div id='datos' class='ventana_emergente' >
            <button  type='submit' onclick='cancelar_modif()' class='btn_x' >X</button>
           

            <div id='modificar_prod' class='form-group' align='center'>
            
        </div>
    </div>
    </div>

    <div id='elim_producto' class='div_emergente' >
        <div id='datos' class='ventana_emergente' >
            <button  type='submit' onclick='cancelar_elim()' class='btn_x' >X</button>
           

            <div id='eliminar_prod' class='form-group' align='center'>
            
        </div>
      </div>
    </div>


   

    

    <script src="<?php echo constant('URL'); ?>public/js/main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
</body>

</html>