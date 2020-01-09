A dockerization for a typical NGINX-PHP-MARIADB tool-stack.

# Filestructure
- ```.data``` --> will contain MYSQL-data
- ```code``` --> contains code vor running in NGINX/PHP
  - ```public``` --> thats the NGINX-root-folder (domain entry point)
- ```config``` --> contains config-files that are used in the docker-containers
- ```images``` --> contains docker container descriptions
  - ```custom-php``` --> the description for the php container
- ```docker-compose.yml``` --> file for docker-compose

# custom-php image createn (optional -> will be done bei docker-composer when needed)
``` bash
docker build --rm -f "images/custom-php/Dockerfile" -t custom-php:7.3-fpm "images/custom-php"
```

# Docker Compose
``` bash
docker-compose -f "docker-compose.yml" up -d --build
docker-compose -f "docker-compose.yml" down
```

# set file-permissions for editing/running php
For an php-app to write inside the volume of the container (updates, uploads, ...), the files need to be have the owner "www-data". This is all done on the host-maschine.
``` bash
# list permissions
ls -l

# change owner of the code folder (set owner to "www-data" for an php file to change data
sudo chown -R www-data:www-data ./code
# or use (33 is the ID of the user "www-data" in the container)
sudo chown -R 33:33 ./code
```
Optionally the following folders can be set with the local user to edit them:
``` bash
sudo chown -R YOUR_USER:YOUR_USER ./code/public/s-content/themes/child_theme
sudo chown -R YOUR_USER:YOUR_USER ./code/wp-config.php
```

More infos: https://stackoverflow.com/a/29251160