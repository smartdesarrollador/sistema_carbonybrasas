<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class feedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('feedback')->insert([
            'idFeedBack' => '',
            'reaction' => '',
            'message' => '',
            'date' => '',
            'time' => '',
            'idPedido' => '',
            'dateTime' => '',
        ]);
    }
}
