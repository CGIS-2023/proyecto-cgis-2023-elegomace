<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipos')->insert([
            [
                'causa' => "Enfermedad laboral",
                'ley' => '5/456',
            ],
            [
                'causa' => "Enfermedad común",
                'ley' => '7/654',
            ],
        ]);
    }
}
