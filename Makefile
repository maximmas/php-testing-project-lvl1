install:
	composer install

lint:
	composer exec --verbose phpstan -- --level=6 analyse src tests

test:
	./vendor/bin/phpunit --verbose tests