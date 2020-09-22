#!/usr/bin/env bash

set -ex

./vendor/bin/phpcs --standard=phpcs.xml src/ test/
./vendor/bin/phpstan analyse
