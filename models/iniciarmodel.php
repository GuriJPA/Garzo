<?php


class IniciarModel extends Model{

    public function __construct(){
        parent::__construct();
        //echo "<p>Nuevo controlador consulta_productmodel.php</p>";
    }

    public function query_logueo(){
        
        $loginNombre = $_POST["usuario"];
        $loginPassword = md5($_POST["password"]);
        
        $userok = '';
        $passok = '';
        try{
            $query = $this->db->connect()->query("SELECT * FROM persona WHERE usuario='$loginNombre' AND contrasena='$loginPassword'");
            while($row = $query->fetch()){
                $userok = $row["usuario"];
                $passok = $row["contrasena"];
            }
            if(isset($loginNombre) && isset($loginPassword)) {
                if($loginNombre == $userok && $loginPassword == $passok) {
                    return TRUE;
                }
                else {
                    return FALSE;
                }
            }
        }catch(PDOException $e){
            //return [];
            return FALSE;
        }

    }


}

?>