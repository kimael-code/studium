<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaritalStatusSeeder extends Seeder
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
                'about'      => 'No se sabe cuál es el estado civil de esta persona.',
                'created_at' => 'now()',
                'updated_at' => 'now()',
            ],
            [
                'name'       => 'Soltera / Soltero',
                'about'      => 'Que no se ha casado aún.',
                'created_at' => 'now()',
                'updated_at' => 'now()',
            ],
            [
                'name'       => 'Casada / Casado',
                'about'      => 'Que ha contraído matrimonio.',
                'created_at' => 'now()',
                'updated_at' => 'now()',
            ],
            [
                'name'       => 'Unión Libre / Unión de Hecho / Concubinato',
                'about'      => 'Unión afectiva de dos personas físicas, con independencia de su sexo, a fin de convivir de forma estable, en una relación de afectividad análoga a la conyugal.',
                'created_at' => 'now()',
                'updated_at' => 'now()',
            ],
            [
                'name'       => 'Separada / Separado',
                'about'      => 'Que ha interrumpido su vida conyugal por conformidad de las partes o fallo judicial, sin que quede extinguido el vínculo matrimonial.',
                'created_at' => 'now()',
                'updated_at' => 'now()',
            ],
            [
                'name'       => 'Divorciada / Divorciado',
                'about'      => 'Que ha disuelto su vínculo matrimonial.',
                'created_at' => 'now()',
                'updated_at' => 'now()',
            ],
            [
                'name'       => 'Viuda / Viudo',
                'about'      => 'Que ha perdido a su cónyuge por fallecimiento.',
                'created_at' => 'now()',
                'updated_at' => 'now()',
            ],
        ];

        DB::connection('shared')->table('marital_status')->insert($data);
    }
}
