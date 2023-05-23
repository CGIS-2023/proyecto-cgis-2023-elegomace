<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('empresas')->insert([
            [
                'nombre' => 'ETSII SEVILLA',
                'sector' => 'Educación',
                'medico_id' => 1,
                'paciente_id' => 1,
            ],
        ]);
    }
}
