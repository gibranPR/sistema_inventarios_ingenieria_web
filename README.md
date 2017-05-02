Ingeniería Web
=======

Sistema de Inventarios (SI)
=======

# Índice
 - [Integrantes](#integrantes)
 - [Trabajo en GIT](#trabajo-en-git)
 - [Al clonar](#al-clonar)
 - [Bibliotecas](#bibliotecas)
 	- [Instalación de bower](#instalación-de-bower)
 - [Plantilla](#plantilla)
 	- [Vistas](#vistas)
 	- [Admin LTE](#admin-lte)

# Integrantes
 - Álvarez Hernández Octavio
 - Piedra Rosas Gibrán Alfredo
 - Román Salazar Rosario Iván (rama shaio)

# Trabajo en GIT
Al inicio, se tiene que crear la rama con la que van a trabajar con el siguiente comando
```sh
git checkout -b <nombre_de_la_rama>
```
Al ejecutar el comando anterior, se cambiará automáticamente de la rama "master" a la rama "<rama>".

Una vez se ejecute eso, el flujo de trabajo será el siguiente siempre que quieran trabajar en sus issues.

Si se quieren asegurar que están en su rama, o se quieren cambiar de rama, será con el comando:
```sh
git checkout <nombre_de_la_rama>
```

Obtener los cambios más recientes de la rama master con:
```sh
git pull origin master
```

Hacer todos los cambios del issue(trabajar) y finalmente se ejecuta los comandos normales para hacer commit
```sh
git add .
git commit -m "Título breve" -m "Descripción más detallada"
```
Se recomienta un título breve pero que describa la mayoría de los cambios hechos, y especificarlos en la descripción detallada.
Para agregar, en el título se puede agregar algo como "#2 Se agregó el login a la página", siendo #2 el número del issue que trabajaron en el commit, esto es para que los logs se liguen en automático con los issues.

Finalmente, se suben los cambios al repositorio en github con:
```sh
git git push orign <nombre_de_la_rama>
```

Así los cambios se suben a su rama en el repositorio y no en la rama master para evitar todos los errores.
En github, se aseguran de tener seleccionada la rama de ustedes y hacen un pull request a master, agregando los comentarios, y me asignan la revisión a mi. Cualquier duda hablarme.

# Al clonar
Al clonar el repositorio es necesario hacer unos ajustes. Estos son:

 - En el caso de linux, ajustar los permisos a `777`.
 - Instalar todas las dependencias de Laravel.
 - Hacer una copia del archivo de configuración de Laravel y renombrarlo sin la extensión example.
 - Regenerar la llave con php artisan.

Todas las acciones antes mencionadas se pueden generar con la siguiente secuencia de comandos de unix.
```sh
#Sólo Linux
chmod -R 777 storage
composer install
#Copiar en Linux
cp .env.example .env
#Copiar en Windows
copy .env.example .env
php artisan key:generate
bower install

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

## Instalación de bower
Para instalar bower, se necesita descargar alguna versión de [Node.js](https://nodejs.org/en/download/), de preferencia la versión 6.x, asegurandose de instalar npm con Node.js, y ejecutar el sigueinte comando como administrador.

```sh
npm install bower --global
```

# Plantilla
## Vistas
La plantilla de la vista se encuentra en `resources/views/plantilla_vista.blade.php`.

## Admin LTE
Todas las opciones que ofrece la plantilla se pueden ver en la página de [Admin LTE](https://almsaeedstudio.com/themes/AdminLTE/index.html).
