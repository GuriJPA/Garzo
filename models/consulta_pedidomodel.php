<?php

include_once 'models/pedido.php';

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
                $item->id_producto = $row['id_producto'];
                $item->cantidad  = $row['cantidad'];
                $item->fecha = $row['fecha'];
                $item->id_mesa    = $row['id_mesa'];
                $item->id_restaurante  = $row['id_restaurante'];
                $item->estado  = $row['estado'];

                array_push($items, $item);
            }

            return $items;
        }catch(PDOException $e){
            return [];
            
        }
    }

    /*public function get_pedido($id_param){
        $items = [];

        try{

            $query = $this->db->connect()->query("SELECT * FROM pedido WHERE id_producto='$id_param'");

            while($row = $query->fetch()){
                $item = new Producto();
                $item->id_producto = $row['id_producto'];
                $item->nombre = $row['nombre'];
                $item->descripcion  = $row['descripcion'];
                $item->precio = $row['precio'];
                $item->foto    = $row['foto'];
                $item->stock  = $row['stock'];
                $item->categoria  = $row['categoria'];

                array_push($items, $item);
            }

            return $items;
        }catch(PDOException $e){
            return [];
            
        } 
    }*/

}

?>