FROM ubi7/php-73 
LABEL description="This is a custom artStore httpd+php container image" 
EXPOSE 8080
ENV LogLevel "info" 
COPY ./htdocs/ /var/www/html/ 
USER apache 
ENTRYPOINT ["/usr/sbin/httpd"] 
CMD ["-D", "FOREGROUND"] 1