FROM php:8.2-fpm
ARG user
ARG uid
RUN apt update && apt install -y \
    git \
    curl \
    unzip \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libmcrypt-dev \
    libgd-dev \
    jpegoptim optipng pngquant gifsicle \
    libonig-dev \
    libxml2-dev \
    supervisor \
    inotify-tools \
    gnupg

RUN apt clean && rm -rf /var/lib/apt/lists/*
RUN docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd
RUN touch /usr/local/etc/php/conf.d/uploads.ini \
    && echo "post_max_size = 200M;" >> /usr/local/etc/php/conf.d/uploads.ini \
    && echo "upload_max_filesize = 200M;" >> /usr/local/etc/php/conf.d/uploads.ini
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user
WORKDIR /var/www
RUN chown -R $user:$user /var/www

# supervisor
RUN mkdir -p /var/run/supervisor && \
    chown -R $user:$user /var/run/supervisor
COPY ../supervisor.conf /etc/supervisord.conf

USER $user
CMD /usr/bin/supervisord -c /etc/supervisord.conf
