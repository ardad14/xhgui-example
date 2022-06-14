FROM php:8.1-fpm

ARG USER_ID=1000
ARG GROUP_ID=1000

USER root

# Install dependencies$ docker-compose rm
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libonig-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    libzip-dev \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    openssh-server \
    libcurl4-openssl-dev \
    pkg-config \
    libssl1.0-dev \
    # and admin tools
    openssh-client \
    net-tools \
    iputils-ping \
    telnet \
    nmap \
    git \
    git-flow \
    vim \
    nano \
    mc \

# Clear cache
#RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install composer
RUN curl -s https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
# Copy composer.lock and composer.json
#COPY composer.lock composer.json /var/www/

# Install extensions
RUN docker-php-ext-install pdo pdo_mysql mbstring zip exif pcntl sockets
RUN docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg
RUN docker-php-ext-install gd

RUN apt-get update && apt-get install openssh-server -y

#install tideways_xhprof
RUN curl "https://github.com/tideways/php-xhprof-extension/archive/v5.0.4.tar.gz" -fsL -o ./php-xhprof-extension.tar.gz && \
    tar xf ./php-xhprof-extension.tar.gz && \
    cd php-xhprof-extension-5.0.4 && \
    phpize && \
    ./configure && \
    make && \
    make install
RUN rm -rf ./php-xhprof-extension.tar.gz ./php-xhprof-extension-5.0.4
RUN docker-php-ext-enable tideways_xhprof


# install mongodb
RUN pecl uninstall mongodb
RUN pecl install mongodb
RUN docker-php-ext-enable mongodb

# Copy existing application directory contents
COPY . /var/www

# Change current user to www
#RUN chmod 777 -R /var/www

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]
