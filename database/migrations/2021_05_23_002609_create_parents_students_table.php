<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateProgenitorsStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return bool
     */
    public function up()
    {
        $query = "CREATE TABLE IF NOT EXISTS progenitors_students (
            PRIMARY KEY (id),
            id         bigint    GENERATED ALWAYS AS IDENTITY,
            parent_id  bigint    NOT NULL
                       REFERENCES progenitors
                       ON DELETE RESTRICT
                       ON UPDATE RESTRICT,
            student_id bigint    NOT NULL
                       REFERENCES students
                       ON DELETE RESTRICT
                       ON UPDATE RESTRICT,
            created_at timestamp,
            updated_at timestamp
        );

        COMMENT ON TABLE progenitors_students IS 'Estudiantes con sus respectivos
                                              padres y madres.'";

        DB::connection('studium')->unprepared($query);
    }

    /**
     * Reverse the migrations.
     *
     * @return bool
     */
    public function down()
    {
        $query = "DROP TABLE IF EXISTS progenitors_students";

        DB::connection('studium')->unprepared($query);
    }
}
