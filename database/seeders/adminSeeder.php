<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class adminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('admin')->insert([
            'idAdmin' => 1,
            'nombre' => "ADMIN",
            'rol' => "ADMIN",
            'password' => '$2y$10$Kabn6TNp/Kg4o2VQF9gDHOXQUqD/4S4nzXJzfm/u4fTaKm350TScy', //admin
            'correo' => "admin@carbonybrasas.pe",
        ]);

        DB::table('admin')->insert([
            'idAdmin' => 2,
            'nombre' => "MOTORIZADO",
            'rol' => "MOTORIZADO",
            'password' => '$2y$10$Qv2DC73vN5GOeuS6SQo.WuHJKRpKkRgCz7la6ntds052TMcRnl0De',
            'correo' => "motorizado@carbonybrasas.pe",
        ]);
    }
}
