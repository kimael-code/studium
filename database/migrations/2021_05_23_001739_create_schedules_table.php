<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return bool
     */
    public function up()
    {
        $query = "CREATE TABLE IF NOT EXISTS schedules (
            PRIMARY KEY (id),
            id                    bigint GENERATED ALWAYS AS IDENTITY,
            professor_subject_id  bigint NOT NULL
                                  REFERENCES professors_subjects
                                  ON DELETE RESTRICT
                                  ON UPDATE RESTRICT,
            group_id              bigint NOT NULL
                                  REFERENCES groups
                                  ON DELETE RESTRICT
                                  ON UPDATE RESTRICT,
            start_tmstamp         timestamp NOT NULL,
            end_tmstamp           timestamp NOT NULL,
            created_at            date,
            updated_at            date,
            deleted_at            date
        );

        COMMENT ON TABLE schedules IS 'Horario de las materias con sus profesores
                                       asignados y grupos de estudiantes.'";

        DB::connection('studium')->unprepared($query);
    }

    /**
     * Reverse the migrations.
     *
     * @return bool
     */
    public function down()
    {
        $query = "DROP TABLE IF EXISTS schedules";

        DB::connection('studium')->unprepared($query);
    }
}
