<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreatePensumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return bool
     */
    public function up()
    {
        $query = "CREATE TABLE IF NOT EXISTS pensum (
            PRIMARY KEY (id),
            id          bigint  GENERATED ALWAYS AS IDENTITY,
            approval_at date    NOT NULL UNIQUE,
            is_current  boolean
            about       varchar,
            created_at  date,
            updated_at  date,
            deleted_at  date
        );

        COMMENT ON TABLE pensum IS 'Conjunto de asignaturas legalmente aprobadas.'";

        DB::connection('studium')->unprepared($query);
    }

    /**
     * Reverse the migrations.
     *
     * @return bool
     */
    public function down()
    {
        $query = "DROP TABLE IF EXISTS pensum";

        DB::connection('studium')->unprepared($query);
    }
}
