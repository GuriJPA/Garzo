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
                $item->id_mesa = $row['id_mesa'];
                $item->numeroMesa = $row['numeroMesa'];
                //$item->pidioMozo = $row['pidioMozo'];
                array_push($items, $item);
        }
        return $items;
        }catch(PDOException $e){
            return [];
        }
    }

    public function set_pidio_mozo($param, $mozo){
        
        try{
            if($mozo==1){
            $query = $this->db->connect()->query("UPDATE mesa SET pidioMozo = 0 WHERE id_mesa= '$param'");
             return null;
            }
            else{
                $query = $this->db->connect()->query("UPDATE mesa SET pidioMozo = 1 WHERE id_mesa= '$param'");
                return null; 
            }
         }catch(PDOException $e){
             return [];
             
         } 
    }
}
?>