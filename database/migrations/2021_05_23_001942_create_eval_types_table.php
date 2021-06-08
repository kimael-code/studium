<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateEvalTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return bool
     */
    public function up()
    {
        $query = "CREATE TABLE IF NOT EXISTS eval_types (
            PRIMARY KEY (id),
            id         bigint       GENERATED ALWAYS AS IDENTITY,
            name       varchar(256) NOT NULL,
            about      varchar,
            created_at timestamp,
            updated_at timestamp,
            deleted_at timestamp
        );

        COMMENT ON TABLE eval_types IS 'Técnicas didácticas de evaluación.'";

        DB::connection('studium')->unprepared($query);
    }

    /**
     * Reverse the migrations.
     *
     * @return bool
     */
    public function down()
    {
        $query = "DROP TABLE IF EXISTS eval_types";

        DB::connection('studium')->unprepared($query);
    }
}
