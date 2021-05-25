<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateProfessorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return bool
     */
    public function up()
    {
        $query = "CREATE TABLE IF NOT EXISTS professors (
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
            created_at  timestamp,
            updated_at  timestamp,
            deleted_at  timestamp
        );

        COMMENT ON TABLE professors IS 'Personas que ejercen o enseñan
                                        una ciencia o arte.'";

        DB::connection('studium')->unprepared($query);
    }

    /**
     * Reverse the migrations.
     *
     * @return bool
     */
    public function down()
    {
        $query = "DROP TABLE IF EXISTS professors";

        DB::connection('studium')->unprepared($query);
    }
}
