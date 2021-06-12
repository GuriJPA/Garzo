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
                                              $("#tabla_principal").html("<p align='center'><img src='../../public/img/ajax-loader.gif' /></p>");
                                   },
                                   error: function(){
                                           alert("error petición ajax");
                                     },
                                  success: function(data){                                                    
                                    $("#tabla_principal").empty();
                                    $("#tabla_principal").append(data);
                                    }
                            });
        
        
    }
    function fun_agreg_producto(){
         
        var producto = new Array();
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
                                              $("#tabla_principal").html("<p align='center'><img src='../../public/img/ajax-loader.gif' /></p>");
                                   },
                                   error: function(){
                                           alert("error petición ajax");
                                     },
                                  success: function(data){                                                    
                                    $("#tabla_principal").empty();
                                    $("#tabla_principal").append(data);
                                    }
                            });
                             document.getElementById("nombre_agre").value="";
                             document.getElementById("descripcion_agre").value="";
                             document.getElementById("precio_agre").value="";
                             document.getElementById("foto_agre").value="";
                             document.getElementById("stock_agre").value="";
                             document.getElementById("categoria_agre").value="";
                    
        
    
        
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
                                           $("#tabla_principal").html("<p align='center'><img src='../../public/img/ajax-loader.gif' /></p>");
                                   },
                                   error: function(){
                                           alert("error petición ajax");
                                     },
                                  success: function(data){                                                    
                                        $("#tabla_principal").empty();
                                        $("#tabla_principal").append(data);      
                                    }
                            });
    }


    
function TomarPedido(id,es){
        
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

function CobrarMesa(idmesa,ValidarcobroJSON){
        
        if(ValidarcobroJSON[idmesa]==1){
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


    function eliminar_prod_pedido(id) {
        $.ajax({
                                   type: "POST",
                                   url: "pedidos/eliminar_prod_pedido/"+id,
                                   data: "b="+id,
                                   dataType: "html",
                                   beforeSend: function(){
                                              //imagen de carga
                                           $("#tabla_pedidos").html("<p align='center'><img src='public/img/ajax-loader.gif' /></p>");
                                   },
                                   error: function(){
                                           alert("error petición ajax");
                                     },
                                  success: function(data){                                                    
                                        $("#tabla_pedidos").empty();
                                        $("#tabla_pedidos").append(data);      
                                    }
                            });                     
    }
    
    function hacer_pedido(){
        $.ajax({
                            type: "POST",
                            url: "pedidos/hacer_pedido/",
                            data: "b=",
                            dataType: "html",
                            beforeSend: function(){
                                    //imagen de carga
                                    $("#tabla_pedidos").html("<p align='center'><img src='public/img/ajax-loader.gif' /></p>");
                            },
                            error: function(){
                                    alert("error petición ajax");
                            },
                        success: function(data){                                                    
                                $("#tabla_pedidos").empty();
                                $("#tabla_pedidos").append(data);      
                            }
        });
    }
    

    function generar_comprobante(num_comprobante) {
        window.location.replace("pedir_cuenta/cuenta_pdf/"+num_comprobante);
    }


    function fun_detalle_pedido(idSubpedido,idmesa) {
        let datos=[idSubpedido,idmesa];
        div_continuar = document.getElementById('detalle').style.display = 'flex';
        $.ajax({
                                   type: "POST",
                                   url: "../admin/adm_pedido_detalle/",
                                   
                                   data: {'array': JSON.stringify(datos)},
                                   dataType: "html",
                                   beforeSend: function(){
                                              //imagen de carga modificacion
                                           $("#detalle_aux").html("<p align='center'><img src='../../public/img/ajax-loader.gif' /></p>");
                                   },
                                   error: function(){
                                           alert("error petición ajax");
                                     },
                                  success: function(data){
                                    
                                        $("#detalle_aux").empty();
                                        $("#detalle_aux").append(data);
                                            
                                    }
                            });
                            
    }

    function cancelar_detalle_pedido() {
        div_continuar = document.getElementById('detalle').style.display = 'none';
    }
    
    function eliminar_prod_selec(){

        if(num_prod_ch != 0){
            let ids ="";
            
            for (let i = 0; i < num_prod_ch; i++) {
                if(document.getElementById(i).checked){
                    ids=ids+"/"+document.getElementById(i).name;
                }
            }

            ids = ids.replace(/^./, ""); //elimino el primer caracter que es una /

            eliminar_prod_pedido(ids);
        }

        

    }