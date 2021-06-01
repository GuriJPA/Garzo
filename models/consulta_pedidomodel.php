<?php

include_once 'models/pedido.php';

include_once 'models/producto.php';

class Consulta_PedidoModel extends Model{

    public function __construct(){
        parent::__construct();
        //echo "<p>Nuevo controlador consulta_productmodel.php</p>";
    }

    public function get_pedidos($cat_param){
        $items = [];

        try{

            if($cat_param == ''){
                $query = $this->db->connect()->query("SELECT*FROM pedido");
            }else{
                $query = $this->db->connect()->query("SELECT*FROM pedido WHERE mesa='$cat_param'");
            }
            
            while($row = $query->fetch()){
                $item = new Pedido();
                $item->id_pedido = $row['id_pedido'];
                $item->id_subpedido = $row['id_subpedido'];
                $item->id_producto = $row['id_producto'];
                $item->cantidad  = $row['cantidad'];
                $item->fecha = $row['fecha'];
                $item->id_mesa    = $row['id_mesa'];
                $item->id_restaurante  = $row['id_restaurante'];
                $item->id_estado  = $row['id_estado'];

                array_push($items, $item);
            }

            return $items;
        }catch(PDOException $e){
            return [];
            
        }
    }

    //Actualiza el estado del pedido a EN PREAPARACION usando como referencia el parametro $param = id_pedido
    public function set_estado_en_preparacion($param){
        
        try{
           $query = $this->db->connect()->query("UPDATE pedido SET id_estado = '2' WHERE id_pedido= '$param'");
            return null;
        }catch(PDOException $e){
            return [];
            
        } 
    }
    
    //Actualiza el estado del pedido a LISTO usando como referencia el parametro $param = id_pedido
    public function set_estado_listo($param){
        
        try{
            $query = $this->db->connect()->query("UPDATE pedido SET id_estado = '3' WHERE id_pedido= '$param'");
             return null;
         }catch(PDOException $e){
             return [];
             
         } 
    }

    //Actualiza el estado del pedido a PIDIO CUENTA usando como referencia el parametro $param = id_pedido
    public function set_estado_pidio_cuenta($param){
        
        try{
            $query = $this->db->connect()->query("UPDATE pedido SET id_estado = '4' WHERE id_pedido= '$param'");
             return null;
         }catch(PDOException $e){
             return [];
             
         } 
    }

    //Actualiza el estado del pedido a FINALIZADO usando como referencia el parametro $param = id_pedido
    public function set_estado_finalizado($param){
        
        try{
            $query = $this->db->connect()->query("UPDATE pedido SET id_estado = '5' WHERE id_pedido= '$param'");
             return null;
         }catch(PDOException $e){
             return [];
             
         } 
    }



    public function get_pedidos_u($mesa){
        $items = [];
         try{
             $query = $this->db->connect()->query("SELECT pedido.id_producto, nombre, cantidad, precio FROM pedido join producto on pedido.id_producto = producto.id_producto WHERE id_mesa = '$mesa'");
             while($row = $query->fetch()){
                 $item = new Producto();
                 $item->id_producto = $row['id_producto'];
                 $item->nombre = $row['nombre'];
                 $item->precio = $row['precio'];
                 $item->cantidad = $row['cantidad'];
                 array_push($items, $item);
             }
             return $items;
         }catch(PDOException $e){
             return []; 
         }
     }
 
     public function get_subpedido($par_mesa){
         $id_subpedido=1;
         try{
             $query = $this->db->connect()->query("SELECT*FROM pedido WHERE id_mesa='$par_mesa'");
             while($row = $query->fetch()){
                 if( ($row['id_subpedido']) == $id_subpedido){
                     $id_subpedido++; 
                 }
             }
             return $id_subpedido;
         }catch(PDOException $e){
            return false;
         }
     }
 
 
     public function add_pedidos($par_id_producto,$par_cantidad,$par_mesa,$par_id_subpedido){      
         try{
             $query = $this->db->connect()->prepare('INSERT INTO PEDIDO (ID_SUBPEDIDO, ID_PRODUCTO, CANTIDAD, FECHA, ID_MESA, ID_RESTAURANTE, ID_ESTADO) VALUES (:id_subpedido, :id_producto, :cantidad, :fecha, :id_mesa, :id_restaurante, :id_estado)');
             $query->execute(['id_subpedido' => $par_id_subpedido, 'id_producto' => $par_id_producto, 'cantidad' => $par_cantidad, 'fecha' => '', 'id_mesa' => $par_mesa, 'id_restaurante' => '1', 'id_estado' => '1']);
             return true;
         }catch(PDOException $e){
             return false;
         }
 
     }


   

}

?>