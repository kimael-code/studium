<?php

use Illuminate\Database\Migrations\Migration;

class CreateConfigLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return bool
     */
    public function up()
    {
        $query = "CREATE TABLE IF NOT EXISTS config_logs (
            PRIMARY KEY (id),
            id                        bigint GENERATED ALWAYS AS IDENTITY,
            log_all_auth_events       boolean DEFAULT FALSE, -- May cause a lot of duplication.
            log_auth_attempts         boolean DEFAULT FALSE, -- May cause a lot of duplication.
            log_failed_auth_attempts  boolean DEFAULT TRUE,  -- Failed Logins
            log_lock_out              boolean DEFAULT TRUE,  -- Account Lockout
            log_password_reset        boolean DEFAULT TRUE,  -- Password Resets
            log_successful_login      boolean DEFAULT TRUE,  -- Successful Login
            log_successful_logout     boolean DEFAULT TRUE,  -- Successful Logout
            log_current_device_logout boolean DEFAULT TRUE,
            log_other_device_logout   boolean DEFAULT TRUE,
            log_registered_user       boolean DEFAULT TRUE,
            log_validated             boolean DEFAULT TRUE,
            log_verified              boolean DEFAULT TRUE,
            created_at                timestamp,
            updated_at                timestamp,
            deleted_at                timestamp
        );

        COMMENT ON TABLE config_logs IS 'Configuración del log de actividades del sistema.'";

        DB::connection('audit')->unprepared($query);
    }

    /**
     * Reverse the migrations.
     *
     * @return bool
     */
    public function down()
    {
        $query = "DROP TABLE IF EXISTS config_logs";

        DB::connection('audit')->unprepared($query);
    }
}
