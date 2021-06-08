<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return bool
     */
    public function up()
    {
        $query = "CREATE TABLE IF NOT EXISTS attendances (
            PRIMARY KEY (id),
            id               bigint    GENERATED ALWAYS AS IDENTITY,
            student_id       bigint    NOT NULL
                             REFERENCES students
                             ON DELETE RESTRICT
                             ON UPDATE RESTRICT,
            class_session_id bigint    NOT NULL
                             REFERENCES class_sessions
                             ON DELETE RESTRICT
                             ON UPDATE RESTRICT,
            is_present       boolean   NOT NULL,
            created_at       timestamp,
            updated_at       timestamp,
            deleted_at       timestamp
        );

        COMMENT ON TABLE attendances IS 'Asistencia de estudiantes a las
                                         sesiones de clase.'";

        DB::connection('studium')->unprepared($query);
    }

    /**
     * Reverse the migrations.
     *
     * @return bool
     */
    public function down()
    {
        $query = "DROP TABLE IF EXISTS attendances";

        DB::connection('studium')->unprepared($query);
    }
}
