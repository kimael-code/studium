<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateProfessorsSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return bool
     */
    public function up()
    {
        $query = "CREATE TABLE IF NOT EXISTS professors_subjects (
            PRIMARY KEY (id),
            id           bigint GENERATED ALWAYS AS IDENTITY,
            professor_id bigint NOT NULL
                         REFERENCES professors
                         ON DELETE CASCADE
                         ON UPDATE RESTRICT,
            subject_id   bigint NOT NULL
                         REFERENCES subjects
                         ON DELETE CASCADE
                         ON UPDATE RESTRICT,
            created_at   date,
            updated_at   date
        );

        COMMENT ON TABLE professors_subjects IS 'Materias o asignaturas
                                                 dadas a los profesores.'";

        DB::connection('studium')->unprepared($query);
    }

    /**
     * Reverse the migrations.
     *
     * @return bool
     */
    public function down()
    {
        $query = "DROP TABLE IF EXISTS professors_subjects";

        DB::connection('studium')->unprepared($query);
    }
}
