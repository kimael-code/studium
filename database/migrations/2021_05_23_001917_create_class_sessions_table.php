<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateClassSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return bool
     */
    public function up()
    {
        $query = "CREATE TABLE IF NOT EXISTS class_sessions (
            PRIMARY KEY (id),
            id              bigint    GENERATED ALWAYS AS IDENTITY,
            schedule_id     bigint    NOT NULL
                            REFERENCES schedules
                            ON DELETE RESTRICT
                            ON UPDATE RESTRICT,
            professor_id    bigint    NOT NULL
                            REFERENCES professors
                            ON DELETE RESTRICT
                            ON UPDATE RESTRICT,
            class_status_id bigint    NOT NULL
                            REFERENCES class_status
                            ON DELETE RESTRICT
                            ON UPDATE RESTRICT,
            content         varchar   NOT NULL,
            start_tmstamp   timestamp NOT NULL,
            end_tmstamp     timestamp NOT NULL,
            notes           varchar,
            created_at      date,
            updated_at      date,
            deleted_at      date
        );

        COMMENT ON TABLE class_sessions IS 'Sesiones presenciales de las clases.'";

        DB::connection('studium')->unprepared($query);
    }

    /**
     * Reverse the migrations.
     *
     * @return bool
     */
    public function down()
    {
        $query = "DROP TABLE IF EXISTS class_sessions";

        DB::connection('studium')->unprepared($query);
    }
}
