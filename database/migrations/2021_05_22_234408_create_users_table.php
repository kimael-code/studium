<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return bool
     */
    public function up()
    {
        $query = "CREATE TABLE IF NOT EXISTS users (
            PRIMARY KEY (id),
            id                bigint GENERATED ALWAYS AS IDENTITY,
            role_id           bigint NOT NULL
                              REFERENCES roles
                              ON DELETE RESTRICT
                              ON UPDATE RESTRICT,
            person_id         bigint UNIQUE
                              REFERENCES shared.people
                              ON DELETE RESTRICT
                              ON UPDATE RESTRICT,
            email             varchar(255) NOT NULL UNIQUE,
            email_verified_at timestamp,
            password          varchar(512) NOT NULL,
            remember_token    varchar(100),
            created_at        timestamp,
            updated_at        timestamp,
            deleted_at        timestamp
        );

        COMMENT ON TABLE users IS 'Usuarios del sistema.'";

        DB::connection('auth')->unprepared($query);
    }

    /**
     * Reverse the migrations.
     *
     * @return bool
     */
    public function down()
    {
        $query = "DROP TABLE IF EXISTS users";

        DB::connection('auth')->unprepared($query);
    }
}
