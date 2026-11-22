FROM mysql as base

ENV MYSQL_ROOT_PASSWORD=appusr@1090
ENV MYSQL_DATABASE=empdb

COPY 01.sql /docker-entrypoint-initdb.d/