#!/usr/bin/env bash
set -e

#################
# DOCUMENTACIÓN #
#################

# Este script permite crear los esquemas necesarios, SOLAMENTE cuando se crea
# la base de datos por primera vez, ya que, según la documentación oficial de
# Docker Hub de Postgres (https://hub.docker.com/_/postgres/), los scripts
# definidos en /docker-entrypoint-initdb.d se ejecutan si la carpeta de datos
# de postgres está vacía, es decir, si ya existe una base de datos este script
# no se volverá a ejecutar.

psql -v ON_ERROR_STOP=1 --username "$POSTGRES_USER" --dbname "$POSTGRES_DB" <<-EOSQL
    CREATE SCHEMA IF NOT EXISTS audit;
    CREATE SCHEMA IF NOT EXISTS auth;
    CREATE SCHEMA IF NOT EXISTS framework;
    CREATE SCHEMA IF NOT EXISTS shared;
    CREATE SCHEMA IF NOT EXISTS studium;
    COMMENT ON SCHEMA audit IS 'Trazas de actividades ejecutadas en el sistema.';
    COMMENT ON SCHEMA auth IS 'Datos de autentificación y autorización.';
    COMMENT ON SCHEMA framework IS 'Datos propios del framework.';
    COMMENT ON SCHEMA shared IS 'Datos compartidos entre los esquemas.';
    COMMENT ON SCHEMA studium IS 'Datos de la aplicación studium.';
EOSQL
