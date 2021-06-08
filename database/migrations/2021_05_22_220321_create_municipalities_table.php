<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateMunicipalitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return bool
     */
    public function up()
    {
        $query = "CREATE TABLE IF NOT EXISTS municipalities (
            PRIMARY KEY (id),
            id          bigint       GENERATED ALWAYS AS IDENTITY,
            state_id    bigint       NOT NULL
                        REFERENCES states
                        ON DELETE RESTRICT
                        ON UPDATE RESTRICT,
            name        varchar(256) NOT NULL,
            created_at  timestamp    DEFAULT LOCALTIMESTAMP,
            updated_at  timestamp    DEFAULT LOCALTIMESTAMP,
            deleted_at  timestamp
        );

        COMMENT ON TABLE municipalities IS 'Municipios de las Entidades
                                            Federales (Estados) de Venezuela.'";

        DB::connection('shared')->unprepared($query);
    }

    /**
     * Reverse the migrations.
     *
     * @return bool
     */
    public function down()
    {
        $query = "DROP TABLE IF EXISTS municipalities";

        DB::connection('shared')->unprepared($query);
    }
}
