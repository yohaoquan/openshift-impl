FROM php:7.4.6-apache
LABEL description="This is a custom artStore httpd+php container image" 
EXPOSE 8080
ENV LogLevel "info" 
RUN docker-php-ext-install mysqli
ADD ./htdocs/ /var/www/html/ 
ADD ./ports.conf /etc/apache2/ports.conf
ADD ./000-default.conf /etc/apache2/sites-enabled/000-default.conf
USER apache
ENTRYPOINT ["apachectl"] 
CMD ["-D", "FOREGROUND"] 