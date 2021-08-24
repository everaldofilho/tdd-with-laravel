setup:
	docker network create Criativoweb
	docker-compose up -d --build --force-recreate
	docker-compose exec -T tdd.app composer install
	cp ./app/.env.example ./app/.env

migrate:
	docker-compose exec -T tdd.app php artisan migrate
test:
	docker-compose exec -T tdd.app ./vendor/bin/phpunit --colors --testdox
coverage:
	cd app && ./vendor/bin/php-coveralls -v && cd -