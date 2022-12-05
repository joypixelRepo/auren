# Auren
 Auren Technical Test

----
Pasos para hacer correr el proyecto:

1. Base de datos: En la carpeta raiz está adjunto el archivo auren.sql para crear la base de datos con algunos paises de ejemplo.
2. Levantar el proyecto en la terminal con "php artisan serve".
(opcional: si no se quiere importar el sql con ejemplos, se pueden usar las migraciones para crearla limpia: "php artisan make:migration").

El archivo .env está visible en github porque no contiene ninguna información delicada. Tiene la típica conexión local a la base de datos y un par de variables de entorno para la API.

----

Laravel 8.83.26

Include:
- Bootstrap 5.1.3
- jQuery 3.6.1