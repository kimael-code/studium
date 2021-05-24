<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateEvalActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return bool
     */
    public function up()
    {
        $query = "CREATE TABLE IF NOT EXISTS eval_activities (
            PRIMARY KEY (id),
            id               bigint   GENERATED ALWAYS AS IDENTITY,
            eval_type_id     bigint   NOT NULL
                             REFERENCES eval_types
                             ON DELETE RESTRICT
                             ON UPDATE RESTRICT,
            class_session_id bigint   NOT NULL
                             REFERENCES class_sessions
                             ON DELETE RESTRICT
                             ON UPDATE RESTRICT,
            asgn_value       smallint NOT NULL,
            content          varchar  NOT NULL,
            created_at       date,
            updated_at       date,
            deleted_at       date
        );

        COMMENT ON TABLE eval_activities IS 'Técnicas didácticas de evaluación
                                             aplicadas a las clases, es decir,
                                             las actividades de evaluación
                                             asignadas a las clases.'";

        DB::connection('studium')->unprepared($query);
    }

    /**
     * Reverse the migrations.
     *
     * @return bool
     */
    public function down()
    {
        $query = "DROP TABLE IF EXISTS eval_activities";

        DB::connection('studium')->unprepared($query);
    }
}
