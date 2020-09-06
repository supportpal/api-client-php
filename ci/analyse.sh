#!/usr/bin/env bash

./vendor/squizlabs/php_codesniffer/bin/phpcs --standard=phpcs.xml src/ test/
./vendor/phpstan/phpstan/phpstan analyse
