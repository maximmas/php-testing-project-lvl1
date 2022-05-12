install:
	composer install

lint:
	composer exec --verbose phpstan -- --level=6 analyse classes tests

test:
	./vendor/bin/phpunit --verbose tests

test-coverage:
	./vendor/bin/phpunit --verbose tests --coverage-html coverage