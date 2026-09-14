FROM php:8.2-apache

# Install MySQL and PDO extensions
RUN docker-php-ext-install pdo pdo_mysql mysqli \
    && docker-php-ext-enable pdo_mysql mysqli

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Configure PHP settings
RUN echo "upload_max_filesize = 32M" > /usr/local/etc/php/conf.d/uploads.ini \
    && echo "post_max_size = 32M" >> /usr/local/etc/php/conf.d/uploads.ini \
    && echo "memory_limit = 256M" >> /usr/local/etc/php/conf.d/uploads.ini

# Copy application source
WORKDIR /var/www/html
COPY . /var/www/html/

# Set proper ownership and permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Expose default HTTP and Render/PaaS ports
EXPOSE 80 10000

# Bind Apache to $PORT dynamically if assigned by PaaS (Render, Railway, etc.), otherwise default to 80
CMD ["sh", "-c", "if [ -n \"$PORT\" ]; then sed -i \"s/Listen 80/Listen $PORT/g\" /etc/apache2/ports.conf && sed -i \"s/:80>/:$PORT>/g\" /etc/apache2/sites-available/000-default.conf; fi && exec apache2-foreground"]
