FROM php:8.2-apache

# Включаем mod_rewrite если нужно (для .htaccess, но не обязательно)
RUN a2enmod rewrite

# Копируем все файлы сайта в /var/www/html
COPY . /var/www/html/

# Права на запись для visitors.txt
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Apache слушает на порту $PORT (Render требует)
ENV APACHE_RUN_PORT=$PORT

# Запускаем Apache в foreground
CMD ["apache2-foreground"]
