<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return bool
     */
    public function up()
    {
        $query = "CREATE TABLE IF NOT EXISTS subjects (
            PRIMARY KEY (id),
            id         bigint  GENERATED ALWAYS AS IDENTITY,
            pensum_id  bigint  NOT NULL
                       REFERENCES pensum
                       ON DELETE CASCADE
                       ON UPDATE RESTRICT,
            title      varchar NOT NULL UNIQUE,
            acad_hours smallint,
            created_at date,
            updated_at date,
            deleted_at date
        );

        COMMENT ON TABLE subjects IS 'Asignaturas o materias a cursar por los
                                      estudiantes, según un pensum dado.'";

        DB::connection('studium')->unprepared($query);
    }

    /**
     * Reverse the migrations.
     *
     * @return bool
     */
    public function down()
    {
        $query = "DROP TABLE IF EXISTS subjects";

        DB::connection('studium')->unprepared($query);
    }
}
