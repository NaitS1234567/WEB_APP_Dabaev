FROM ubuntu:latest

ENV TZ=Europe/Moscow
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

RUN apt-get update && apt-get -y upgrade && \
    apt-get -y install apache2 php php-mysql php-curl php-json && \
    apt-get clean && rm -rf /var/lib/apt/lists/*

RUN rm -rf /var/www/html/*
COPY . /var/www/html/
RUN chown -R www-data:www-data /var/www/html/

RUN a2enmod rewrite

EXPOSE 80

CMD ["apache2ctl", "-D", "FOREGROUND"]