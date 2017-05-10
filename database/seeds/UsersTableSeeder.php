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
        	'nombre' => 'Iván',
	        'apellido_paterno' => 'Román',
	        'apellido_materno' => 'Salazar',
	        'username' => 'shaio',
	        'password' => bcrypt('holamundo'),
	        'estado' => true,
        ]); 
        factory(App\User::class, 49)->create(); 
    }
}
