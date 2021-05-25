<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $query = "INSERT INTO states (id, name)
                  OVERRIDING SYSTEM VALUE
                  VALUES (1, 'Amazonas'),
                         (2, 'Anzoátegui'),
                         (3, 'Apure'),
                         (4, 'Aragua'),
                         (5, 'Barinas'),
                         (6, 'Bolívar'),
                         (7, 'Carabobo'),
                         (8, 'Cojedes'),
                         (9, 'Delta Amacuro'),
                         (10, 'Falcón'),
                         (11, 'Guárico'),
                         (12, 'Lara'),
                         (13, 'Mérida'),
                         (14, 'Miranda'),
                         (15, 'Monagas'),
                         (16, 'Nueva Esparta'),
                         (17, 'Portuguesa'),
                         (18, 'Sucre'),
                         (19, 'Táchira'),
                         (20, 'Trujillo'),
                         (21, 'La Guaira'),
                         (22, 'Yaracuy'),
                         (23, 'Zulia'),
                         (24, 'Distrito Capital'),
                         (25, 'Dependencias Federales')";

        DB::connection('shared')->unprepared($query);
    }
}
