FROM php:8.2-apache

# Salin seluruh file proyek ke dalam direktori server Docker
COPY . /var/www/html/

# Arahkan Document Root ke folder public
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Buka port 80 untuk akses web
EXPOSE 80