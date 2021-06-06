<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/default.css">
</head>
<body>
    <div id="main">
        <center><h1 style="font-family:Arial;">Carta</h1></center>  
        <br>  
            <div>
                <center>
                    <a href="<?php echo constant('URL'); ?>carta/cargar_carta/hamburguesa"><input style="height: 70px; width: 70px;" type="button" value="Burger"/></a>
                    <a href="<?php echo constant('URL'); ?>carta/cargar_carta/pizza"><input style="height: 70px; width: 70px;" type="button" value="Pizza"/></a>
                    <br>
                    <br>
                    <a href="<?php echo constant('URL'); ?>carta/cargar_carta/bebida"><input style="height: 70px; width: 70px;" type="button" value="Bebidas"/></a>
                    <a href="<?php echo constant('URL'); ?>carta/cargar_carta/postre"><input style="height: 70px; width: 70px;" type="button" value="Postres"/></a>
                </center>
            </div>
            <br>
            <br>
    </div>
    <?php require 'views/static_menu.php'; ?>
    <?php require 'views/footer.php'; ?>
</body>
</html>