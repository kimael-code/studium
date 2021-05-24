<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateEvalResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return bool
     */
    public function up()
    {
        $query = "CREATE TABLE IF NOT EXISTS eval_results (
            PRIMARY KEY (id),
            id               bigint  GENERATED ALWAYS AS IDENTITY,
            student_id       bigint  NOT NULL
                             REFERENCES students
                             ON DELETE RESTRICT
                             ON UPDATE RESTRICT,
            eval_activity_id bigint  NOT NULL
                             REFERENCES eval_activities
                             ON DELETE RESTRICT
                             ON UPDATE RESTRICT,
            mark             smallint NOT NULL,
            notes            varchar,
            created_at       date,
            updated_at       date,
            deleted_at       date
        );

        COMMENT ON TABLE eval_results IS 'Resultados de las actividades
                                          evaluativas de los estudiantes.'";

        DB::connection('studium')->unprepared($query);
    }

    /**
     * Reverse the migrations.
     *
     * @return bool
     */
    public function down()
    {
        $query = "DROP TABLE IF EXISTS eval_results";

        DB::connection('studium')->unprepared($query);
    }
}
