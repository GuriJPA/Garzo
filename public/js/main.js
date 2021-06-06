function fun_emergente_agre() {
    div_continuar = document.getElementById('agre_producto').style.display = 'flex';
//IMPLEMENTAR TODO




}

function cancelar_agre() {
    div_continuar = document.getElementById('agre_producto').style.display = 'none';
}

function cancelar_modif() {
    div_continuar = document.getElementById('modif_producto').style.display = 'none';
}
function cancelar_elim() {
    div_continuar = document.getElementById('elim_producto').style.display = 'none';
}


function cancelar_producto() {
    div_continuar = document.getElementById('producto').style.display = 'none';
}

function fun_buscar_producto(id) {
        div_continuar = document.getElementById('producto').style.display = 'flex';
        $.ajax({
                                   type: "POST",
                                   url: "../../carta/detalle_producto/"+id,
                                   data: "b="+id,
                                   dataType: "html",
                                   beforeSend: function(){
                                              //imagen de carga
                                           $("#result_producto").html("<p align='center'><img src='../../public/img/ajax-loader.gif' /></p>");
                                   },
                                   error: function(){
                                           alert("error petición ajax");
                                     },
                                  success: function(data){                                                    
                                        $("#result_producto").empty();
                                        $("#result_producto").append(data);      
                                    }
                            });
    }

    function fun_detalle_producto(id) {
        div_continuar = document.getElementById('modif_producto').style.display = 'flex';
        $.ajax({
                                   type: "POST",
                                   url: "../admin/detalle_producto/"+id,
                                   data: "b="+id,
                                   dataType: "html",
                                   beforeSend: function(){
                                              //imagen de carga modificacion
                                           $("#modificar_prod").html("<p align='center'><img src='../../public/img/ajax-loader.gif' /></p>");
                                   },
                                   error: function(){
                                           alert("error petición ajax");
                                     },
                                  success: function(data){                                                    
                                        $("#modificar_prod").empty();
                                        $("#modificar_prod").append(data);      
                                    }
                            });
    }

    function fun_modif_producto(id) {

        var producto = new Array();
        producto[0] = id;
        producto[1] = document.getElementById("nombre_edit").value;
        producto[2] = document.getElementById("descripcion_edit").value;
        producto[3] = document.getElementById("precio_edit").value;
        producto[4] = document.getElementById("foto_edit").value;
        producto[5] = document.getElementById("stock_edit").value;
        producto[6] = document.getElementById("categoria_edit").value;


        div_continuar = document.getElementById('modif_producto').style.display = 'none';

        

        $.ajax({
                                   type: "POST",
                                   url: "../admin/actualizar_producto/", 
                                   data: { ProductoArray: producto }, //enviar un array con todos los datos
                                   dataType: "html",
                                   beforeSend: function(){
                                              //imagen de carga modificacion
                                              $("#div_aux").html("<p align='center'><img src='../../public/img/ajax-loader.gif' /></p>");
                                   },
                                   error: function(){
                                           alert("error petición ajax");
                                     },
                                  success: function(data){                                                    
                                    $("#div_aux").empty();
                                    $("#div_aux").append(data);
                                    }
                            });
        
        
    
        
    }
    function fun_agreg_producto(){
         
        var producto = new Array();
        producto[0] = document.getElementById("id_agre").value;
        producto[1] = document.getElementById("nombre_agre").value;
        producto[2] = document.getElementById("descripcion_agre").value;
        producto[3] = document.getElementById("precio_agre").value;
        producto[4] = document.getElementById("foto_agre").value;
        producto[5] = document.getElementById("stock_agre").value;
        producto[6] = document.getElementById("categoria_agre").value;


        div_continuar = document.getElementById('agre_producto').style.display = 'none';

        $.ajax({
                                   type: "POST",
                                   url: "../admin/agregar_producto/", 
                                   data: { ProductoArray: producto }, //enviar un array con todos los datos
                                   dataType: "html",
                                   beforeSend: function(){
                                              //imagen de carga modificacion
                                              $("#div_aux2").html("<p align='center'><img src='../../public/img/ajax-loader.gif' /></p>");
                                   },
                                   error: function(){
                                           alert("error petición ajax");
                                     },
                                  success: function(data){                                                    
                                    $("#div_aux2").empty();
                                    $("#div_aux2").append(data);
                                    }
                            });
        
        
    
        
    }




    function fun_confirmacion(id) {
        div_continuar = document.getElementById('elim_producto').style.display = 'flex';
        $.ajax({
                                   type: "POST",
                                   url: "../admin/confirmacion/"+id,
                                   data: "b="+id,
                                   dataType: "html",
                                   beforeSend: function(){
                                              //imagen de carga modificacion
                                           $("#eliminar_prod").html("<p align='center'><img src='../../public/img/ajax-loader.gif' /></p>");
                                   },
                                   error: function(){
                                           alert("error petición ajax");
                                     },
                                  success: function(data){                                                    
                                        $("#eliminar_prod").empty();
                                        $("#eliminar_prod").append(data);      
                                    }
                            });
    }
     
    function fun_eliminar_producto(id) {
        div_continuar = document.getElementById('elim_producto').style.display = 'none';
        $.ajax({
                                   type: "POST",
                                   url: "../admin/eliminar_producto/"+id,
                                   data: "b="+id,
                                   dataType: "html",
                                   beforeSend: function(){
                                              //imagen de carga modificacion
                                           $("#div_aux2").html("<p align='center'><img src='../../public/img/ajax-loader.gif' /></p>");
                                   },
                                   error: function(){
                                           alert("error petición ajax");
                                     },
                                  success: function(data){                                                    
                                        $("#div_aux2").empty();
                                        $("#div_aux2").append(data);      
                                    }
                            });
    }


    
