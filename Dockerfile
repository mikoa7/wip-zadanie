# Wybierz odpowiedni obraz bazowy (np. PHP wraz z Apache)
FROM php:8.1.21-apache

# Ustawienie katalogu roboczego
WORKDIR /var/www/html

# Instalacja zależności PHP i narzędzi
RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    && docker-php-ext-install zip pdo pdo_mysql

# Skopiuj pliki projektu do kontenera
COPY . .

# Instalacja Composer-a
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Instalacja zależności PHP z pomocą Composer-a
RUN composer install

# Ustal zmienne środowiskowe dla Symfony (opcjonalne)
ENV APP_ENV=prod
ENV APP_SECRET=your-secret-key

# Wykonaj polecenie startowe (np. uruchomienie serwera Apache)
CMD ["apache2-foreground"]