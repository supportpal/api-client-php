#!/usr/bin/env bash

./vendor/squizlabs/php_codesniffer/bin/phpcs --standard=vendor/supportpal/coding-standard src/ test/
./vendor/phpstan/phpstan/phpstan analyse
