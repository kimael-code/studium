<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $query = "INSERT INTO roles (name, about, created_at, updated_at)
                  VALUES ('Admin', 'Usuarios con privilegios para configurar el sistema.', 'now()', 'now()'),
                         ('Director', 'Directores de liceos.', 'now()', 'now()'),
                         ('Profesor', 'Profesores de liceos.', 'now()', 'now()'),
                         ('Estudiante', 'Estudiantes de liceos.', 'now()', 'now()')";

        DB::connection('auth')->unprepared($query);
    }
}
