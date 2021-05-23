<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return bool
     */
    public function up()
    {
        $query = "CREATE TABLE IF NOT EXISTS schools (
            PRIMARY KEY (id),
            id          bigint       GENERATED ALWAYS AS IDENTITY,
            sz_code     varchar(256) NOT NULL,
            dea_code    varchar(256) NOT NULL,
            name        varchar(256) NOT NULL,
            established date         NOT NULL,
            about       varchar,
            created_at  timestamp,
            updated_at  timestamp,
            deleted_at  timestamp
        );

        COMMENT ON TABLE schools IS 'Datos de los liceos o planteles.'";

        DB::connection('studium')->unprepared($query);
    }

    /**
     * Reverse the migrations.
     *
     * @return bool
     */
    public function down()
    {
        $query = "DROP TABLE IF EXISTS schools";

        DB::connection('studium')->unprepared($query);
    }
}
