#!/usr/bin/env bash

set -ex

php vendor/bin/phpcs --standard=phpcs.xml src/ test/
php vendor/bin/phpstan analyse
php vendor/bin/phpmd src/  text phpmd.xml
php vendor/bin/phpmd test/  text phpmd.xml
