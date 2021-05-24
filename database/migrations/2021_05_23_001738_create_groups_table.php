<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return bool
     */
    public function up()
    {
        $query = "CREATE TABLE IF NOT EXISTS groups (
            PRIMARY KEY (id),
            id           bigint GENERATED ALWAYS AS IDENTITY,
            sch_year_id  bigint NOT NULL
                         REFERENCES school_years
                         ON DELETE RESTRICT
                         ON UPDATE RESTRICT,
            section_id   bigint NOT NULL
                         REFERENCES sections
                         ON DELETE RESTRICT
                         ON UPDATE RESTRICT,
            grade_id     bigint NOT NULL
                         REFERENCES grades
                         ON DELETE RESTRICT
                         ON UPDATE RESTRICT,
            professor_id bigint NOT NULL
                         REFERENCES professors
                         ON DELETE RESTRICT
                         ON UPDATE RESTRICT,
            created_at   date,
            updated_at   date,
            deleted_at   date
        );

        COMMENT ON TABLE groups IS 'Conjunto de grados con sus secciones y
                                    profesores guías para un año escolar.'";

        DB::connection('studium')->unprepared($query);
    }

    /**
     * Reverse the migrations.
     *
     * @return bool
     */
    public function down()
    {
        $query = "DROP TABLE IF EXISTS groups";

        DB::connection('studium')->unprepared($query);
    }
}
