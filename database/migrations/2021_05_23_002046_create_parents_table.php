<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateParentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return bool
     */
    public function up()
    {
        $query = "CREATE TABLE IF NOT EXISTS parents (
            PRIMARY KEY (id),
            id         bigint     GENERATED ALWAYS AS IDENTITY,
            person_id  bigint     NOT NULL
                       REFERENCES people
                       ON DELETE RESTRICT
                       ON UPDATE RESTRICT,
            kinship    varchar(1) NOT NULL
                       CONSTRAINT valid_kinship
                       CHECK(kinship = 'M' OR kinship = 'F'),
            created_at date,
            updated_at date,
            deleted_at date
        );

        COMMENT ON TABLE parents IS 'Mamás y papás de los estudiantes.'";

        DB::connection('studium')->unprepared($query);
    }

    /**
     * Reverse the migrations.
     *
     * @return bool
     */
    public function down()
    {
        $query = "DROP TABLE IF EXISTS parents";

        DB::connection('studium')->unprepared($query);
    }
}
