vt1

Video de introduccion sobre el curso.
--------------------------------------





vt2

Se crea la estructura del proyecto, todos los directorios y archivos a ser usados dentro del proyecto.

se programo una linea del archivo: app/.htacces, es para proteger a un directorio para que no pueda ser accedido desde 
la URL, pero probando me di cuenta de que no funciona, HAY QUE INVESTIGAR O VERIFICAR.

¿Como se probó?
Entrar en el navegador e ir hasta el proyecto, se ven las carpetas: public y app, se le hace clic en la carpeta app 
para tratar de entrar y ven su contenido(lo que tiene dentro) y NO deberia de permitir entrar, tendria que bloquear pero
no funciona.
---------------------------------------------------------------------------





vt3

Se creo y programo el archivo: public/.htacces, El archivo no funciona bien, no cumple con su objetivo, si se 
ingresa por ejemplo:
http://localhost/render2web_mvc2/public/ejemplo
o
http://localhost/render2web_mvc2/public/ejemplo.php

y el archivo o carpeta no existe, debe redireccionar
directamente al public/index.php y no lo esta haciendo.


Programacion y breve comentarios de cada linea del archivo.htacces

<IfModule mod_rewrite.c>
Options -Multiviews
RewriteEngine On // Reescribir la URL
RewriteBase /render2web_mvc2/public // En base a la ruta Base
RewriteCond %{REQUEST_FILENAME} !-d // Se crea una condicion de que si el archivo existe, cargue el archivo con el contenido php que tenga
RewriteCond %{REQUEST_FILENAME} !-f // sino existe, entonces lo va a redireccionar hacia el public/index.php
RewriteRule ^(.+)$ index.php?url=$1 [QSA,L]
</IfModule>

// lo que nos va a permitir esto es redireccionar todo lo que no exista hacia el index



Se programa el archivo: public/index.php, se hace el require del iniciador.

app/iniciador.php: su objetivo es cargar los archivos necesarios de la carpeta app


Para poder probar todo lo que hicimos hasta aqui en el videotutorial escribir en la url:
http://localhost/render2web_mvc2/public/

debe cargar el archivo: iniciador.php

Para que se pueda probar el archivo iniciador.php, solo tiene un texto de prueba para poder visualizarlo.
-------------------------------------------------------------------------------------------------------------






vt4

Se crea y programa el archivo: app/iniciador.php, se cargan por requiere_once() los archivos que van a ser usados como librerias.

Se corrige el error del que no cargaba los .htacces, el error fue mal tipeo del nombre de archivo.




Programacion y breve comentarios de cada linea del archivo.htacces
<IfModule mod_rewrite.c>
    RewriteEngine On //
    RewriteRule ^$ public/ [L] //Cual es la regla de redireccion
    RewriteRule (.*) public/$1 [L] //todo
</IfModule>
// Esto nos permite eliminar el acceso public en la url


Se programa el archivo: app/librerias/Core.php, se programo: la clase Core(), y los metodos: constructor(), getUrl()

En este video se intenta mostrar como lograr traer/mapear la url desde la barra de direcciones y cargarla dentro
de nuestro archivo: app/librerias/Core.php


-- Hasta aqui tenemos:
app/.htaccess: Es para proteger a un directorio para que no pueda ser accedido desde la URL.
public/index.php: Carga el iniciador de la carpeta app, instanciamos la clase controlador.
public/.htaccess: Lo que nos va a permitir esto, es redireccionar todo lo que no exista hacia el index
app/iniciador.php: Carga las librerias
app/librerias/Core.php: Mapea la url ingresada en el navegador, que viende desde public/.htaccess
.htaccess: // Esto nos permite eliminar el acceso public en la url
-------------------------------------------------------------------------------------------------------------------





vt5

Se agrego la parte del explode, para poder dividir el controlador, metodo, parametro en el archivo: app/librerias/Core.php
en el metodo getUrl().

Se crea dentro de la carpeta app/controladores, el primer controlador: app/controladores/Paginas.php, Este seria el controlador por defecto de la aplicacion.
-------------------------------------------------------------------------------------------------------------------------




vt6

Vamos a aprender como extraer de la URL el metodo y los posibles parametros que pueda tener.

Seguimos programando el archivo: app/librerias/Core.php

Ponemos un controlador por defecto cuando no se carga nada desde la url.
------------------------------------------------------------------------------------------------





vt7

Controlador Principal

C:\wamp64\www\render2web_mvc2\app\controladores\Paginas.php
C:\wamp64\www\render2web_mvc2\.htaccess
C:\wamp64\www\render2web_mvc2\app\librerias\Core.php
C:\wamp64\www\render2web_mvc2\app\iniciador.php
C:\wamp64\www\render2web_mvc2\public\.htaccess
C:\wamp64\www\render2web_mvc2\public\index.php
C:\wamp64\www\render2web_mvc2\app\.htaccess


Se empieza a programa el archivo: app/librerias/Controlador.php
Se cargo un mensaje de prueba para el archivo: app\vistas\paginas\inicio.php
Se heredo(agrego extends) el archivo: app\controladores\Paginas.php de la clase Controlador que 
esta en: app\librerias\Controlador.php
------------------------------------------------------------------------------------------------





vt8

Cargando Vistas y Parámetros

dentro de app\vistas\paginas\ se crea un nuevo archivo: articulo.php(se volvio a eliminar)

----------------------------------------------------------------------------------




























