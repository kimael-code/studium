<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateProgenitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return bool
     */
    public function up()
    {
        $query = "CREATE TABLE IF NOT EXISTS progenitors (
            PRIMARY KEY (id),
            id         bigint     GENERATED ALWAYS AS IDENTITY,
            person_id  bigint     NOT NULL
                       REFERENCES shared.people
                       ON DELETE RESTRICT
                       ON UPDATE RESTRICT,
            kinship    varchar(1) NOT NULL
                       CONSTRAINT valid_kinship
                       CHECK(kinship = 'M' OR kinship = 'F'),
            created_at timestamp,
            updated_at timestamp,
            deleted_at timestamp
        );

        COMMENT ON TABLE progenitors IS 'Mamás y papás de los estudiantes.'";

        DB::connection('studium')->unprepared($query);
    }

    /**
     * Reverse the migrations.
     *
     * @return bool
     */
    public function down()
    {
        $query = "DROP TABLE IF EXISTS progenitors";

        DB::connection('studium')->unprepared($query);
    }
}
