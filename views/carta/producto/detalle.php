<?php 


include_once 'models/producto.php';
                    
                    foreach($this->producto as $row){
                        $producto = new Producto();
                        $producto = $row; 
                        $Id = $producto -> id_producto;
                        echo "	<br>
                                <div>
                                <img style='width: 250px;' src='$producto->foto'>
                                <br>
                                <table>
                                    <tr>
                                    <td>$producto->nombre</td>
                                    </tr>
                                    <tr>
                                    <td><p align='center'>Precio: $producto->precio</p></td>
                                    </tr>
                                </table>

                                <p>Descripcion: $producto->descripcion</p>

                          
                               

                                </div>";
                               
                      
                    }

?>


<!DOCTYPE html>
<html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js" type="text/javascript"></script>
</head>
<body>

<br>
    <div>
    
   
        <button id="Agregar"  onclick=''>Agregar al Pedido</button>
       
     
                    
        <br>
            <br>

                <table>
                    <tr>
                        <td><button id="-"><p style='font-size:15px; width: 30px;'>-</p></button></td>
                        <td ><p id="cantidad" style='margin-left: 15px;margin-right: 15px;'>1</p></td>
                        <td><button id="+"><p style='font-size:15px; width: 30px;'>+</p></button></td>
                    </tr>
                </table>
    </div>

 <!-- Insertar Menu estatico -->

</body>
</html>



<script type="text/javascript">

//Variable principal de CANTIDAD
var cantidad=1;


//SUMA
  function Suma(){

    if(cantidad<10){
    cantidad=cantidad+1;}

    document.getElementById("cantidad").innerHTML= cantidad;
}
    document.getElementById("+").onclick= function(){
    Suma();
    }


//RESTA
  function Resta(){
      if(cantidad>1){
        cantidad=cantidad-1;}
      else{
    cantidad=1;}
document.getElementById("cantidad").innerHTML= cantidad;
  }
document.getElementById("-").onclick= function(){
    Resta();
  }

//Agregar producto
  function agregarPro(){
    
    let Producto=[<?php echo $Id ?>, cantidad];
    
    $.ajax({
                                   type: "POST",
                                   url: "../../carta/cargar_pedido",
                                   data: {array_p:Producto},
                                   dataType: "html",
                                   beforeSend: function(){
                                              //imagen de carga
                                           //$("#result_producto").html("<p align='center'><img src='../../public/img/ajax-loader.gif' /></p>");
                                   },
                                   error: function(){
                                           alert("error petición ajax");
                                     },
                                  success: function(data){
                                    alert("Se agrego tu pedido");                                                    
                                    //    $("#result_producto").empty();
                                    //   $("#result_producto").append(data);      
                                    }
                            });

}
  
  document.getElementById("Agregar").onclick= function(){
    agregarPro();
  }
   

</script>


