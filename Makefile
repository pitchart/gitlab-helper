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
	sha1sum dist/gitlab-helper.phar > dist/gitlab-helper.phar.version

.PHONY: build box sha1