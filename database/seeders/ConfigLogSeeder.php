<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfigLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $query = "INSERT INTO config_logs (created_at, updated_at)
                  VALUES ('now()', 'now()')";

        DB::connection('audit')->unprepared($query);
    }
}
