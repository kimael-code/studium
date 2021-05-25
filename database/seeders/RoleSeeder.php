<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $query = "INSERT INTO roles (name, about)
                  VALUES ('Admin', 'Usuarios con privilegios para configurar el sistema.'),
                         ('Director', 'Usuarios con privilegios para configurar el sistema.'),";
    }
}
