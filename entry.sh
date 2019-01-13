#!/bin/sh

docker ps

if [ $# -gt 0 ]; then
    echo 'entry: '$1
    docker exec -it $1 /bin/sh
else
    echo 'entry: docker_php_1'
    docker exec -it docker-nginx-php_php_1 /bin/sh
fi