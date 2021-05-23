<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateRepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return bool
     */
    public function up()
    {
        $query = "CREATE TABLE IF NOT EXISTS reps (
            PRIMARY KEY (id),
            id           bigint GENERATED ALWAYS AS IDENTITY,
            person_id    bigint NOT NULL
                         REFERENCES people
                         ON DELETE RESTRICT
                         ON UPDATE RESTRICT,
            bond_type_id bigint NOT NULL
                         REFERENCES bond_types
                         ON DELETE RESTRICT
                         ON UPDATE RESTRICT,
            created_at date,
            updated_at date,
            deleted_at date
        );

        COMMENT ON TABLE reps IS 'Representantes de los estudiantes.'";

        DB::connection('studium')->unprepared($query);
    }

    /**
     * Reverse the migrations.
     *
     * @return bool
     */
    public function down()
    {
        $query = "DROP TABLE IF EXISTS reps";

        DB::connection('studium')->unprepared($query);
    }
}