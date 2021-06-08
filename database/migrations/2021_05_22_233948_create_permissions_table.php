<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return bool
     */
    public function up()
    {
        $query = "CREATE TABLE IF NOT EXISTS permissions (
            PRIMARY KEY (id),
            id         bigint       GENERATED ALWAYS AS IDENTITY,
            name       varchar(128) NOT NULL UNIQUE,
            action     varchar      NOT NULL,
            created_at timestamp,
            updated_at timestamp,
            deleted_at timestamp
        );

        COMMENT ON TABLE permissions IS 'Rutas del sistema asignables a los roles.'";

        DB::connection('auth')->unprepared($query);
    }

    /**
     * Reverse the migrations.
     *
     * @return bool
     */
    public function down()
    {
        $query = "DROP TABLE IF EXISTS permissions";

        DB::connection('auth')->unprepared($query);
    }
}
