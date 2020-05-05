# **************************************************************************** #
#                                                                              #
#                                                         :::      ::::::::    #
#    Dockerfile                                         :+:      :+:    :+:    #
#                                                     +:+ +:+         +:+      #
#    By: raubert <raubert@student.42.fr>            +#+  +:+       +#+         #
#                                                 +#+#+#+#+#+   +#+            #
#    Created: 2020/05/05 11:32:38 by raubert           #+#    #+#              #
#    Updated: 2020/05/05 11:36:16 by raubert          ###   ########.fr        #
#                                                                              #
# **************************************************************************** #

FROM debian:buster

MAINTAINER Raphaelle Aubert <raubert@student.42.fr>

RUN apt-get update && \
    apt-get install -y nginx php-fpm php-mysql php-mbstring php-cli php-cli php-cgi mariadb-server openssl wget curl

# Copy all files to root
COPY ./srcs/ ./root/

WORKDIR /root

# Install mkcert and generate IPV4 and IPV6 certificate QUE VEUT DIRE SL et o
RUN wget https://github.com/FiloSottile/mkcert/releases/download/v1.4.1/mkcert-v1.4.1-linux-amd64 && \
    mv mkcert-v1.4.1-linux-amd64 mkcert && \
    chmod +x mkcert && \
    cp mkcert /usr/local/bin/ && \
    mkcert -install && \
    mkcert -key-file key.pem -cert-file cert.pem 127.0.0.1 localhost ::1 && \
    mv key.pem /etc/ssl/private/key.pem && \
    mv cert.pem /etc/ssl/certs/cert.pem

# Configure NGINX
RUN rm -rf /etc/nginx/sites-enabled/* && \
    mv localhost.conf /etc/nginx/sites-available/ && \
    ln -s /etc/nginx/sites-available/localhost.conf /etc/nginx/sites-enabled/

# Configure mysql
RUN service mysql start && \
    mysql -u root -e "CREATE DATABASE wordpress;" && \
    mysql -u root -e "GRANT ALL PRIVILEGES ON wordpress.* TO \"uwordpress\"@\"localhost\" IDENTIFIED BY \"password\";" && \
    mysql -u root -e "FLUSH PRIVILEGES;" && \
	mysql -u root -e "USE wordpress; SOURCE wordpress.sql;"

# Install and configure PHPMyadmin (attention deux dernieres lignes)
RUN wget -q https://files.phpmyadmin.net/phpMyAdmin/5.0.2/phpMyAdmin-5.0.2-all-languages.tar.gz && \
    tar xzf phpMyAdmin-5.0.2-all-languages.tar.gz -C /var/www/html/ && \
    mv /var/www/html/phpMyAdmin-5.0.2-all-languages /var/www/html/phpmyadmin && \
    sed -e "s|cfg\['blowfish_secret'\] = ''|cfg['blowfish_secret'] = '$(openssl rand -base64 32)'|" /var/www/html/phpmyadmin/config.sample.inc.php > /var/www/html/phpmyadmin/config.inc.php

# Install and config WordPress
RUN wget -q https://wordpress.org/latest.tar.gz && \
    tar xzf latest.tar.gz -C /var/www/html/ && \
	mv wp-config.php /var/www/html/wordpress

# Configure owner rights
RUN chown -R www-data:www-data /var/www/html/* && \
    chmod -R 755 /var/www/html/*

CMD bash launch.sh
