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
			'categoria' => '1',
			'existencia' => '10',
			'activo' => '1'
        ]);
        factory(App\Producto::class)->create([
			'nombre' => 'Tomate',
			'costo' => '3.00',
			'categoria' => '1',
			'existencia' => '120',
			'activo' => '1'
        ]);
        factory(App\Producto::class)->create([
			'nombre' => 'Pepinillos',
			'costo' => '23.00',
			'categoria' => '2',
			'existencia' => '100',
			'activo' => '1'
        ]);
        factory(App\Producto::class)->create([
			'nombre' => 'Pan',
			'costo' => '23.00',
			'categoria' => '2',
			'existencia' => '100',
			'activo' => '1'
        ]);
     	factory(App\Producto::class)->create([
			'nombre' => 'Jamón',
			'costo' => '23.00',
			'categoria' => '2',
			'existencia' => '100',
			'activo' => '1'
        ]);
        factory(App\Producto::class)->create([
			'nombre' => 'Cheetos',
			'costo' => '23.00',
			'categoria' => '2',
			'existencia' => '100',
			'activo' => '1'
        ]);
        factory(App\Producto::class)->create([
			'nombre' => 'Dulces',
			'costo' => '23.00',
			'categoria' => '2',
			'existencia' => '100',
			'activo' => '1'
        ]);
        factory(App\Producto::class)->create([
			'nombre' => 'Coca-Cola',
			'costo' => '23.00',
			'categoria' => '2',
			'existencia' => '100',
			'activo' => '1'
        ]);
        factory(App\Producto::class)->create([
			'nombre' => 'Tecate',
			'costo' => '23.00',
			'categoria' => '2',
			'existencia' => '100',
			'activo' => '1'
        ]);
        factory(App\Producto::class)->create([
			'nombre' => 'Café',
			'costo' => '23.00',
			'categoria' => '2',
			'existencia' => '100',
			'activo' => '1'
        ]);
        factory(App\Producto::class)->create([
			'nombre' => 'Carne Molida',
			'costo' => '23.00',
			'categoria' => '2',
			'existencia' => '100',
			'activo' => '1'
        ]);
           
    }
}
