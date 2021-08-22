setup:
	docker network create Criativoweb
	docker-compose up -d --build --force-recreate
	docker-compose exec -it tdd.app composer install
	sleep 10
	docker-compose exec -it tdd.app php artisan migrate

test:
	docker-compose start
	docker-compose exec -it tdd.app ./vendor/bin/phpunit --colors --testdox