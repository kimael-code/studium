<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $query = "INSERT INTO users (role_id, email, email_verified_at, password, remember_token, created_at, updated_at)
                  VALUES (1, 'admin@studium.com', 'now()', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', ?, 'now()', 'now()'),
                         (2, 'un-director@studium.com', 'now()', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', ?, 'now()', 'now()'),
                         (3, 'un-profesor@studium.com', 'now()', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', ?, 'now()', 'now()'),
                         (4, 'un-estudiante@studium.com', 'now()', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', ?, 'now()', 'now()')";

        $bindings = [Str::random(10), Str::random(10), Str::random(10), Str::random(10)];

        DB::connection('auth')->statement($query, $bindings);
    }
}
