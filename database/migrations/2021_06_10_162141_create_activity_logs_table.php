<?php

use Illuminate\Database\Migrations\Migration;

class CreateActivityLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return bool
     */
    public function up()
    {
        $query = "CREATE TABLE IF NOT EXISTS activity_logs (
            PRIMARY KEY (id),
            id          bigint GENERATED ALWAYS AS IDENTITY,
            description varchar,
            user_role   varchar,
            user_id     bigint,
            http_route  varchar,
            ip_address  inet,
            user_agent  varchar,
            locale      varchar,
            referer     varchar,
            method_type varchar,
            created_at  timestamp,
            updated_at  timestamp,
            deleted_at  timestamp
        );

        COMMENT ON TABLE activity_logs IS 'Historial de actividades de los usuarios.'";

        DB::connection('audit')->unprepared($query);
    }

    /**
     * Reverse the migrations.
     *
     * @return bool
     */
    public function down()
    {
        $query = "DROP TABLE IF EXISTS activity_logs";

        DB::connection('audit')->unprepared($query);
    }
}
