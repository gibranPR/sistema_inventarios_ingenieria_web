<?php

use Illuminate\Database\Seeder;

class ProductosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Producto::class)->create([
			'nombre' => 'Aguacate',
			'categoria' => 'Frutas y verduras',
			'existencia' => '10',
			'estado' => '1'
        ]);
        factory(App\Producto::class)->create([
			'nombre' => 'Tomate',
			'categoria' => 'Frutas y verduras',
			'existencia' => '120',
			'estado' => '1'
        ]);
        factory(App\Producto::class)->create([
			'nombre' => 'Pepinillos',
			'categoria' => 'Frutas y verduras',
			'existencia' => '100',
			'estado' => '1'
        ]);
        factory(App\Producto::class)->create([
			'nombre' => 'Pan',
			'categoria' => 'Abarrotes',
			'existencia' => '100',
			'estado' => '1'
        ]);
     	factory(App\Producto::class)->create([
			'nombre' => 'Jamón',
			'categoria' => 'Abarrotes',
			'existencia' => '100',
			'estado' => '1'
        ]);
        factory(App\Producto::class)->create([
			'nombre' => 'Cheetos',
			'categoria' => 'Abarrotes',
			'existencia' => '100',
			'estado' => '1'
        ]);
        factory(App\Producto::class)->create([
			'nombre' => 'Dulces',
			'categoria' => 'Abarrotes',
			'existencia' => '100',
			'estado' => '1'
        ]);
        factory(App\Producto::class)->create([
			'nombre' => 'Coca-Cola',
			'categoria' => 'Abarrotes',
			'existencia' => '100',
			'estado' => '1'
        ]);
        factory(App\Producto::class)->create([
			'nombre' => 'Tecate',
			'categoria' => 'Abarrotes',
			'existencia' => '100',
			'estado' => '1'
        ]);
        factory(App\Producto::class)->create([
			'nombre' => 'Café',
			'categoria' => 'Abarrotes',
			'existencia' => '100',
			'estado' => '1'
        ]);
        factory(App\Producto::class)->create([
			'nombre' => 'Carne Molida',
			'categoria' => 'Abarrotes',
			'existencia' => '100',
			'estado' => '1'
        ]);
           
    }
}
