setup:
	docker network create Criativoweb
	docker-compose up -d --build --force-recreate
	docker-compose exec -t tdd.app composer install
	sleep 10
	docker-compose exec -t tdd.app php artisan migrate

test:
	docker-compose start
	docker-compose exec tdd.app ./vendor/bin/phpunit --colors --testdox