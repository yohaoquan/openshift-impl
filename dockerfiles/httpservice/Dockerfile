FROM php:7.4.6-apache
LABEL description="This is a custom artStore httpd+php container image" 
EXPOSE 8080
ENV LogLevel "info" 
RUN docker-php-ext-install mysqli
ADD ./htdocs.zip /var/www/html/ 
ADD ./httpd.conf /usr/local/apache2/conf/
USER apache 
ENTRYPOINT ["apachectl"] 
CMD ["-D", "FOREGROUND"] 