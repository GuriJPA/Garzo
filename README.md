# Garzo

## Requisitos:
Tener un servidor que permita ejecutar apache, php 7.1 (o mayor) y mysql, por ejemplo Xampp.
Tener instalado un navegador web (ej Chrome,Brave,Firefox,etc).
Red WiFi local con el servidor que permita que los clientes se conecten.
Definir la ip local del servidor como estática.

## Instrucciones de Instalación y Ejecución:
* Descargar el ZIP de la rama principal de Garzo (https://github.com/GuriJPA/Garzo) y descomprimirla en la carpeta htdocs de xampp.
* Configurar el puerto 80 de la máquina que va a hostear Garzo, en caso de ser necesario.
* Iniciar xampp y darle start a Apache y Mysql
* Editar el archivo config.php completando:
    *  URL: Con http://ipserver/, donde ipserver corresponde a la ip local.
    *  USER: Con el usuario para acceder a la base de datos MySQL, generalmente es root.
    *  PASSWORD: Con la contraseña para acceder a la base de datos MySQL.

* Ingresar desde la máquina principal a http://ipserver/ y cargará automáticamente la vista de instalación la cual solicita los datos de autenticación del mysql para luego cargar la BD mediante un script automatico. En la siguiente pantalla se deberá ingresar el usuario y contraseña a utilizar en la sección administrador y el nombre del restaurante. Al finalizar esta sección se borrará los archivos de instalación por cuestiones de seguridad.
* Luego de esto la página ya es funcional y tendrá cargados productos de ejemplo.
* El administrador (Dueño del local) debe ingresar desde la máquina principal  a http://ipserver/admin para ingresar al sistema y cargar los productos que desee en la BD.
* El cliente debe ingresar a http://ipserver/

## Demo

## Credenciales
   * Usuario: admin
   * Contraseña: 1234

## Link
http://garzon.epizy.com/
