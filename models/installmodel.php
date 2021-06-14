<?php


class InstallModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function conectar_mysql(){
        
        $loginUsuario = $_POST["usuario"];
        $loginPassword = $_POST["password"];


        $servername = "localhost";
        //$username = "root";
        //$password = "abc12345";

        // Create connection
        //try{
            $conn = new mysqli($servername, $loginUsuario, $loginPassword);
        //}catch(Exception $e){
           // return FALSE;
       //}

        //error_log("Despues de mysql");

        // Check connection
        if ($conn->connect_error) {
            //error_log("error");
            //echo "Error al conectar";
            echo"Connection failed: " . $conn->connect_error;
            return FALSE;
        }else{
            $_SESSION['loginUsuario_mysql'] = $loginUsuario;
            $_SESSION['loginPassword_mysql'] = $loginPassword;
            //error_log("todo ok");
            $conn->close();
            return TRUE;
        }

    }


    public function cargar_db(){

        $servername = "localhost";
        $username = $_SESSION['loginUsuario_mysql'];
        $password = $_SESSION['loginPassword_mysql'];
        $dbname = "garcon";

        // Create connection
        $conn = new mysqli($servername, $username, $password);
        // Check connection
        if ($conn->connect_error) {
            echo"Connection failed: " . $conn->connect_error;
            return FALSE;
        }

        // Create database
        $sql = "CREATE DATABASE ".$dbname;
        if ($conn->query($sql) === TRUE) {
            //echo "Database created successfully";
        } else {
            echo "Error creating database: " . $conn->error;
            return FALSE;
        }

        $conn->close();


        // Create connection
        $conn1 = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn1->connect_error) {
            echo "Connection failed: " . $conn1->connect_error;
            return FALSE;
        }






        $sql = "CREATE TABLE IF NOT EXISTS `estados` (
            `id_estado` int(10) NOT NULL,
              `nombre` varchar(100) NOT NULL
            ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;";

        $sql .= "CREATE TABLE IF NOT EXISTS `mesa` (
            `id_mesa` int(20) NOT NULL,
              `numeroMesa` int(10) NOT NULL
            ) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=4 ;";


        $sql .= "CREATE TABLE IF NOT EXISTS `pedido` (
            `id_pedido` int(10) NOT NULL,
              `id_subpedido` int(10) NOT NULL,
              `id_producto` int(20) NOT NULL,
              `cantidad` int(20) NOT NULL,
              `fecha` varchar(100) NOT NULL,
              `id_mesa` int(50) NOT NULL,
              `id_restaurante` int(50) NOT NULL,
              `id_estado` int(10) NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;";


        $sql .= "CREATE TABLE IF NOT EXISTS `persona` (
            `id_persona` int(10) NOT NULL,
              `usuario` varchar(20) NOT NULL,
              `nombre` varchar(50) NOT NULL,
              `apellidos` varchar(50) NOT NULL,
              `edad` int(11) NOT NULL,
              `descripcion` varchar(100) NOT NULL,
              `email` varchar(40) NOT NULL,
              `contrasena` varchar(100) NOT NULL,
              `foto` varchar(80) DEFAULT NULL COMMENT 'se va guardar la ruta del folder dond estan las imagenes'
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;";


        $sql .= "CREATE TABLE IF NOT EXISTS `producto` (
            `id_producto` int(50) NOT NULL,
              `nombre` varchar(30) NOT NULL,
              `descripcion` varchar(100) NOT NULL,
              `precio` int(20) NOT NULL,
              `foto` varchar(300) DEFAULT NULL,
              `stock` int(10) NOT NULL,
              `categoria` varchar(20) NOT NULL
            ) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=12 ;";


        $sql .= "CREATE TABLE IF NOT EXISTS `restaurante` (
            `id_restaurante` int(11) NOT NULL,
              `nombre` varchar(50) NOT NULL,
              `foto` varbinary(200) NOT NULL,
              `id_persona` int(11) NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;";


        $sql .= "ALTER TABLE `estados`
        ADD PRIMARY KEY (`id_estado`);";

        $sql .= "ALTER TABLE `mesa`
        ADD PRIMARY KEY (`id_mesa`);";

        $sql .= "ALTER TABLE `pedido`
        ADD PRIMARY KEY (`id_pedido`), ADD KEY `id_producto` (`id_producto`), ADD KEY `id_mesa` (`id_mesa`), ADD KEY `id_restaurante` (`id_restaurante`), ADD KEY `id_mesa_2` (`id_mesa`), ADD KEY `id_estado` (`id_estado`);";

        $sql .= "ALTER TABLE `persona`
        ADD PRIMARY KEY (`id_persona`);";

        $sql .= "ALTER TABLE `producto`
        ADD PRIMARY KEY (`id_producto`);";

        $sql .= "ALTER TABLE `restaurante`
        ADD PRIMARY KEY (`id_restaurante`), ADD KEY `id_persona` (`id_persona`);";

        $sql .= "ALTER TABLE `estados`
        MODIFY `id_estado` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;";

        $sql .= "ALTER TABLE `mesa`
        MODIFY `id_mesa` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;";

        $sql .= "ALTER TABLE `pedido`
        MODIFY `id_pedido` int(10) NOT NULL AUTO_INCREMENT;";

        $sql .= "ALTER TABLE `persona`
        MODIFY `id_persona` int(10) NOT NULL AUTO_INCREMENT;";

        $sql .= "ALTER TABLE `producto`
        MODIFY `id_producto` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;";

        $sql .= "ALTER TABLE `restaurante`
        MODIFY `id_restaurante` int(11) NOT NULL AUTO_INCREMENT;";

        $sql .= "ALTER TABLE `pedido`
        ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`) ON UPDATE CASCADE,
        ADD CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`id_mesa`) REFERENCES `mesa` (`id_mesa`) ON UPDATE CASCADE,
        ADD CONSTRAINT `pedido_ibfk_3` FOREIGN KEY (`id_restaurante`) REFERENCES `restaurante` (`id_restaurante`) ON UPDATE CASCADE,
        ADD CONSTRAINT `pedido_ibfk_4` FOREIGN KEY (`id_estado`) REFERENCES `estados` (`id_estado`) ON DELETE CASCADE;";

        $sql .= "ALTER TABLE `restaurante`
        ADD CONSTRAINT `restaurante_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id_persona`) ON UPDATE CASCADE;";




        $sql .= "INSERT INTO `estados` (`id_estado`, `nombre`) VALUES
        (1, 'Pendiente a Tomar'),
        (2, 'En preparacion'),
        (3, 'Listo'),
        (4, 'Pidio Cuenta'),
        (5, 'Finalizado');";


        $sql .= "INSERT INTO `mesa` (`id_mesa`, `numeroMesa`) VALUES
        (1, 1),
        (2, 2),
        (3, 3);";


        $sql .= "INSERT INTO `producto` (`id_producto`, `nombre`, `descripcion`, `precio`, `foto`, `stock`, `categoria`) VALUES
        (1, 'Cerveza Ipa', 'doble lopulo', 150, '../../public/img/carta/bebidas/cerveza_ipa.jpg', 32, 'bebida'),
        (2, 'Muzzarella', 'queso muzzarella', 400, '../../public/img/carta/pizza/muzzarella.jpg', 32, 'pizza'),
        (3, 'Hamburguesa Doble', 'Descripcion: 2 medallones, queso, pan', 349, '../../public/img/carta/burger/burger_1.jpg', 10, 'hamburguesa'),
        (4, 'Hamburguesa Triple', 'Descripcion: 3 medallones, queso, pan', 400, '../../public/img/carta/burger/burger_2.jpg', 11, 'hamburguesa'),
        (5, 'Hamburguesa Premium', 'descripcion premium', 500, '../../public/img/carta/burger/burger_3.jpg', 5, 'hamburguesa'),
        (6, 'Hamburguesa Garzon', 'descripcion de garzon', 400, '../../public/img/carta/burger/burger_4.jpg', 7, 'hamburguesa'),
        (7, 'Zingarella', 'flan con manzanas y bizcochuelo', 90, '../../public/img/carta/postre/zingarella.jpg', 28, 'postre'),
        (8, 'CocaCola 1L', 'Light', 150, '../../public/img/carta/bebidas/coca_cola.jpg', 10, 'bebida'),
        (9, 'Fugazzeta', 'Pizza de cebolla', 600, '../../public/img/carta/pizza/fugazzeta.jpg', 10, 'pizza'),
        (10, 'Flan', 'Vainilla', 150, '../../public/img/carta/postre/flan_vainilla.jpg', 10, 'postre'),
        (11, 'Helado de Chocolate ', '3 bocha', 120, '../../public/img/carta/postre/helado_chocolate.jpg', 5, 'postre');";





        if ($conn1->multi_query($sql) === TRUE) {
            //echo "New records created successfully";
        } else {
           echo "Error: " . $sql . "<br>" . $conn1->error;
           return FALSE;
        }

        $conn1->close();

        return TRUE;


    }


    public function config_admin(){

        $loginUsuario = $_POST["usuario"];
        $loginPassword = md5($_POST["password"]);
        $restaurante = $_POST["nomb_rest"];
       
        $query = $this->db->connect()-> prepare("INSERT INTO persona (usuario, contrasena) VALUES (:usuario, :contrasena)");
        try{
            $query->execute([
            'usuario'     => $loginUsuario,
            'contrasena'  => $loginPassword
            ]);

            //return true;
        }catch(PDOException $e){
            echo $e;
            return false;

        }  

        $query = $this->db->connect()-> prepare("INSERT INTO restaurante (nombre, id_persona) VALUES (:nombre, :id_persona)");
        try{
            $query->execute([
            'nombre'     => $restaurante,
            'id_persona'  => 1
            ]);

            //return true;
        }catch(PDOException $e){
            echo $e;
            return false;

        }

        return true;



    }


}

?>