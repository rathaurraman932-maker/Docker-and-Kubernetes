FROM mysql:8.0

ENV MYSQL_ROOT_PASSWORD=appusr@1090
ENV MYSQL_DATABASE=appdb
ENV MYSQL_USER=appusr
ENV MYSQL_PASSWORD=appusr@1090

COPY init.sql /docker-entrypoint-initdb.d/

EXPOSE 3306