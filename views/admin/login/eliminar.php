<?php
include_once 'models/producto.php'; 

//foreach($this->producto as $row){  //producto es un objeto que tiene todos los atributos de los productos
    $productos = new Producto();//crea el objeto productos
    $productos = $this->producto;// hace que productos apunte al objeto producto, osea, ahora productos es producto
    
    //echo $this->mensaje;
?>    
    
        <div class='form-group' align='center'>
        <!-- guardar en vector prodocto->nombre para despues enviarlo a la BD -->
                <h2>¿Desea eliminar el producto <?php echo $productos[0]->nombre;?>?</h2>
                <br>
                <!--ver: implementar metodo despues de onclick, que guarde en un vector la consulta de la BD -->
                <button  type='submit' name='registro' onclick= 'fun_eliminar_producto(<?php echo $productos[0]->id_producto; ?>)' class='btn_aceptar' >Aceptar</button>
  
        </div>

        <script src="<?php echo constant('URL'); ?>public/js/main.js"></script>