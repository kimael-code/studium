<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name'       => 'DESCONOCIDO',
                'created_at' => 'now()',
                'updated_at' => 'now()',
            ],
            [
                'name'       => 'Femenino',
                'created_at' => 'now()',
                'updated_at' => 'now()',
            ],
            [
                'name'       => 'Masculino',
                'created_at' => 'now()',
                'updated_at' => 'now()',
            ],
            [
                'name'       => 'No Binario',
                'created_at' => 'now()',
                'updated_at' => 'now()',
            ],
            [
                'name'       => 'Prefiero no decirlo',
                'created_at' => 'now()',
                'updated_at' => 'now()',
            ],
        ];

        DB::connection('shared')->table('genders')->insert($data);
    }
}
