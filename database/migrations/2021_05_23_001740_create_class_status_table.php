<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateClassStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return bool
     */
    public function up()
    {
        $query = "CREATE TABLE IF NOT EXISTS class_status (
            PRIMARY KEY (id),
            id         bigint        GENERATED ALWAYS AS IDENTITY,
            ancestor   bigint
                       REFERENCES class_status
                       ON DELETE CASCADE
                       ON UPDATE RESTRICT,
            name       varchar(256) NOT NULL,
            created_at date,
            updated_at date,
            deleted_at date
        );

        COMMENT ON TABLE class_status IS 'Situación actual de una sesión
                                          de clase (impartida, suspendida, etc.).
                                          Por recursividad se definen los motivos
                                          por los cuales las sesiones de clase no
                                          pudieron impartirse.'";

        DB::connection('studium')->unprepared($query);
    }

    /**
     * Reverse the migrations.
     *
     * @return bool
     */
    public function down()
    {
        $query = "DROP TABLE IF EXISTS class_status";

        DB::connection('studium')->unprepared($query);
    }
}
