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
			'costo' => '10.00',
			'categoria' => 'Frutas y verduras',
			'existencia' => '10',
			'estado' => '1'
        ]);
        factory(App\Producto::class)->create([
			'nombre' => 'Tomate',
			'costo' => '3.00',
			'categoria' => 'Frutas y verduras',
			'existencia' => '120',
			'estado' => '1'
        ]);
        factory(App\Producto::class)->create([
			'nombre' => 'Pepinillos',
			'costo' => '23.00',
			'categoria' => 'Frutas y verduras',
			'existencia' => '100',
			'estado' => '1'
        ]);
        factory(App\Producto::class)->create([
			'nombre' => 'Pan',
			'costo' => '23.00',
			'categoria' => 'Abarrotes',
			'existencia' => '100',
			'estado' => '1'
        ]);
     	factory(App\Producto::class)->create([
			'nombre' => 'Jamón',
			'costo' => '23.00',
			'categoria' => 'Abarrotes',
			'existencia' => '100',
			'estado' => '1'
        ]);
        factory(App\Producto::class)->create([
			'nombre' => 'Cheetos',
			'costo' => '23.00',
			'categoria' => 'Abarrotes',
			'existencia' => '100',
			'estado' => '1'
        ]);
        factory(App\Producto::class)->create([
			'nombre' => 'Dulces',
			'costo' => '23.00',
			'categoria' => 'Abarrotes',
			'existencia' => '100',
			'estado' => '1'
        ]);
        factory(App\Producto::class)->create([
			'nombre' => 'Coca-Cola',
			'costo' => '23.00',
			'categoria' => 'Abarrotes',
			'existencia' => '100',
			'estado' => '1'
        ]);
        factory(App\Producto::class)->create([
			'nombre' => 'Tecate',
			'costo' => '23.00',
			'categoria' => 'Abarrotes',
			'existencia' => '100',
			'estado' => '1'
        ]);
        factory(App\Producto::class)->create([
			'nombre' => 'Café',
			'costo' => '23.00',
			'categoria' => 'Abarrotes',
			'existencia' => '100',
			'estado' => '1'
        ]);
        factory(App\Producto::class)->create([
			'nombre' => 'Carne Molida',
			'costo' => '23.00',
			'categoria' => 'Abarrotes',
			'existencia' => '100',
			'estado' => '1'
        ]);
           
    }
}
