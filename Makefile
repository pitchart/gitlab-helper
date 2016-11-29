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
	php box.phar build

sha1:
	cd dist/ && sha1sum gitlab-helper.phar > gitlab-helper.phar.version

.PHONY: build box sha1

phpcbf:
	php vendor/bin/phpcbf --standard=PSR2 --extensions=php src/
	php vendor/bin/phpcbf --standard=PSR2 --extensions=php bin/gitlab-helper.php

.PHONY: phpcbf

### QA
qa: lint phpmd phpcs phpcpd

lint:
	find ./src -name "*.php" -exec /usr/bin/env php -l {} \; | grep "Parse error" > /dev/null && exit 1 || exit 0

phploc:
	php vendor/bin/phploc src

phpmd:
	php vendor/bin/phpmd --suffixes php src/ text codesize,design,naming,unusedcode,controversial

phpcs:
	php vendor/bin/phpcs --standard=PSR2 --extensions=php src/

phpcpd:
	php vendor/bin/phpcpd src/

phpmetrics:
	php vendor/bin/phpmetrics --report-html=./qa/phpmetrics.html src/

.PHONY: qa lint phploc phpmd phpcs phpcpd

### Testing
test:
	php vendor/bin/phpunit -v --colors --coverage-text

test-report:
	php vendor/bin/phpunit -v --colors --coverage-html ./build/tests

.PHONY: test