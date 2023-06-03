 # Utilisez l'image officielle PHP avec Apache comme base
FROM php:8-apache

# Copiez les fichiers de l'application dans le répertoire de travail de l'image
COPY . /var/www/html

# Définir le répertoire de travail
WORKDIR /var/www/html

# Installez les dépendances PHP nécessaires
RUN apt-get update && \
    apt-get install -y \
    libzip-dev \
    zip \
    && docker-php-ext-install pdo_mysql zip

# Activez le module Apache mod_rewrite
RUN a2enmod rewrite

# Définissez les variables d'environnement pour Laravel
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
ENV APP_ENV production

# Configurez Apache pour utiliser le répertoire public comme document root
RUN sed -i -e 's/html/html\/public/g' /etc/apache2/sites-available/000-default.conf

# Copiez le fichier de configuration Apache avec les paramètres de sécurité
# COPY docker/apache2.conf /etc/apache2/conf-available/security.conf
# RUN ln -s /etc/apache2/conf-available/security.conf /etc/apache2/conf-enabled/security.conf

# Définissez les variables d'environnement pour SQLite
ENV DB_CONNECTION sqlite
ENV DB_DATABASE /var/www/html/database/database.sqlite

# Assurez-vous que le répertoire de stockage de la base de données est accessible en écriture
RUN chown -R www-data:www-data /var/www/html/database
RUN chown -R www-data:www-data /var/www/html/storage

# Exposez le port 80 pour accéder à l'application depuis l'hôte
EXPOSE 80

# Démarrez le serveur Apache
CMD ["apache2-foreground"]
