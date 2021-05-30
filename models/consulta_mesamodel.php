<?php

include_once 'models/mesa.php';

class Consulta_MesaModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function get_mesas($cat_param){
        $items = [];
        try{
            $query = $this->db->connect()->query("SELECT*FROM mesa");
            while($row = $query->fetch()){
                $item = new Mesa();
                /*$item->id_pedido = $row['id_pedido'];
                $item->id_subpedido = $row['id_subpedido'];
                $item->id_producto = $row['id_producto'];
                $item->cantidad  = $row['cantidad'];
                $item->fecha = $row['fecha'];
                $item->id_mesa    = $row['id_mesa'];
                $item->id_restaurante  = $row['id_restaurante'];
                $item->estado  = $row['id_estado'];*/
                $item->id_mesa = $row['id_mesa'];
                $item->numeroMesa = $row['numeroMesa'];
                array_push($items, $item);
        }
        return $items;
        }catch(PDOException $e){
            return [];
        }
    }
}
?>