<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateRepsStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return bool
     */
    public function up()
    {
        $query = "CREATE TABLE IF NOT EXISTS reps_students (
            PRIMARY KEY (id),
            id         bigint GENERATED ALWAYS AS IDENTITY,
            rep_id     bigint NOT NULL
                       REFERENCES reps
                       ON DELETE RESTRICT
                       ON UPDATE RESTRICT,
            student_id bigint NOT NULL
                       REFERENCES students
                       ON DELETE RESTRICT
                       ON UPDATE RESTRICT,
            created_at date,
            updated_at date
        );

        COMMENT ON TABLE reps_students IS 'Estudiantes con sus respectivos
                                           representantes.'";

        DB::connection('studium')->unprepared($query);
    }

    /**
     * Reverse the migrations.
     *
     * @return bool
     */
    public function down()
    {
        $query = "DROP TABLE IF EXISTS reps_students";

        DB::connection('studium')->unprepared($query);
    }
}
