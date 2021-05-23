<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateBondTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return bool
     */
    public function up()
    {
        $query ="CREATE TABLE IF NOT EXISTS bond_types (
            PRIMARY KEY (id),
            id         bigint       GENERATED ALWAYS AS IDENTITY,
            bonding    varchar(128) NOT NULL UNIQUE,
            created_at date,
            updated_at date,
            deleted_at date
        );

        COMMENT ON TABLE bond_types IS 'Parentescos de las personas.'";

        DB::connection('shared')->unprepared($query);
    }

    /**
     * Reverse the migrations.
     *
     * @return bool
     */
    public function down()
    {
        $query = "DROP TABLE IF EXISTS bond_types";

        DB::connection('shared')->unprepared($query);
    }
}
