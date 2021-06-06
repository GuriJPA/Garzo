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
        <img style="height: 100px; width: 100px;" src="public/img/successful.png">
        <br>
        <h1><p style="font-family:Arial;">Se ha solicitado la cuenta exitosamente</p></h1>
        <br>
        <p style="font-family:Arial;">Numero de Comprobante:</p>
        <br>
        <a href="<?php echo constant('URL'); ?>"><input type="button" value="Hecho"/></a>
        <br>
        <br>
        <a href=""><input type="button" value="Descargar Comprobante"/></a>
    </center>
    </div>
    <?php require 'views/footer.php'; ?>
</body>
</html>