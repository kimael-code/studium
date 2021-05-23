<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return bool
     */
    public function up()
    {
        $query = "CREATE TABLE IF NOT EXISTS cities (
            PRIMARY KEY (id),
            id         bigint       GENERATED ALWAYS AS IDENTITY,
            state_id   bigint       NOT NULL
                       REFERENCES states
                       ON DELETE RESTRICT
                       ON UPDATE RESTRICT,
            name       varchar(256) NOT NULL,
            is_capital boolean      DEFAULT FALSE NOT NULL,
            created_at date         DEFAULT LOCALTIMESTAMP,
            updated_at date         DEFAULT LOCALTIMESTAMP,
            deleted_at date
        );

        COMMENT ON TABLE cities IS 'Ciudades de las Entidades Federales
                                    (Estados) de Venezuela.'";

        DB::connection('shared')->unprepared($query);
    }

    /**
     * Reverse the migrations.
     *
     * @return bool
     */
    public function down()
    {
        $query = "DROP TABLE IF EXISTS cities";

        DB::connection('shared')->unprepared($query);
    }
}
