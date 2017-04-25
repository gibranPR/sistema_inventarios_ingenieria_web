Ingeniería Web
=======

Sistema de Inventarios (SI)
=======

[TOC]

# Integrantes
 - Álvarez Hernández Octavio
 - Piedra Rosas Gibrán Alfredo
 - Román Salazar Rosario Iván

# Al clonar
Al clonar el repositorio es necesario hacer unos ajustes. Estos son:

 - En el caso de linux, ajustar los permisos a `777`.
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

# Bibliotecas
Las bibliotecas se instalarán en
```sh
public/bibliotecas/
```

Se pueden reinstalar todas las bibliotecas con bower desde la raíz
```sh
bower install
```

Este tomará todas las bibliotecas especificadas en el archivo `bower.json` que se encuentra en la raíz del repositorio.

# Plantilla
## Vistas
La plantilla de la vista se encuentra en `resources/views/plantilla_vista.blade.php`.

## Admin LTE
Todas las opciones que ofrece la plantilla se pueden ver en la página de [Admin LTE].






  [Admin LTE]: <https://almsaeedstudio.com/themes/AdminLTE/index.html>
