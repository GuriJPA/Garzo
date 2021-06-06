<?php

include_once 'models/producto.php';

class Consulta_ProductModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function get_productos($cat_param){
        $items = [];

        try{

            if($cat_param == ''){
                $query = $this->db->connect()->query("SELECT*FROM producto");
            }else{
                $query = $this->db->connect()->query("SELECT*FROM producto WHERE categoria='$cat_param'");
            }
            
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
//                         es el ID del objeto              
    public function get_producto($id_param){
        $items = [];

        try{

            $query = $this->db->connect()->query("SELECT * FROM producto WHERE id_producto='$id_param'");

            while($row = $query->fetch()){
                $item = new Producto(); //crea el objeto y captura los datos de la BD
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

    public function update($item){
        $query = $this->db->connect()-> prepare("UPDATE producto SET nombre = :nombre, descripcion = :descripcion, precio = :precio, foto = :foto , stock = :stock, categoria = :categoria WHERE id_producto = :id_producto");
        try{
            $query->execute([
                'id_producto'=> $item['id_producto'], //'id_producto' 
                'nombre'     => $item['nombre'], //seteamos 'nombre' q es la columna d la BD, con lo que sacamos del vector $item['nombre']
                'descripcion'=> $item['descripcion'],
                'precio'     => $item['precio'],
                'foto'       => $item['foto'],
                'stock'      => $item['stock'],
                'categoria'  => $item['categoria']
            ]);
            return true;
        }catch(PDOException $e){
            echo $e;
            return false;
           
        }   

    }
    
    public function add($item){
    $query = $this->db->connect()-> prepare("INSERT INTO producto (id_producto, nombre, descripcion, precio, foto, stock, categoria) VALUES (:id_producto, :nombre, :descripcion, :precio, :foto , :stock, :categoria)");
    try{
    $query->execute([
    'id_producto'=> $item['id_producto'], //'id_producto' 
    'nombre'     => $item['nombre'], //seteamos 'nombre' q es la columna d la BD, con lo que sacamos del vector $item['nombre']
    'descripcion'=> $item['descripcion'],
    'precio'     => $item['precio'],
    'foto'       => $item['foto'],
    'stock'      => $item['stock'],
    'categoria'  => $item['categoria']
    ]);
    return true;
    }catch(PDOException $e){
    echo $e;
    return false;

}   

}


    public function delete_producto($id_param){
      echo "<p>Ejecutaste el método delete_producto</p>";
      echo $id_param;
        
        try{
            $query = $this->db->connect()->query("DELETE FROM producto WHERE id_producto='$id_param'");
            return true;
        }catch(PDOException $e){
            echo $e;
            return false;
        } 
    }  
            

}
?>