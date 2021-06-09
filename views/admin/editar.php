<?php
include_once 'models/producto.php'; 

//foreach($this->producto as $row){  //producto es un objeto que tiene todos los atributos de los productos
    $productos = new Producto();//crea el objeto productos
    $productos = $this->producto;// hace que productos apunte al objeto producto, osea, ahora productos es producto
    
    //echo $this->mensaje;
?>

 <div class='form-group' align='center'>
<!-- guardar en vector prodocto->nombre para despues enviarlo a la BD -->
                <h2>Editar Producto</h2>
                <br>
                <a>Nombree</a>
                <input type="text" class="input" id="nombre_edit" value="<?php echo $productos[0]->nombre;?>">
                <br>
                <br>
                <a>Descripcion</a>
                <input type="text" class="input" id="descripcion_edit" value="<?php echo $productos[0]->descripcion;?>">
                <br> 
                <br>
                <a>Precio</a>          
                <input type="text" class="input" id="precio_edit" value="<?php echo $productos[0]->precio;?>">
                <br> 
                <br>
                <a>Foto</a>
                <input type="text" class="input" id="foto_edit" value="<?php echo $productos[0]->foto;?>">
                <br>
                <br> 
                <a>Stock</a>
                <input type="text" class="input" id="stock_edit" value="<?php echo $productos[0]->stock;?>">
                <br>
                <br> 
                <a>Categoria</a>
                <input type="text" class="input" id="categoria_edit" value="<?php echo $productos[0]->categoria;?>">
                <br>
                <br>  
                <!--ver: implementar metodo despues de onclick, que guarde en un vector la consulta de la BD -->
                <button  type='submit' name='registro' onclick= 'fun_modif_producto(<?php echo $productos[0]->id_producto; ?>)' class='btn_aceptar' >Aceptar</button>

        </div>

        <script src="<?php echo constant('URL'); ?>public/js/main.js"></script>