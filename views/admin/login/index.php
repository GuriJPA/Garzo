<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div id="main">
        <div class="login">
            <h1><font face="arial">Acceso al Sistema</font></h1>
            <p><?php if(isset($this->mensaje)){echo $this->mensaje;}?></p>
            <form action="<?php echo constant('URL'); ?>login/iniciar" method="post">
                <div class="form-group">
                    <input type="text" class="input" id="usuario" name="usuario" placeholder="Usuario">

                </div>
                <br>
                <div class="form-group">
                    <input type="password" id="contrasena" class="input" name="password" placeholder="Contraseña">
                </div>
                <br>
                <button type="submit" name="enviar" class="button-login">Entrar</button>

            </form>
        </div>
    </div>
</body>
</html>