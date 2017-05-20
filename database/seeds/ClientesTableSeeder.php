<?php

use Illuminate\Database\Seeder;

class ClientesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory(App\Cliente::class)->create([
			'nombre' => 'Iván Román',
			'empresa' => 'MZ',
			'email' => 'correo@mz.com',
            'estado' => true
        ]);
        
        factory(App\Cliente::class, 50)->create(); 
    }
}
