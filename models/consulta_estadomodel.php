<?php

include_once 'models/estado.php';

class Consulta_EstadoModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function get_estados(){
        $items = [];
        try{
            $query = $this->db->connect()->query("SELECT*FROM estados");
            while($row = $query->fetch()){
                $item = new Estado();
                $item->id_estado = $row['id_estado'];
                $item->nombre = $row['nombre'];
                array_push($items, $item);
        }
        return $items;
        }catch(PDOException $e){
            return [];
        }
    }
    // retorna el nonbre de un estado especifico
    /*public function get_estado($idestado){
        $data = [];
        try{
            $query = $this->db->connect()->query("SELECT*FROM estados WHERE id_estado='$idestado'");
            while($row = $query->fetch()){
                $item = new Estado();
                $item->nombre = $row['nombre'];
                array_push($data, $item);
        }
        return $data;

    }*/
}
?>