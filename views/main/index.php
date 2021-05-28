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
        <h1 style="font-family:Arial;">Bienvenidos</h1>
        <br>
        <p style="font-family:Arial;">LOGO DEL RESTAURANTE</p>
        <br>
        <a href="<?php echo constant('URL'); ?>carta"><input type="button" value="Ver Carta"/></a>
        <br>
        </center>
    </div>
    <?php require 'views/footer.php'; ?>
</body>
</html>