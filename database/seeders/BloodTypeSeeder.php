<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BloodTypeSeeder extends Seeder
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
                'about'      => 'No se sabe el grupo sanguíneo de la persona.',
                'created_at' => 'now()',
                'updated_at' => 'now()',
            ],
            [
                'name'       => 'O-',
                'about'      => 'Donante universal. Receptor de: O-.',
                'created_at' => 'now()',
                'updated_at' => 'now()',
            ],
            [
                'name'       => 'O+',
                'about'      => 'Donante a: O+, A+, B+, AB+. Receptor de: O-, O+.',
                'created_at' => 'now()',
                'updated_at' => 'now()',
            ],
            [
                'name'       => 'A-',
                'about'      => 'Donante a: A-, A+, AB-, AB+. Receptor de: O-, A-.',
                'created_at' => 'now()',
                'updated_at' => 'now()',
            ],
            [
                'name'       => 'A+',
                'about'      => 'Donante a: A+, AB+. Receptor de: O-, O+, A-, A+.',
                'created_at' => 'now()',
                'updated_at' => 'now()',
            ],
            [
                'name'       => 'B-',
                'about'      => 'Donante a: B-, B+, AB-, AB+. Receptor de: O-, B-.',
                'created_at' => 'now()',
                'updated_at' => 'now()',
            ],
            [
                'name'       => 'B+',
                'about'      => 'Donante a: B+, AB+. Receptor de: O-, O+, B-, B+.',
                'created_at' => 'now()',
                'updated_at' => 'now()',
            ],
            [
                'name'       => 'AB-',
                'about'      => 'Donante a: AB-, AB+. Receptor de: O-, A-, B-, AB-.',
                'created_at' => 'now()',
                'updated_at' => 'now()',
            ],
            [
                'name'       => 'AB+',
                'about'      => 'Donante a: AB+. Receptor universal.',
                'created_at' => 'now()',
                'updated_at' => 'now()',
            ],
        ];

        DB::connection('shared')->table('blood_types')->insert($data);
    }
}
