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
        <center>
        <h1 style="font-family:Arial;">Instalacion de Garzo 2 de 2</h1>
        <br>
        <p style="font-family:Arial;">Coloque el Usuario y Contraseña que desee para ingresar como administrador</p>
        <p><?php if(isset($this->mensaje)){echo $this->mensaje;}?></p>
        <br>
        <form action="<?php echo constant('URL'); ?>install/end_install" method="post">
                <div class="form-group">
                    <input type="text" class="input" id="usuario" name="usuario" placeholder="Usuario" required>
                </div>
                <br>
                <div class="form-group">
                    <input type="password" id="contrasena" class="input" name="password" placeholder="Contraseña" required>
                </div>
                <br>
                <p style="font-family:Arial;">Coloque el Nombre del Restaurante</p>
                <br>
                <div class="form-group">
                    <input type="text" class="input" id="nomb_rest" name="nomb_rest" placeholder="Nombre del Restaurante" required>
                </div>
                <br>
                <button type="submit" name="enviar" class="button-login">Guardar</button>
            </form>
        </center>
    </div>
    <?php require 'views/footer.php'; ?>
</body>
</html>