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
        <p style="font-family:Arial;">Numero de Comprobante: <?php echo $this->num_comprobante;?></p>
        <br>
        <a href="<?php echo constant('URL'); ?>"><input type="button" value="Hecho"/></a>
        <br>
        <br>
        <button onclick="generar_comprobante('<?php echo $this->num_comprobante;?>')">Descargar Comprobante</button>
    </center>
    </div>
    <script src="<?php echo constant('URL'); ?>public/js/main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
    <?php require 'views/footer.php'; ?>
</body>
</html>