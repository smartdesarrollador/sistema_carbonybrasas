<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            adminSeeder::class,
            tiendaSeeder::class,
            deliverySeeder::class,
            clientesSeeder::class,
            estadopedidoSeeder::class,
            tipoproductoSeeder::class,
            consumoSeeder::class,
            pedidosSeeder::class,
            productosSeeder::class,
            pedido_itemsSeeder::class,
            ingredienteSeeder::class,
            productoIngredienteSeeder::class,
        ]);
    }
}
