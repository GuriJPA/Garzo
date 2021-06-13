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
        <h1 style="font-family:Arial;">Instalacion de Garzo 1 de 2</h1>
        <br>
        <p style="font-family:Arial;">Coloque los datos de la Base de Datos MySQL</p>
        <p><?php if(isset($this->mensaje)){echo $this->mensaje;}?></p>
        <br>
        <form action="<?php echo constant('URL'); ?>install/conectar" method="post">
                <div class="form-group">
                    <input type="text" class="input" id="usuario" name="usuario" placeholder="Usuario">
                </div>
                <br>
                <div class="form-group">
                    <input type="password" id="contrasena" class="input" name="password" placeholder="Contraseña">
                </div>
                <br>
                <button type="submit" name="enviar" class="button-login">Conectar</button>
            </form>
        <br>
        </center>
    </div>
    <?php require 'views/footer.php'; ?>
</body>
</html>