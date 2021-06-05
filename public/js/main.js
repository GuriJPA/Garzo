function fun_agre_producto() {
    div_continuar = document.getElementById('agre_producto').style.display = 'flex';
}

function fun_modif_producto() {
    div_continuar = document.getElementById('modif_producto').style.display = 'flex';
}

function cancelar_agre() {
    div_continuar = document.getElementById('agre_producto').style.display = 'none';
}

function cancelar_modif() {
    div_continuar = document.getElementById('modif_producto').style.display = 'none';
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


