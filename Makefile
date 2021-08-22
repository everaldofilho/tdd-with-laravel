setup:
	docker network create Criativoweb
	docker-compose up -d --build --force-recreate
	docker-compose exec -T tdd.app composer install
	cp ./app/.env.example ./app/.env
	sleep 10
	docker-compose exec -T tdd.app php artisan migrate -n

test:
	docker-compose exec -T tdd.app ./vendor/bin/phpunit --testdox