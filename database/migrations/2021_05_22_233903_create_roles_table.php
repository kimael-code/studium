<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return bool
     */
    public function up()
    {
        $query = "CREATE TABLE IF NOT EXISTS roles (
            PRIMARY KEY (id),
            id         bigint      GENERATED ALWAYS AS IDENTITY,
            name       varchar(64) NOT NULL UNIQUE,
            about      varchar,
            created_at timestamp,
            updated_at timestamp,
            deleted_at timestamp
        );

        COMMENT ON TABLE roles IS 'Roles asignables a los usuarios, es decir,
                                   grupos de usuarios.'";

        DB::connection('auth')->unprepared($query);
    }

    /**
     * Reverse the migrations.
     *
     * @return bool
     */
    public function down()
    {
        $query= "DROP TABLE IF EXISTS roles";

        DB::connection('auth')->unprepared($query);
    }
}
