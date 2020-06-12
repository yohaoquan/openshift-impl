FROM registry.access.redhat.com/ubi8/php-73
LABEL description="This is a custom artStore httpd+php container image" 
EXPOSE 8080
ENV LogLevel "info" 
# RUN docker-php-ext-install mysqli
ADD ./htdocs.zip /var/www/html/ 
# ADD ./httpd.conf /etc/apache2/httpd.conf
USER apache
ENTRYPOINT ["/usr/local/apache2/bin/apachectl"] 
CMD ["-D", "FOREGROUND"] 