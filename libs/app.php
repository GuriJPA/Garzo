<?php
require_once 'controllers/errores.php';

class App{

    function __construct(){
        //echo "<p>Nueva app</p>";

        $url = isset($_GET['url']) ? $_GET['url']: null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);

        session_start();

        //RECORDAR CAMBIAR A install.php PARA LA VERSION FINAL
        if(file_exists("controllers/install.php")){

            $archivoController = 'controllers/install.php';
            require_once $archivoController;
            $controller = new Install();
            $controller->loadModel('install');
            
            $nparam = sizeof($url);

                if($nparam > 1){
                    if($nparam > 2){
                        $param = [];
                        for($i = 2; $i<$nparam; $i++){
                            array_push($param, $url[$i]);
                        }
                        $controller->{$url[1]}($param);
                    }else{
                        $controller->{$url[1]}();
                    }
                }else{
                    $controller->render();
                }
            
        }else{

            //var_dump($url);

            //echo empty($url[0]);


            if(!(isset($_SESSION['id_matriz']))){
                $_SESSION['id_matriz'] = 0;
            }

            if(!(isset($_SESSION['mesa']))){
                $_SESSION['mesa'] = 1;
            }

            if(!(isset($_SESSION['matriz_pedidos']))){
                $_SESSION['matriz_pedidos'] = array();
            }
            
            // cuando se ingresa sin definir controlador
            if(empty($url[0])){
                $archivoController = 'controllers/main.php';
                require_once $archivoController;
                $controller = new Main();
                $controller->loadModel('main');
                $controller->render();
                return false;
            }

            $url_controller = $url[0];
            
            
            if(!(isset($_SESSION['logueado']))){
                $_SESSION['logueado'] = FALSE;
            }

            if($url_controller == 'admin' && $_SESSION['logueado'] == FALSE){
                $url_controller = 'login';
                $url= null;
                $url[0] = '';
            }

            $archivoController = 'controllers/' . $url_controller . '.php';

            if(file_exists($archivoController)){
                require_once $archivoController;

                // inicializar controlador
                $controller = new $url_controller;
                $controller->loadModel($url_controller);
                
                // # elementos del arreglo
                $nparam = sizeof($url);

                if($nparam > 1){
                    if($nparam > 2){
                        $param = [];
                        for($i = 2; $i<$nparam; $i++){
                            array_push($param, $url[$i]);
                        }
                        $controller->{$url[1]}($param);
                    }else{
                        $controller->{$url[1]}();
                    }
                }else{
                    $controller->render();
                }
            }else{
                $controller = new Errores();
            }
            
        
        }
        
        
    }
}

?>