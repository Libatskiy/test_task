build:
	docker-compose build

up:
	docker-compose up

stop:
	docker-compose stop

in:
	docker-compose exec fpm bash

test:
	docker-compose run fpm php vendor/bin/phpunit
