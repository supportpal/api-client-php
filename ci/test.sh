#!/usr/bin/env bash

set -ex

MINCOVERAGE=95
./vendor/bin/paratest --testsuite test --coverage-clover clover.xml
./vendor/bin/coverage-check clover.xml $MINCOVERAGE --only-percentage
