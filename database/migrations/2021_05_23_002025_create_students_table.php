<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return bool
     */
    public function up()
    {
        $query = "CREATE TABLE IF NOT EXISTS students (
            PRIMARY KEY (id),
            id          bigint    GENERATED ALWAYS AS IDENTITY,
            person_id   bigint    NOT NULL
                        REFERENCES shared.people
                        ON DELETE RESTRICT
                        ON UPDATE RESTRICT,
            sch_year_id bigint    NOT NULL
                        REFERENCES school_years
                        ON DELETE RESTRICT
                        ON UPDATE RESTRICT,
            group_id    bigint    NOT NULL
                        REFERENCES groups
                        ON DELETE RESTRICT
                        ON UPDATE RESTRICT,
            created_at  timestamp,
            updated_at  timestamp,
            deleted_at  timestamp
        );

        COMMENT ON TABLE students IS 'Personas inscritas en un periodo escolar
                                      de un colegio para obtener un título
                                      académico.'";

        DB::connection('studium')->unprepared($query);
    }

    /**
     * Reverse the migrations.
     *
     * @return bool
     */
    public function down()
    {
        $query = "DROP TABLE IF EXISTS students";

        DB::connection('studium')->unprepared($query);
    }
}
