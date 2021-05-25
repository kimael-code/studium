<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return bool
     */
    public function up()
    {
        $query = "CREATE TABLE IF NOT EXISTS grades (
            PRIMARY KEY (id),
            id         bigint     GENERATED ALWAYS AS IDENTITY,
            name       varchar(4) NOT NULL UNIQUE,
            about      varchar,
            created_at timestamp,
            updated_at timestamp,
            deleted_at timestamp
        );

        COMMENT ON TABLE grades IS 'Grados de los estudiantes
                                    (7º, 8º, 9º, etc.)'";

        DB::connection('studium')->unprepared($query);
    }

    /**
     * Reverse the migrations.
     *
     * @return bool
     */
    public function down()
    {
        $query = "DROP TABLE IF EXISTS grades";

        DB::connection('studium')->unprepared($query);
    }
}
