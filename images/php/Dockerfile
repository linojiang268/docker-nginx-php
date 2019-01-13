FROM php:7.2-fpm
#ADD ../../ /var/www/icar-server
ADD source.list /etc/apt/source.list
RUN set -ex && apt-get update \
    && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        libpq-dev \
        libxml2-dev \
        # ===== mcrypt is DEPRECATED since 7.1 not compatible with PHP version 7.3.0 === \
        libmcrypt-dev \
        zlib1g-dev \
        libzip-dev \
#        bison \
#        mcrypt \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
#    && docker-php-ext-install pdo pdo_mysql mysqli \
    && docker-php-ext-install pdo pdo_pgsql pgsql \
    # === mcrypt is DEPRECATED since 7.1 and not compatible with PHP version 7.3.0 === \
    && pecl install mcrypt-1.0.1 && docker-php-ext-enable mcrypt \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install -j$(nproc) iconv \
    && docker-php-ext-install xmlrpc gettext bcmath zip
#    && docker-php-ext-install curl zlib openssl


#./configure --prefix=/usr/local/php7 --with-config-file-path=/usr/local/php7/etc
# --with-config-file-scan-dir=/usr/local/php7/etc/php.d
# --with-mcrypt=/usr/include
# --enable-mysqlnd --with-mysqli --with-pdo-mysql
# --enable-fpm --with-fpm-user=www --with-fpm-group=www
# --with-gd --with-iconv --with-zlib --enable-xml --enable-shmop
#  --enable-sysvsem --enable-inline-optimization --enable-mbregex --enable-mbstring
#  --enable-ftp --enable-gd-native-ttf --with-openssl --enable-pcntl --enable-sockets
#   --with-xmlrpc --enable-zip --enable-soap --without-pear --with-gettext --enable-session
#   --with-curl --with-jpeg-dir --with-freetype-dir --enable-opcache
#   --enable-bcmath --with-pgsql --with-pdo-pgsql