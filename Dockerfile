# PHP 8.2 FPM imajını temel alıyoruz
FROM php:8.2-fpm

# Gerekli bağımlılıkları yükle (libmariadb-dev, pdo_mysql)
# MariaDB/MySQL PDO desteği için gerekli kütüphane
# PDO MySQL sürücüsünü PHP'ye ekle
RUN apt-get update && apt-get install -y \
    libmariadb-dev \ 
    && docker-php-ext-install pdo_mysql

# Çalışma dizinini /var/www olarak ayarla
WORKDIR /var/www