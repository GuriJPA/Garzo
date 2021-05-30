<?php

include_once 'models/producto.php';

class Consulta_ProductModel extends Model{

    public function __construct(){
        parent::__construct();
        //echo "<p>Nuevo controlador consulta_productmodel.php</p>";
    }

    
    // vamos a consultar la base de datos y traer todo 
    public function get_productos($cat_param){
        // creo un array donde voy a ir guardando todo
        $items = [];

        try{
            // si categoria producto es vacio, traigo todo
            if($cat_param == ''){
                $query = $this->db->connect()->query("SELECT*FROM producto");
            }else{ // si no existe traigo solamente lo que diga categoria
                $query = $this->db->connect()->query("SELECT*FROM producto WHERE categoria='$cat_param'");
            }
            
            // recorro todo lo que traje filtrado que tengo en query
            while($row = $query->fetch()){
                $item = new Producto();
                $item->id_producto = $row['id_producto'];
                $item->nombre    = $row['nombre'];
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
    }

    public function get_producto($id_param){
        $items = [];

        try{

            $query = $this->db->connect()->query("SELECT * FROM producto WHERE id_producto='$id_param'");

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
    }

}

?>