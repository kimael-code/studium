<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateMaritalStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return bool
     */
    public function up()
    {
        $query = "CREATE TABLE IF NOT EXISTS marital_status (
            PRIMARY KEY (id),
            id         bigint      GENERATED ALWAYS AS IDENTITY,
            name       varchar(64) NOT NULL UNIQUE,
            about      varchar,
            created_at date,
            updated_at date,
            deleted_at date
        );

        COMMENT ON TABLE marital_status IS 'Estados civiles de las personas.'";

        DB::connection('shared')->unprepared($query);
    }

    /**
     * Reverse the migrations.
     *
     * @return bool
     */
    public function down()
    {
        $query = "DROP TABLE IF EXISTS marital_status";

        DB::connection('shared')->unprepared($query);
    }
}
