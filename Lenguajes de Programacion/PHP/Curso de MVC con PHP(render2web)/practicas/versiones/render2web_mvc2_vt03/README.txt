vt1

Video de introduccion sobre el curso.
--------------------------------------


vt2

Se crea la estructura del proyecto, todos los directorios
y archivos a ser usados dentro del proyecto.

se programo una linea del archivo: app/.htacces
es para proteger a un directorio para que no pueda ser
accedido desde la URL, pero probando me di cuenta de que
no funciona, HAY QUE INVESTIGAR O VERIFICAR.

¿Como se probó?
Entrar en el navegador e ir hasta el proyecto, se ven las
carpetas: public y app, se le hace clic en la carpeta app 
para tratar de entrar y ven su contenido(lo que tiene dentro)
y NO deberia de permitir entrar, tendria que bloquear pero
no funciona.

----------------------------------------------------------


vt3

Se creo y programo el archivo: public/.htacces
El archivo no funciona bien, no cumple con su objetivo,

si se ingresa por ejemplo:
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



Se programa el archivo: public/index.php, se hace el require
del iniciador.

app/iniciador.php: su objetivo es cargar los archivos necesarios de la carpeta app

Para poder probar todo lo que hicimos hasta aqui en el
videotutorial escribir en la url:

http://localhost/render2web_mvc2/public/

debe cargar el archivo: iniciador.php

-------------------------------------------------------------











<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */







