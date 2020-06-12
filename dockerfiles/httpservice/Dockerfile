FROM registry.access.redhat.com/ubi7/php-73
LABEL description="This is a custom artStore httpd+php container image" 
EXPOSE 8080
ENV LogLevel "info" 
ADD ./htdocs.zip /var/www/html/ 
USER apache 
ENTRYPOINT ["httpd"] 
CMD ["-D", "FOREGROUND"] 