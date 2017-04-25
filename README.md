# Ingeniería Web

Sistema de Inventarios (SI)
=======

Integrantes
-------
 - Álvarez Hernández Octavio
 - Piedra Rosas Gibrán Alfredo
 - Román Salazar Rosario Iván


## Linux
En el caso de Linux será necesario establecer los permisos de la carpeta storage de la siguiente manera

```sh
chmod -R 777 storage
```

## Al clonar
Al clonar el repositorio es necesario hacer unos ajustes. Estos son:

 - En el caso de linux, ajustar los permisos antes mencionados.
 - Instalar todas las dependencias de Laravel.
 - Hacer una copia del archivo de configuración de Laravel y renombrarlo sin la extensión example.
 - Regenerar la llave con php artisan.

Todas las acciones antes mencionadas se pueden generar con la siguiente secuencia de comandos de unix.
```sh
chmod -R 777 storage
composer install
cp .env.example .env
php artisan key:generate
```

