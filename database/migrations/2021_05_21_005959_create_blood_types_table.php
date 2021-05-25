<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateBloodTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return bool
     */
    public function up()
    {
        $query = "CREATE TABLE IF NOT EXISTS blood_types (
            PRIMARY KEY (id),
            id         bigint      GENERATED ALWAYS AS IDENTITY,
            name       varchar(16) NOT NULL UNIQUE,
            about      varchar,
            created_at timestamp,
            updated_at timestamp,
            deleted_at timestamp
         );

        COMMENT ON TABLE blood_types IS 'Grupos sanguíneos de las personas.'";

        DB::connection('shared')->unprepared($query);
    }

    /**
     * Reverse the migrations.
     *
     * @return bool
     */
    public function down()
    {
        $query = "DROP TABLE IF EXISTS blood_types";

        DB::connection('shared')->unprepared($query);
    }
}
