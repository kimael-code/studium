<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateSubjectMattersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return bool
     */
    public function up()
    {
        $query = "CREATE TABLE IF NOT EXISTS subject_matters (
            PRIMARY KEY (id),
            id         bigint       GENERATED ALWAYS AS IDENTITY,
            subject_id bigint       NOT NULL
                       REFERENCES subjects
                       ON DELETE CASCADE
                       ON UPDATE RESTRICT,
            title      varchar(256) NOT NULL UNIQUE,
            content    varchar,
            created_at timestamp,
            updated_at timestamp,
            deleted_at timestamp
        );

        COMMENT ON TABLE subject_matters IS 'Cada uno de los módulos o temas,
                                             con sus contenidos, en que se
                                             componen las materias o asignaturas.'";

        DB::connection('studium')->unprepared($query);
    }

    /**
     * Reverse the migrations.
     *
     * @return bool
     */
    public function down()
    {
        $query = "DROP TABLE IF EXISTS subject_matters";

        DB::connection('studium')->unprepared($query);
    }
}
