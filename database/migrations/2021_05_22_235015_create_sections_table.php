<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return bool
     */
    public function up()
    {
        $query = "CREATE TABLE IF NOT EXISTS sections (
            PRIMARY KEY (id),
            id         bigint     GENERATED ALWAYS AS IDENTITY,
            name       varchar(4) NOT NULL UNIQUE,
            about      varchar,
            created_at date,
            updated_at date,
            deleted_at date
        );

        COMMENT ON TABLE sections IS 'Secciones de grados y estudiantes
                                      (A, B, C, etc.)'";

        DB::connection('studium')->unprepared($query);
    }

    /**
     * Reverse the migrations.
     *
     * @return bool
     */
    public function down()
    {
        $query = "DROP TABLE IF EXISTS sections";

        DB::connection('studium')->unprepared($query);
    }
}
