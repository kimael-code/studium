<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateGendersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return bool
     */
    public function up()
    {
        $query = "CREATE TABLE IF NOT EXISTS genders (
            PRIMARY KEY (id),
            id         bigint       GENERATED ALWAYS AS IDENTITY,
            name       varchar(128) NOT NULL UNIQUE,
            about      varchar,
            created_at date,
            updated_at date,
            deleted_at date
        );

        COMMENT ON TABLE genders IS 'Géneros sociales de las personas.'";

        DB::connection('shared')->unprepared($query);
    }

    /**
     * Reverse the migrations.
     *
     * @return bool
     */
    public function down()
    {
        $query = "DROP TABLE IF EXISTS genders";

        DB::connection('shared')->unprepared($query);
    }
}
