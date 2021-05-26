<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return bool
     */
    public function up()
    {
        $query = "CREATE TABLE IF NOT EXISTS people (
            PRIMARY KEY (id),
            id                bigint GENERATED ALWAYS AS IDENTITY,
            blood_type_id     bigint NOT NULL
                              REFERENCES blood_types
                              ON DELETE RESTRICT
                              ON UPDATE RESTRICT,
            marital_status_id bigint NOT NULL
                              REFERENCES marital_status
                              ON DELETE RESTRICT
                              ON UPDATE RESTRICT,
            gender_id         bigint NOT NULL
                              REFERENCES genders
                              ON DELETE RESTRICT
                              ON UPDATE RESTRICT,
            parish_id         bigint
                              REFERENCES parishes
                              ON DELETE RESTRICT
                              ON UPDATE RESTRICT,
            city_id           bigint
                              REFERENCES cities
                              ON DELETE RESTRICT
                              ON UPDATE RESTRICT,
            nationality       varchar(1) NOT NULL,
                              CONSTRAINT valid_nationality
                              CHECK(nationality = 'V' OR nationality = 'E'),
            id_national       varchar(256) NOT NULL UNIQUE,
            names             varchar(128),
            surnames          varchar(128),
            birth_date        date NOT NULL,
            address           varchar(512),
            emails            varchar,
            phones            varchar,
            occupation        varchar(256),
            profession        varchar(256),
            created_at        timestamp,
            updated_at        timestamp,
            deleted_at        timestamp
        );

        COMMENT ON TABLE people IS 'Datos de las personas.'";

        DB::connection('shared')->unprepared($query);
    }

    /**
     * Reverse the migrations.
     *
     * @return bool
     */
    public function down()
    {
        $query = "DROP TABLE IF EXISTS people";

        DB::connection('shared')->unprepared($query);
    }
}
