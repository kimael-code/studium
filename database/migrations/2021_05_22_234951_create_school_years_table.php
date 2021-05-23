<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateSchoolYearsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return bool
     */
    public function up()
    {
        $query = "CREATE TABLE IF NOT EXISTS school_years (
            PRIMARY KEY (id),
            id         bigint     GENERATED ALWAYS AS IDENTITY,
            school_id  bigint     NOT NULL
                       REFERENCES schools
                       ON DELETE RESTRICT
                       ON UPDATE RESTRICT,
            start_date date       NOT NULL,
            end_date   date       NOT NULL,
            is_current boolean    NOT NULL,
            created_at timestamp,
            updated_at timestamp,
            deleted_at timestamp
        );

        COMMENT ON TABLE school_years IS 'Períodos escolares de los liceos
                                          o planteles.'";

        DB::connection('studium')->unprepared($query);
    }

    /**
     * Reverse the migrations.
     *
     * @return bool
     */
    public function down()
    {
        $query = "DROP TABLE IF EXISTS school_years";

        DB::connection('studium')->unprepared($query);
    }
}
