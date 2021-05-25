<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateParishesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return bool
     */
    public function up()
    {
        $query = "CREATE TABLE IF NOT EXISTS parishes (
            PRIMARY KEY (id),
            id              bigint       GENERATED ALWAYS AS IDENTITY,
            municipality_id bigint       NOT NULL
                            REFERENCES municipalities
                            ON DELETE RESTRICT
                            ON UPDATE RESTRICT,
            name            varchar(256) NOT NULL,
            created_at      timestamp    DEFAULT LOCALTIMESTAMP,
            updated_at      timestamp    DEFAULT LOCALTIMESTAMP,
            deleted_at      timestamp
        );

        COMMENT ON TABLE parishes IS 'Parroquias de los Municipios de las
                                      Entidades Federales (Estados) de
                                      Venezuela.'";

        DB::connection('shared')->unprepared($query);
    }

    /**
     * Reverse the migrations.
     *
     * @return bool
     */
    public function down()
    {
        $query = "DROP TABLE IF EXISTS parishes";

        DB::connection('shared')->unprepared($query);
    }
}
