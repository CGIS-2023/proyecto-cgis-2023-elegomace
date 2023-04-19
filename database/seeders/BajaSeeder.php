<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BajaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bajas')->insert([
            [
                'medico_id' => 1,
                'paciente_id' => 1,
                'fecha_hora' => '2023-05-30 10:15:00',
            ],
            [
                'medico_id' => 1,
                'paciente_id' => 2,
                'fecha_hora' => '2021-06-30 09:30:00',
            ],
            [
                'medico_id' => 2,
                'paciente_id' => 2,
                'fecha_hora' => '2021-07-20 11:30:00',
            ],
        ]);
    }
}
