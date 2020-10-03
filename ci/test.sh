#!/usr/bin/env bash

set -ex

./vendor/bin/paratest --testsuite $TESTSUITE --coverage-clover clover.xml
./vendor/bin/coverage-check clover.xml $MINCOVERAGE --only-percentage
