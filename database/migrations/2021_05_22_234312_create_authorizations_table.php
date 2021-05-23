<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateAuthorizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return bool
     */
    public function up()
    {
        $query = "CREATE TABLE IF NOT EXISTS authorizations (
            PRIMARY KEY (id),
            id            bigint GENERATED ALWAYS AS IDENTITY,
            permission_id bigint NOT NULL
                          REFERENCES permissions(id)
                          ON DELETE CASCADE
                          ON UPDATE RESTRICT,
            role_id       bigint NOT NULL
                          REFERENCES roles(id)
                          ON DELETE CASCADE
                          ON UPDATE RESTRICT,
            created_at    timestamp,
            updated_at    timestamp,
        )

        COMMENT ON TABLE authorizations IS 'Permisos asignados a los roles,
                                            es decir, las rutas que los roles
                                            pueden acceder.'";

        DB::connection('auth')->unprepared($query);
    }

    /**
     * Reverse the migrations.
     *
     * @return bool
     */
    public function down()
    {
        $query = "DROP TABLE IF EXISTS authorizations";

        DB::connection('auth')->unprepared($query);
    }
}
