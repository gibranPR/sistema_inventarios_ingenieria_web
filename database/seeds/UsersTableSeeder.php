<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class)->create([
        	'nombre' => 'Rosario Iván',
	        'apellido_paterno' => 'Román',
	        'apellido_materno' => 'Salazar',
	        'username' => 'admin',
	        'password' => bcrypt('admin'),
            'role' => 'admin',
	        'estado' => true,
        ]);
        factory(App\User::class)->create([
            'nombre' => 'Iván',
            'apellido_paterno' => 'Román',
            'apellido_materno' => 'Salazar',
            'username' => 'almacenista',
            'password' => bcrypt('almacenista'),
            'role' => 'almacenista',
            'estado' => true,
        ]);
        factory(App\User::class)->create([
            'nombre' => 'Octavio',
            'apellido_paterno' => 'Álvarez',
            'apellido_materno' => 'Hernández',
            'username' => 'oadmin',
            'password' => bcrypt('oadmin'),
            'role' => 'admin',
            'estado' => true,
        ]);
        factory(App\User::class)->create([
            'nombre' => 'Octavio',
            'apellido_paterno' => 'Álvarez',
            'apellido_materno' => 'Hernández',
            'username' => 'oalmacenista',
            'password' => bcrypt('oalmacenista'),
            'role' => 'almacenista',
            'estado' => true,
        ]); 
        factory(App\User::class)->create([
            'nombre' => 'Gibrán Alfredo',
            'apellido_paterno' => 'Piedra',
            'apellido_materno' => 'Rosas',
            'username' => 'gadmin',
            'password' => bcrypt('gadmin'),
            'role' => 'admin',
            'estado' => true,
        ]);
        factory(App\User::class)->create([
            'nombre' => 'Gibrán Alfredo',
            'apellido_paterno' => 'Piedra',
            'apellido_materno' => 'Rosas',
            'username' => 'galmacenista',
            'password' => bcrypt('galmacenista'),
            'role' => 'almacenista',
            'estado' => true,
        ]); 
        factory(App\User::class, 14)->create(); 
    }
}
