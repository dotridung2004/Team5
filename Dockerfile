# Sử dụng PHP 8.2 với Apache
FROM php:8.2-apache

# Cài đặt các gói cần thiết
RUN apt-get update && apt-get install -y \
    libpng-dev \
    zip \
    unzip \
    curl \
    && docker-php-ext-install pdo_mysql gd

# Cài đặt Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Sao chép mã nguồn Laravel vào container
COPY . /var/www/html

# Thiết lập quyền cho thư mục
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage \
    && chmod -R 775 /var/www/html/bootstrap/cache

# Thiết lập Apache
RUN a2enmod rewrite

# Chạy Laravel với Apache
CMD ["apache2-foreground"]
