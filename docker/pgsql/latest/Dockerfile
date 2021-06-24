FROM postgres:latest

ENV TZ=America/Caracas

RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

RUN localedef -i es_VE -c -f UTF-8 -A /usr/share/locale/locale.alias es_VE.UTF-8

ENV LANG es_VE.utf8
