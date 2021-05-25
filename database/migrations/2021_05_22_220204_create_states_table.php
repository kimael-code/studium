<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return bool
     */
    public function up()
    {
        $query = "CREATE TABLE IF NOT EXISTS states (
            PRIMARY KEY (id),
            id          bigint      GENERATED ALWAYS AS IDENTITY,
            name        varchar(64) NOT NULL UNIQUE,
            created_at  timestamp   DEFAULT LOCALTIMESTAMP,
            updated_at  timestamp   DEFAULT LOCALTIMESTAMP,
            deleted_at  timestamp
        );

        COMMENT ON TABLE states IS 'Entidades Federales (Estados) de Venezuela.'";

        DB::connection('shared')->unprepared($query);
    }

    /**
     * Reverse the migrations.
     *
     * @return bool
     */
    public function down()
    {
        $query = "DROP TABLE IF EXISTS states";

        DB::connection('shared')->unprepared($query);
    }
}
