composer install
copy .env.example .env
php artisan key:generate
bower install
copy archivos_modificados\AuthenticatesUsers.php vendor\laravel\framework\src\Illuminate\Foundation\Auth\AuthenticatesUsers.php
echo "Editar el archivo .env y correr el comando:"
echo "php artisan migrate:refresh --seed"
