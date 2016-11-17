### Variables

# Applications
COMPOSER ?= /usr/bin/env composer

### Helpers
all: clean depend

.PHONY: all

### Dependencies
depend:
	${COMPOSER} install --no-progress --prefer-source

build-depend:
    ${COMPOSER} install --no-progress --prefer-source --no-dev

.PHONY: depend build-depend

### Cleaning
clean:
	rm -rf vendor

.PHONY: clean

### Building
build: clean box sha1

box:
	php box.phar build

sha1:
	sha1sum dist/gitlab-helper.phar > dist/gitlab-helper.phar.version

.PHONY: build box sha1