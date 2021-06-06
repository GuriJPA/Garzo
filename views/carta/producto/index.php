<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/default.css">
    <link rel="stylesheet" type="text/css" href="<?php echo constant('URL'); ?>public/css/style.css">
</head>
<body>
    <div id="main">
        <table align="center" id='tabla_principal' >                  
            <tbody id='productos'>
                <?php
                include_once 'models/producto.php';
                $num=1;
                echo"<tr>";
                foreach($this->productos as $row){
                    $producto = new Producto();
                    $producto = $row; 
                    echo "<td><button onclick='fun_buscar_producto($producto->id_producto)' style='margin-right: 40px; margin-bottom: 40px;'>Nombre: $producto->nombre <br> Precio: $producto->precio</button</td>";
                        if(($num % 2)==0){
                            echo"</tr>";
                            echo"<tr>";
                        }
                        $num++;
                }        
                ?>
            </tbody>
        </table>
    </div>
    <div id='producto' class='div_emergente'>
        <div id='datos' class='ventana_emergente'>
        <button  type='submit' onclick='cancelar_producto()' class='btn_x' >X</button>
            <div id="result_producto" class='form-group' align='center'></div>
        </div>
    </div>
    <?php require 'views/static_menu.php'; ?>
    <?php require 'views/footer.php'; ?>
    <script src="<?php echo constant('URL'); ?>public/js/main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
</body>
</html>