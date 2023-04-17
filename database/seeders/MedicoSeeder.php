<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MedicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('medicos')->insert([
            [
                'telefono' => 40000,
                'user_id' => 2,
                'name' => 'Médico 1',
                'num_licenciado' => 22222,
                'surname' => 'Gomez',
            ],
            [
    
                'telefono' => 4033333,
                'user_id' => 3,
                'name' => 'Médico 2',
                'num_licenciado' => 76222,
                'surname' => 'Gomez',

            ],
        ]);
    }
}
