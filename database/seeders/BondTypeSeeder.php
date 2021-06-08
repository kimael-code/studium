<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BondTypeSeeder extends Seeder
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
                'name'       => 'Mamá',
                'created_at' => 'now()',
                'updated_at' => 'now()',
            ],
            [
                'name'       => 'Papá',
                'created_at' => 'now()',
                'updated_at' => 'now()',
            ],
            [
                'name'       => 'Hermana / Hermano',
                'created_at' => 'now()',
                'updated_at' => 'now()',
            ],
            [
                'name'       => 'Tía / Tío',
                'created_at' => 'now()',
                'updated_at' => 'now()',
            ],
            [
                'name'       => 'Prima / Primo',
                'created_at' => 'now()',
                'updated_at' => 'now()',
            ],
            [
                'name'       => 'Abuela / Abuelo',
                'created_at' => 'now()',
                'updated_at' => 'now()',
            ],
        ];

        DB::connection('shared')->table('bond_types')->insert($data);
    }
}
