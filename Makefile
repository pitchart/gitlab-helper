### Variables

# Applications
COMPOSER ?= php ../composer.phar

### Helpers
all: clean depend

.PHONY: all

### Dependencies
depend:
	${COMPOSER} install --no-progress --optimize-autoloader

build-depend:
	${COMPOSER} install --no-progress --no-dev

.PHONY: depend build-depend

### Cleaning
clean:
	rm -rf vendor

.PHONY: clean

### Building
build: clean build-depend box sha1

box:
	php box-2.7.4.phar build

sha1:
	cd dist/ && sha1sum gitlab-helper.phar > gitlab-helper.phar.version

.PHONY: build box sha1

phpcbf:
	vendor/bin/phpcbf --standard=PSR2 --extensions=php src/
	vendor/bin/phpcbf --standard=PSR2 --extensions=php bin/gitlab-helper.php

.PHONY: phpcbf

### QA
qa: lint phpmd phpcs phpcpd

lint:
	find ./src -name "*.php" -exec /usr/bin/env php -l {} \; | grep "Parse error" > /dev/null && exit 1 || exit 0

phploc:
	vendor/bin/phploc src

phpmd:
	vendor/bin/phpmd --suffixes php src/ text codesize,design,naming,unusedcode,controversial

phpcs:
	vendor/bin/phpcs --standard=PSR2 --extensions=php src/

phpcpd:
	vendor/bin/phpcpd src/

.PHONY: qa lint phploc phpmd phpcs phpcpd

### Testing
test:
	vendor/bin/phpunit -v --colors --coverage-text

test-report:
	vendor/bin/phpunit -v --colors --coverage-html ./build/tests

.PHONY: test