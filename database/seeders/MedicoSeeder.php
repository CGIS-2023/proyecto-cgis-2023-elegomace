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
                'name' => 'Medico1',
                'num_licenciado' => 22222
                'apellido' => 'Gomez'
            ],
            [
    
                'telefono' => 4033333,
                'user_id' => 3,
                'name' => 'Medico2',
                'num_licenciado' => 76222
                'apellido' => 'Gomez'

            ],
        ]);
    }
}
