<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/default.css">
    <style type="text/css">
        .table_1{border: 1px solid black;}
        table{border-collapse: collapse;}
        .table_2{border: 0px;width: 75%;}
    </style>
</head>
<body>
    <div id="main">
        <div>
            <table class="table_1" align="center">
                <tr>
                    <th class="table_1">Cantidad</th>
                    <th class="table_1">Descripcion</th>
                    <th class="table_1">Precio Unitario</th>
                </tr>
            </table>
        </div>
        <div>
            <table class="table_2" style="">
                <tr>
                    <td><p align="right">Total:</p></td>
                </tr>
                <tr>
                    <td><p align="right"><button onclick="">Hacer Pedido</button></p></td>
                </tr>
                <tr>
                    <td><p align="right"><button onclick="">Pedir Cuenta</button></p></td>
                </tr>
            </table>
        </div>
        <br>
        <br>
    </div>
    <?php require 'views/static_menu.php'; ?>
    <?php require 'views/footer.php'; ?>
</body>
</html>